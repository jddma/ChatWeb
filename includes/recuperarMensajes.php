<?php

    include_once "../modelo/database.php";
    include_once "../modelo/ManejoUsuario.php";
    include_once "../modelo/Usuario.php";
    include_once "../controlador/ControladorUsuario.php";

    session_start();

    $user = $_SESSION["usuario"];
    $user = unserialize($user);
    $user->decodificarControlador();

    $json_string = $user->recuperarMensajes();

    $user->codificarControlador();
    $_SESSION["usuario"] = serialize($user);

    echo $json_string;

?>