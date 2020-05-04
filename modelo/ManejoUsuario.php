<?php
    include_once "database.php";

    class RegistroUsuarios extends Database{
        
        public function registarUsuarios($nombres, $apellidos, $documento, $correo, $clave){
            abrirConexion();

            //Verifica si el usuario ya esta registrado (Lo hago otro dia)

            //Inserta la persona en la base de datos
            $sql = "INSERT INTO personas (nombres, apellidos, documento, foto) VALUES (:nombres, :apellidos, :documento, :foto)";
            $result=$conn->prepare($sql);
            $result->bindValue(":nombres", $nombres);
            $result->bindValue(":apellidos", $apellidos);
            $result->bindValue(":documento", $documento);
            $result->bindValue(":foto", "./img/perfil/default_photo.png");
            $result->execute();

            //Recupera el ID de la persona para asociarlo al usuario
            $sql = "SELECT idPersona FROM personas WHERE nombres = :nombres AND apellidos = :apellidos AND documento = :documento";
            $result = $conn->prepare($sql);
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
            $result=$conn->prepare($sql);
            $result->bindValue(":correo", $correo);
            $result->bindValue(":clave", $clave);
            $result->bindValue(":idPersona", $idPersona);
            $result->bindValue(":foto", "./img/perfil/default_photo.png");
            $result->execute();
            
            cerrarConexion();
        }

        public function validarUsuarios(){
            
        }
        
    }
?>