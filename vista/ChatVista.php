<?php

    /**
     * En caso de que el usaurio intente ingresar sin
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
            <input class="form-control text-center rounded-pill" type="search" placeholder="Busque un proveedor" aria-label="Search">        
        </div>

        <div class="chat">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Chat1</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Chat2</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Chat3</a>
                </li>
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
                        <table>
                            <tbody id="mensajes">
                            </tbody>
                        </table>
                    </div>
                    <form class="form-inline">
                        <input class="ingresoMensaje text-center" id="mensaje" type="text" name="" id="" placeholder="Ingresa un mensaje">
                        <input class="btn btn-success rounded-pill" type="button" value="Enviar">
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                2
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                3
            </div>
            
        </div>
        
        <script type="text/javascript" src="../js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>