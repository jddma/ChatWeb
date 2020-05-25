<?php

    include_once "../modelo/database.php";
    include_once "../modelo/ManejoUsuario.php";
    include_once "../modelo/Usuario.php";
    include_once "../controlador/ControladorUsuario.php";

    session_start();
    $user = $_SESSION["usuario"];
    $user = unserialize($user);

    $user->decodificarControlador();

?>