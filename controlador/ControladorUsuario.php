<?php

    class ControladorUsuario{

        private $admin_usuario;

        public function __construct(){

            $this->admin_usuario = new ManejoUsuario();

        }

        public function deCodificarAdminUsuario(){

            $this->admin_usuario = unserialize($this->admin_usuario);

        }

        public function codificarAdminUsuario(){

            $this->admin_usuario = serialize($this->admin_usuario);

        }

        public function recuperarMensajes($id){

            return $this->admin_usuario->recuperarMensajes($id);

        }

        public function enviarMensaje($mensaje, $id){

            $this->admin_usuario->enviarMensaje($mensaje, $id);

        }

    }

?>