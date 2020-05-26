<?php

    /**
     * En caso de que el usuario intente ingresar sin
     * haber iniciado sesion previamente sera redirigido
     * a la pagina de inicio
     */
    session_start();
    if (! isset($_SESSION["usuario"]))
    {
        header("Location: ../");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/ChatStyles.css">
        <link rel="icon" href="../img/web/web_icon.ico">
        <script type="text/javascript" src="../js/ChatApp.js"></script>
        <title>Inicio</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="" class="navbar-brand">Inicio</a>       
            <ul class="navbar-nav ml-auto"> 
                <button class="btn btn-success my-2 my-sm-0 rounded-pill" type="submit">Mi perfil</button>    
                <button class="btn btn-danger my-2 my-sm-0 rounded-pill" type="submit" onclick="cerrarSesion()">Cerrar Sesión</button>
                <img class="profile" src="../img/perfil/default_photo.png" alt="">
            </ul>         
        </nav>
        <div class="container container-sm">
        </div>
        <div class="chat">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Chat1</a>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div>
                    <div class="contenido">
                        <nav class="navbar navbar-dark bg-dark">
                            <a class="navbar-brand" href="#">
                                <img class="profile" src="../img/perfil/default_photo.png" alt="">
                            </a>
                        </nav>
                        <div id="table_container">
                            <table id="table">
                                <tbody id="mensajes">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form class="form-inline">
                        <input class="ingresoMensaje text-center" id="mensaje" type="text" placeholder="Ingresa un mensaje" autocomplete="off">
                        <input class="btn btn-success rounded-pill" type="button" onclick="enviarMensaje()" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="../js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>