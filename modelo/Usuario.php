<?php

    class Usuario{

        private $id;
        private $correo;
        private $ctrl;

        public function __construct($id, $correo) {
            
            $this->id = $id;
            $this->correo = $correo;
            $this->ctrl = new ControladorUsuario();
        
        }

        public function codificarControlador(){

            $this->ctrl->codificarAdminUsuario();
            $this->ctrl = serialize($this->ctrl);

        }

        public function decodificarControlador(){

            $this->ctrl = unserialize($this->ctrl);
            $this->ctrl->deCodificarAdminUsuario();

        }

        public function getId(){

            return $this->id;

        }

        public function getCorreo(){

            return $this->correo;

        }

    }

?>