<?php

    class ManejoUsuario extends database{
        
        public function registrarUsuario($nombres, $apellidos, $documento, $correo, $clave){
            
            $this->abrirConexion();

            //Verifica si el usuario ya esta registrado (Lo hago otro dia )
            $sql = "SELECT idUsuario FROM Usuarios WHERE correo = :correo";
            $result = $this->conn->prepare($sql);
            $result->bindValue(":correo", $correo);
            $result->execute();
            
            while ($rows=$result->fetch(PDO::FETCH_ASSOC)){
                if(isset($rows["idUsuario"])){
                    $this->cerrarConexion();
                    return -1;
                }
            }

             //Inserta la persona en la base de datos
             $sql = "INSERT INTO Personas (nombres, apellidos, documento, foto) VALUES (:nombres, :apellidos, :documento, :foto)";
             $result=$this->conn->prepare($sql);
             $result->bindValue(":nombres", $nombres);
             $result->bindValue(":apellidos", $apellidos);
             $result->bindValue(":documento", $documento);
             $result->bindValue(":foto", "../img/perfil/default_photo.png");
             $result->execute();

             //Recupera el ID de la persona para asociarlo al usuario
             $sql = "SELECT idPersona FROM Personas WHERE nombres = :nombres AND apellidos = :apellidos AND documento = :documento";
             $result = $this->conn->prepare($sql);
             $result->bindValue(":nombres", $nombres);
             $result->bindValue(":apellidos", $apellidos);
             $result->bindValue(":documento", $documento);
             $result->execute();

             while ($rows=$result->fetch(PDO::FETCH_ASSOC))
             {
                 $idPersona=$rows["idPersona"];
             }

             //Inserta el usuario en la base de datos
             $sql = "INSERT INTO Usuarios (correo, clave, idPersona) VALUES (:correo, :clave, :idPersona)";
             $result=$this->conn->prepare($sql);
             $result->bindValue(":correo", $correo);
             $result->bindValue(":clave", password_hash($clave, PASSWORD_DEFAULT));
             $result->bindParam(":idPersona", $idPersona, PDO::PARAM_INT);
             $result->execute();
             
             return 1;
             $this->cerrarConexion();
        }

        public function validarUsuario($usuario, $clave){

            $this->abrirConexion();
            
            //realiza la consulta para validar los datos ingresados por el usuario
            $sql = "SELECT idUsuario, correo, clave FROM Usuarios WHERE correo = :usuario";
            $result = $this->conn->prepare($sql);
            $result->bindValue(":usuario", $usuario);
            $result->execute();

            /**
             * En caso de que el usuario ingresado no se encuentre en la base de datos
             * se retornara que hubo un error de registro del usuario
             */
            if($result->rowCount() == 0)
            {
                $this->cerrarConexion();
                return "registro";
            }

            while($rows = $result->fetch(PDO::FETCH_ASSOC))
            {
                if(password_verify($clave, $rows["clave"]))
                {
                    //instancia el objeto de tipo usuario con los datos necesarios
                    $usuario_obj = new Usuario($rows["idUsuario"], $rows["correo"]);
                    $usuario_obj->codificarControlador();

                    /**
                     * instancia la sesion y codifica el objeto de tipo usuario
                     * para poder recuperarlo posteriormente y returna -1 para indicar exito 
                     * en el inicio se sesión.
                     */
                    session_start();
                    $_SESSION["usuario"] = serialize($usuario_obj);
                    $this->cerrarConexion();
                    return "-1";
                }
                else
                {
                    //returna que hubo un error en la validación de la clave
                    $this->cerrarConexion();
                    return "clave";
                }
            }         

        }
        
    }

?>