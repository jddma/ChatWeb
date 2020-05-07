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
        <title>Inicio</title>
    </head>
    <body>
        <?php

            //Importante incluir la clase a usar, en este caso usuario
            include "../modelo/Usuario.php";

            $usuario_obj = unserialize($_SESSION["usuario"]); 
            echo "Su correo es: " . $usuario_obj->getCorreo();

        ?>
    </body>
</html>