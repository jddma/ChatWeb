

$(document).ready(function(){
    $("#verificar-clave").keyup(function(){//Activa la verificación cuando se pulsa una tecla
                                           //en el campo de la verificar la contraseña
        let clave1 = $("#clave").val();
        let clave2 = $("#verificar-clave").val();

        if(clave1 == clave2){
            $("#aviso").text("Las contraseñas coinciden").css("color", "green");
        }else{
            $("#aviso").text("Las contraseñas no coinciden").css("color", "red");
        }

        if(clave2 == ""){
            $("#aviso").text("Hay campos en blanco").css("color", "red");
        }
    });
});

function obtenerRegistro(){
    let nombres = $("#nombres").val();
    let apellidos = $("#apellidos").val();
    let documento = $("#documento").val();
    let correo = $("#correo").val();
    let clave1 = $("#clave").val();
    let clave2 = $("#verificar-clave").val();

    if(nombres != "" || apellidos != "" || documento != "" || correo != "" || clave1 != "" || clave2 != ""){
        if(clave1 == clave2){
            let xhr=new XMLHttpRequest();
            xhr.open("POST","./includes/registro.php",true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //onReady para refrescar la
            xhr.send("nombres=" + nombres & "apellidos=" + apellidos & "documento=" + documento &
                     "correo=" +correo & "clave="+clave);
        }else{
            $("#aviso").text("Todos los campos deben ser rellenados").css("color", "red");
        }
    }
}
