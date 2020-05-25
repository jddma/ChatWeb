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

    console.log("prueba" + i);
    i++;

}

let i = 1;
setInterval(recuperarMensajes, 500);