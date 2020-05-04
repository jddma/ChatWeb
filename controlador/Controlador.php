<?php

    include_once "./modelo/ManejoUsuario.php";

    class Controlador{
        
        private $nombres;
        private $apellidos;
        private $documento;
        private $email;
        private $clave;

        private $manejoUsuario;

        function __construct($nombres, $apellidos, $documento, $email, $clave){
            this.$nombres = $nombres;
            this.$apellidos = $apellidos;
            this.$documento = $documento;
            this.$email = $email;
            this.$clave = $clave;
        }

        public static function registarUsuario(){
            this.$manejoUsuario = new ManejoUsuario();
            this.$manejoUsuario.registrarUsuario($nombres, $apellidos, $documento, $email, $clave);
        }

        public static function validarUsuario(){
            
        }

    }
?>