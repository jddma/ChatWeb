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
    document.getElementById("mensaje").value = "";

    let tabla = document.getElementById("mensajes");
    let fila = document.createElement("tr");
    let columna = document.createElement("td");
    columna.setAttribute("class", "my");
    let msg = document.createTextNode(mensaje);
    columna.appendChild(msg);
    fila.appendChild(columna);
    tabla.appendChild(columna);
    
}

function recuperarMensajes(){

    let ajaxObj = new XMLHttpRequest();
    ajaxObj.open("POST", "../includes/recuperarMensajes.php", true);
    ajaxObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajaxObj.onreadystatechange = function() {

        if(ajaxObj.responseText != "-1")
        {
            console.log(ajaxObj.responseText);

            let mensajes = JSON.parse(ajaxObj.responseText);
            mensajes.forEach(msg => 
            {   
                agregarMensaje(msg.nombres, msg.contenido, msg.id);
            });
        }

    }

    ajaxObj.send();

}

function agregarMensaje(emisor, mensaje, id) {

    let repetido = document.getElementsByClassName(id).length;
    if(repetido == 0)
    {

        let tabla = document.getElementById("mensajes");

        let fila1 = document.createElement("tr");
        fila1.setAttribute("class", id);
        let columna1 = document.createElement("td");
        let nombres = document.createTextNode(emisor);
        columna1.appendChild(nombres);
        fila1.appendChild(columna1);
        tabla.appendChild(fila1);

        let fila2 = document.createElement("tr");
        fila2.setAttribute("class", id);
        let columna2 = document.createElement("td");
        let msg = document.createTextNode(mensaje);
        columna2.appendChild(msg);
        fila2.appendChild(columna2);
        tabla.appendChild(fila2);
    }
    
}

setInterval(recuperarMensajes, 1500);