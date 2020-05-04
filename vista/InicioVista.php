<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/InicioStyles.css">
        <link rel="icon" href="./img/web/web_icon.ico">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
        <script type="text/javascript" src="./js/inicioApp.js"></script>
        <script type="text/javascript" src="./js/registro.js"></script>
        <title>Bienvenido</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="" class="navbar-brand">CHAT</a>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline my-2 my-lg-0 container-sm">
                    <input type="email" class="form-control mr-sm-2 text-center rounded-pill" id="correo" placeholder="Correo">
                    <input type="password" class="form-control mr-sm-2 text-center rounded-pill" placeholder="Clave">
                    <input type="button" class="btn btn-success my-2 my-sm-0 rounded-pill" value="Ingresar">
                </form>
            </ul>
        </nav>
        <div class="content">
            <div class="signup-form">
                <form>
                    <h1>Regístrate</h1>
                    <input type="text" class="tx" id="nombres" placeholder="Nombres">
                    <input type="text"class="tx" id="apellidos" placeholder="Apellidos">
                    <input type="text" class="tx" id="documento" placeholder="Documento">
                    <input type="email" class="tx" id="correo" placeholder="E-mail">
                    <input type="password" class="tx" id="clave" placeholder="Clave">
                    <input type="password" class="tx" id="verificar-clave" placeholder="Repite tu clave">
                    <span id="aviso"></span>
                    <input type="button" value="Crea tu cuenta" onClick="obtenerRegistro()">
                </form>
                
            </div>
        </div>
    </body>
</html>