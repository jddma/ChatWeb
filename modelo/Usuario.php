<?php

    class Usuario{

        private $id;
        private $correo;

        function __construct($id, $correo) {
            
            $this->id = $id;
            $this->correo = $correo;
            $this->ctrl = new ControladorUsuario();
        
        }

    }

?>