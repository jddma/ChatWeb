<?php

    require_once "./controlador/Controlador.php";

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $documento = $_POST["documento"];
    $email = $_POST["correo"];
    $clave = $_POST["clave"];

    $ctrl = new Controlador($nombres, $apellidos, $documento, $email, $clave);
    $ctrl.registarUsuario();

?>