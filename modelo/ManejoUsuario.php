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
        
        public function enviarMensaje($msg ,$idUsuario){
            
            $this->abrirConexion();

            $sql = "INSERT INTO Mensajes (contenido, idUsuario) VALUES (:contenido, :idUsuario)";
            $result=$this->conn->prepare($sql);
            $result->bindValue(":contenido", $msg);
            $result->bindValue(":idUsuario", $idUsuario);
            $result->execute();

            $this->cerrarConexion();
        }

        public function recuperarMensajes($id){

            $this->abrirConexion();

            $sql = "SELECT Mensajes.idMensaje, Mensajes.contenido, nombres, apellidos FROM Mensajes 
                    INNER JOIN Usuarios ON Mensajes.idUsuario = Usuarios.idUsuario
                    INNER JOIN Personas ON Usuarios.idPersona = Personas .idPersona
                    WHERE Mensajes.idUsuario != :id LIMIT 20";

            $result = $this->conn->prepare($sql);
            $result->bindValue(":id", $id);
            $result->execute();

            $mensajes = array();
            while($rows = $result->fetch(PDO::FETCH_ASSOC))
            {
                $mensajes[] = array("id" => $rows["idMensaje"], "contenido" => $rows["contenido"], "nombres" => $rows["nombres"]);
            }

            $sql = "SELECT * FROM MensajesLeidos WHERE idUsuario = :id LIMIT 20";
            $result = $this->conn->prepare($sql);
            $result->bindValue(":id", $id);
            $result->execute();

            $leidos = array();
            while($rows = $result->fetch(PDO::FETCH_ASSOC))
            {
                $leidos[] = array("id_user" => $rows["idUsuario"], "id_msg" => $rows["idMensaje"]);
            }

            $return = array();
            foreach ($mensajes as $i) 
            {
                $nuevo = true;
                foreach ($leidos as $j) 
                {
                    if($i["id"] == $j["id_msg"])
                    {
                        $nuevo = false;
                        break;
                    }
                }
                if($nuevo)
                {
                    $return[] = $i;
                }
            }

            if(count($return) == 0)
            {
                $this->cerrarConexion();
                return "-1";
            }
            else
            {
                foreach ($return as $i) 
                {
                    $sql = "INSERT INTO MensajesLeidos (idUsuario, idMensaje) VALUES (:id_usr, :id_msg)";
                    $result = $this->conn->prepare($sql);
                    $result->bindValue("id_usr", $id);
                    $result->bindValue("id_msg", $i["id"]); 
                    $result->execute();
                }
                $this->cerrarConexion();
                return json_encode($return);
            }

        }

    }

?>