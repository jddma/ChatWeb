
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
        msg("Faltan campos por rellenar", "red");
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
        xhr.onreadystatechange = function(){
            
            if(this.readyState == 4 && this.status == 200){
                console.log(xhr.responseText);
            }

            switch (xhr.responseText) 
            {
                case "-1":
                    console.log("Usuario repetido");
                    msg("Ya existe una cuenta vinculada a esta dirección de correo electrónico", "red");
                    break;
                case "1":
                    console.log("Usuario válido")
                    msg("Usuario creado con éxito", "green");
                    
                    /*
                    * Si el usuario se registra con éxito el sistema automaticamente
                    * permite su ingreso al sistema
                    */
                    iniciarSesion(correo, clave1);
                    break;
            }
        }
        xhr.send("nombres=" + nombres + "&apellidos=" + apellidos + "&documento=" + documento + 
                 "&correo=" + correo + "&clave=" + clave1);
    }
    
}

function msg(mensaje, color){

    let msg_container = document.getElementById("aviso");
    msg_container.textContent = "";
    msg_container.style.color = color;
    let msg = document.createTextNode(mensaje);
    msg_container.appendChild(msg);

}

function iniciarSesion(correo, clave){

    let xhr=new XMLHttpRequest();
    xhr.open("POST", "includes/login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function(){
        if (xhr.responseText == "-1"){
                window.location = "chat/";
        }
    }
    xhr.send("usuario=" + correo + "&clave=" + clave);
}