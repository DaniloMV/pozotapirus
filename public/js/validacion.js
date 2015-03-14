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

    if($.trim($("#txtcoordenadaz").val()).length==0)
    {
        str_Mensaje=str_Mensaje+"\n- El valor de la coordenada en 'Z' es obligatorio";
        es_Correcto=false;
    }
    else if(isNaN($("#txtcoordenadaz").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El valor de la coordenada en 'Z' debe ser númerico";
        es_Correcto=false;   
    }

    if($.trim($("#txtdiametroe1").val()).length==0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 1' es obligatorio";
        es_Correcto=false;
    }
    else if(isNaN($("#txtdiametroe1").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 1' debe ser numérico";
        es_Correcto=false;   
    }
    else if(parseFloat($("#txtdiametroe1").val())<=0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 1' debe ser mayor a cero";
        es_Correcto=false;   
    }
    

    if($.trim($("#txtdiametroe2").val()).length>0 
        && isNaN($("#txtdiametroe2").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 2' debe ser numérico";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe2").val()).length>0 
        && parseFloat($("#txtdiametroe2").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 2' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe3").val()).length>0 
        && isNaN($("#txtdiametroe3").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 3' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe3").val()).length>0 
        && parseFloat($("#txtdiametroe3").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 3' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtdiametroe4").val()).length>0 
        && isNaN($("#txtdiametroe4").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 4' debe ser numérico";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe4").val()).length>0 
        && parseFloat($("#txtdiametroe4").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 4' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe5").val()).length>0 
        && isNaN($("#txtdiametroe5").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 5' debe ser numérico";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe5").val()).length>0 
        && parseFloat($("#txtdiametroe5").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 5' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtdiametrosalida").val()).length==0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de Salida' es obligatorio";
        es_Correcto=false;
    }
    else if(isNaN($("#txtdiametrosalida").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de Salida' debe ser númerico";
        es_Correcto=false;   
    }
    else if(parseFloat($("#txtdiametrosalida").val())<=0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de Salida' debe ser mayor a cero";
        es_Correcto=false;   
    }

    if(es_Correcto==false)
    {
        alert(str_Mensaje);
        return false;
    }    
    return true;
}
