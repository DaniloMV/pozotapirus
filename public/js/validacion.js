$(document).on("ready",funciones)

function funciones(){
    $("#btnguardaficha").on("click",validaficha);
}

function validaficha(){

    var str_Mensaje="Por verifique lo siguiente:"
    var es_Correcto=true;

    if($.trim($("#txtpozocodigo").val()).length!=10)
    {
        str_Mensaje=str_Mensaje+"\n- El código de pozo debe tener 10 caracteres";
        es_Correcto=false;
    }

    if($.trim($("#txtcalle").val()).length==0)
    {
        str_Mensaje=str_Mensaje+"\n- Es importante ingresar el nombre de la calle";
        es_Correcto=false;
    }

    if($.trim($("#txtcoordenadax").val()).length==0)
    {
        str_Mensaje=str_Mensaje+"\n- El valor de la coordenada en 'X' es obligatorio";
        es_Correcto=false;
    }
    else if(isNaN($("#txtcoordenadax").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El valor de la coordenada en 'X' debe ser númerico";
        es_Correcto=false;   
    }

    if($.trim($("#txtcoordenaday").val()).length==0)
    {
        str_Mensaje=str_Mensaje+"\n- El valor de la coordenada en 'Y' es obligatorio";
        es_Correcto=false;
    }
    else if(isNaN($("#txtcoordenaday").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El valor de la coordenada en 'Y' debe ser númerico";
        es_Correcto=false;   
    }

    if(es_Correcto==false)
    {
        alert(str_Mensaje);
        return false;
    }    
    return true;
}
