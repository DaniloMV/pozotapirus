$(document).on("ready",funciones)

function funciones(){
    $("#btnguardaficha").on("click",validaficha);
}

function validaficha(){

    var str_Mensaje="Por favor verifique lo siguiente:"
    var es_Correcto=true;

    if($.trim($("#txtpozocodigo").val()).length!=10)
    {
        str_Mensaje=str_Mensaje+"\n- El código de pozo debe tener 10 caracteres";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe1").val()).length>0 
        && isNaN($("#txtdiametroe1").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 1' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe1").val()).length>0 
        && parseFloat($("#txtdiametroe1").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 1' debe ser mayor o igual a cero";
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

    if($.trim($("#txtdiametroe6").val()).length>0 
        && isNaN($("#txtdiametroe6").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 6' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe6").val()).length>0 
        && parseFloat($("#txtdiametroe6").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 6' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe7").val()).length>0 
        && isNaN($("#txtdiametroe7").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 7' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe7").val()).length>0 
        && parseFloat($("#txtdiametroe7").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 7' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe8").val()).length>0 
        && isNaN($("#txtdiametroe8").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 8' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe8").val()).length>0 
        && parseFloat($("#txtdiametroe8").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 8' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe9").val()).length>0 
        && isNaN($("#txtdiametroe9").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 9' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe9").val()).length>0 
        && parseFloat($("#txtdiametroe9").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 9' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe10").val()).length>0 
        && isNaN($("#txtdiametroe10").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 10' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe10").val()).length>0 
        && parseFloat($("#txtdiametroe10").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 10' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtdiametroe11").val()).length>0 
        && isNaN($("#txtdiametroe11").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 11' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe11").val()).length>0 
        && parseFloat($("#txtdiametroe11").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 11' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametroe12").val()).length>0 
        && isNaN($("#txtdiametroe12").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 12' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametroe12").val()).length>0 
        && parseFloat($("#txtdiametroe12").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Entrada 12' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtdiametrosalida").val()).length>0 
        && isNaN($("#txtdiametrosalida").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Salida' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtdiametrosalida").val()).length>0 
        && parseFloat($("#txtdiametrosalida").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- El 'Diámetro de la Salida' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    
    if(es_Correcto==false)
    {
        alert(str_Mensaje);
        return false;
    }    
    return true;
}
