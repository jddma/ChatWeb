<?php

    class Usuario{

        private $id;
        private $correo;
        //private $ctrl;

        public function __construct($id, $correo) {
            
            $this->id = $id;
            $this->correo = $correo;
            //$this->ctrl = new ControladorUsuario();
        
        }

        public function getId(){

            return $this->id;

        }

        public function getCorreo(){

            return $this->correo;

        }

    }

?>