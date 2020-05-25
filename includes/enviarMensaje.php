<?php

    include_once "../modelo/database.php";
    include_once "../modelo/ManejoUsuario.php";
    include_once "../modelo/Usuario.php";
    include_once "../controlador/ControladorUsuario.php";

    session_start();

    $msg = $_POST["msg"];

    $user = $_SESSION["usuario"];
    $user = unserialize($user);
    $user->decodificarControlador();
    
    $user->enviarMensaje($msg);
    $user->codificarControlador();

    $_SESSION["usuario"] = serialize($user);

?>