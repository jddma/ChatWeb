function validarLogin(){

    let usuario = document.getElementById("correo_login").value;
    let clave = document.getElementById("clave_login").value;
    if (clave.length == 0 || usuario.length == 0)
    {
        msg_login("Campos sin llenar");
    }
    else
    {
        let ajaxObj = new XMLHttpRequest();
        ajaxObj.open("POST", "includes/login.php", true);
        ajaxObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajaxObj.onreadystatechange = function(){

            if (ajaxObj.responseText == "-1")
            {
                console.log("Correcto");
            }
            else
            {
                /**
                 * en caso de que la respuesta del servidor sea diferente
                 * a -1 entonces hubo un error y se procese a mostrarlo en
                 * pantalla
                 */
                switch (ajaxObj.responseText) 
                {
                    case "registro":
                        msg_login("Usuario o registrado");
                        break;

                    case "clave":
                        msg_login("Contraseña incorrecta")
                        break;
                
                    default:
                        break;
                }
            }

        }
        ajaxObj.send("usuario=" + usuario + "&clave=" +clave);
    }

}

function msg_login(mensaje){

    let msg_container = document.getElementById("msg_login");
    msg_container.textContent = "";
    let msg = document.createTextNode(mensaje);
    msg_container.appendChild(msg);
    msg_container.style.display = "block";

}