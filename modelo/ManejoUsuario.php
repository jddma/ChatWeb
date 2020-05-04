<?php

    class ManejoUsuario extends database{
        
        public function registrarUsuario($nombres, $apellidos, $documento, $correo, $clave){
            
            $this->abrirConexion();

            //Verifica si el usuario ya esta registrado (Lo hago otro dia)

            //Inserta la persona en la base de datos
            $sql = "INSERT INTO personas (nombres, apellidos, documento, foto) VALUES (:nombres, :apellidos, :documento, :foto)";
            $result=$this->conn->prepare($sql);
            $result->bindValue(":nombres", $nombres);
            $result->bindValue(":apellidos", $apellidos);
            $result->bindValue(":documento", $documento);
            $result->bindValue(":foto", "./img/perfil/default_photo.png");
            $result->execute();

            //------------------------------------aqui se rompe------------------------------------

            //Recupera el ID de la persona para asociarlo al usuario
            $sql = "SELECT idPersona FROM personas WHERE nombres = :nombres AND apellidos = :apellidos AND documento = :documento";
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
            $sql = "INSERT INTO usuarios (correo, clave, idPersona) VALUES (:correo, :clave, :idPersona)";
            $result=$this->conn->prepare($sql);
            $result->bindValue(":correo", $correo);
            $result->bindValue(":clave", $clave);
            $result->bindValue(":idPersona", $idPersona);
            $result->bindValue(":foto", "./img/perfil/default_photo.png");
            $result->execute();
            
            $this->cerrarConexion();
        }

        public function validarUsuarios(){
            
        }
        
    }

?>