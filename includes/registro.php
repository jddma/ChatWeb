<?php

    include "../controlador/Controlador.php";
    include "../modelo/database.php";
    include "../modelo/ManejoUsuario.php";

    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $documento = $_POST["documento"];
    $email = $_POST["correo"];
    $clave = $_POST["clave"];

    Controlador::registarUsuario($nombres, $apellidos, $documento, $email, $clave);
    
?>