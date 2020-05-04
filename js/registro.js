function verificarClave(){

        let clave1 = document.getElementById("clave").value;
        let clave2 = document.getElementById("verificar-clave").value;
        let msg_container = document.getElementById("aviso");
        msg_container.textContent = "";

        if(clave1 == clave2){
            msg("Las claves coinciden", "green");
        }else{
            msg("Las claves no coinciden", "red");
        }

}

function obtenerRegistro(){
    let nombres = document.getElementById("nombres").value;
    let apellidos = document.getElementById("apellidos").value;
    let documento = document.getElementById("documento").value;
    let correo = document.getElementById("correo").value;
    let clave1 = document.getElementById("clave").value;
    let clave2 = document.getElementById("verificar-clave").value;

    if (nombres.length == 0 || apellidos.length == 0 || documento.length == 0 || correo.length == 0 || clave1.length == 0 || clave2.length == 0)
    {
        msg("Llene todos los campos imbécil", "red");
    }
    else if (clave1 != clave2)
    {
        msg("Las claves no coinciden", "red");
    }
    else
    {
        let xhr=new XMLHttpRequest();
        xhr.open("POST","includes/registro.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("nombres=" + nombres + "&apellidos=" + apellidos + "&documento=" + documento + "&correo=" + correo + "&clave=" + clave);
    }
    
}

function msg(mensaje, color){

    let msg_container = document.getElementById("aviso");
    msg_container.textContent = "";
    msg_container.style.color = color;
    let msg = document.createTextNode(mensaje);
    msg_container.appendChild(msg);

}