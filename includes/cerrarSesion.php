<?php

    //destruye la session y redirecciona al usuario al inicio
    session_start();
    session_destroy();
    header("Location: ../");
    exit();

?>