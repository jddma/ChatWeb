function cerrarSesion(){

    window.location = "../includes/cerrarSesion.php";

}

function enviarMensaje() {

    let mensaje = document.getElementById("mensaje").value;
    if(mensaje.length > 0)
    {
        let ajaxObj = new XMLHttpRequest();
        ajaxObj.open("POST", "../includes/enviarMensaje.php", true);
        ajaxObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajaxObj.onreadystatechange = function() {

            console.log(ajaxObj.responseText);

        }

        ajaxObj.send(`msg=${mensaje}`);
    }
    
}

function recuperarMensajes(){

    let ajaxObj = new XMLHttpRequest();
    ajaxObj.open("POST", "../includes/recuperarMensajes.php", true);
    ajaxObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajaxObj.onreadystatechange = function() {

        if(ajaxObj.responseText != "-1")
        {
            console.log(ajaxObj.responseText);
        }

    }

    ajaxObj.send();

}

setInterval(recuperarMensajes, 1500);