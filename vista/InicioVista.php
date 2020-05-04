<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/InicioStyles.css">
        <link rel="icon" href="img/web/web_icon.ico">
        <script type="text/javascript" src="js/inicioApp.js"></script>
        <script type="text/javascript" src="js/registro.js"></script>
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
                <form action="includes/registro.php" method="POST">
                    <h1>Regístrate</h1><hr>
                    <input type="text" class="tx" id="nombres" placeholder="Nombres" required>
                    <input type="text"class="tx" id="apellidos" placeholder="Apellidos" required>
                    <input type="text" class="tx" id="documento" placeholder="Documento" required>
                    <input type="email" class="tx" id="correo" placeholder="E-mail" required>
                    <input type="password" class="tx" id="clave" placeholder="Clave" required>
                    <input type="password" class="tx" id="verificar-clave" onkeyup="verificarClave()" placeholder="Repite tu clave">
                    <span id="aviso"></span>
                    <input type="submit" value="Crea tu cuenta" onclick="obtenerRegistro()">
                </form>               
            </div>
        </div>
    </body>
</html>