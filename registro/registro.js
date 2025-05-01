function verificar_campo(campo,longitud,limite){
    let nombre = document.getElementById(campo).value;
    if(campo=="correo"){
        if(nombre==""){
            document.getElementById(campo).style.border="red 1px solid";
            document.getElementById('error_'+campo).innerHTML="Debe estar relleno"
            return false;
        } else {
            document.getElementById(campo).style.border="";
            document.getElementById('error_'+campo).innerHTML="";
            return true;
        }
    } else {
        if(nombre.length<longitud || nombre.length>limite){
            document.getElementById(campo).style.border="red 1px solid";

            if(campo == "password"){
                document.getElementById('error_'+campo).innerHTML="Debe tener de 8 a 15 caracteres";
            }

            if(campo == "nombre"){
                document.getElementById('error_'+campo).innerHTML="Debe tener de 2 a 30 caracteres";
            }

            if(campo == "apellidos"){
                document.getElementById('error_'+campo).innerHTML="Debe tener de 2 a 50 caracteres";
            }

            return false;
        } else{
            document.getElementById(campo).style.border="";
            document.getElementById('error_'+campo).innerHTML="";
            return true;
        }
    }
}



function verificar(){
    let formulario = document.getElementById('formulario'); 
    let validar = true;
        if(!verificar_campo("nombre",2,30)){
            validar = false;
        }

        if(!verificar_campo("apellidos",2,50)){
            validar = false;
        }

        if(!verificar_campo("correo")){
            validar = false;
        }
        if(!verificar_campo("password",8,15)){
            validar = false;
        }


    if(validar){
        formulario.submit();
    } else {
        document.getElementById('error').innerHTML="Hay campos sin rellenar";
    }
}