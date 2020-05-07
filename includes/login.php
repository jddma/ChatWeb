<?php

    include "../controlador/Controlador.php";
    include "../modelo/database.php";
    include "../modelo/ManejoUsuario.php";
    include "../modelo/Usuario.php";
    include "../controlador/ControladorUsuario.php";

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    echo Controlador::validarUsuario($usuario, $clave);

?>