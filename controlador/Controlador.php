<?php

    class Controlador{
        
        public static function registarUsuario($nombres, $apellidos, $documento, $email, $clave){
            
            $manejoUsuario = new ManejoUsuario();
            
            $manejoUsuario->registrarUsuario($nombres, $apellidos, $documento, $email, $clave);
            unset($manejoUsuario);
        }

        public static function validarUsuario(){
            
        }

    }

?>