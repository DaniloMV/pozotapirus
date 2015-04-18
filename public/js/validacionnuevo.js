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
    //DIÁMETROS
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
    //ALTURAS
    if($.trim($("#txtalturae1").val()).length>0 
        && isNaN($("#txtalturae1").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 1' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae1").val()).length>0 
        && parseFloat($("#txtalturae1").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 1' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtalturae2").val()).length>0 
        && isNaN($("#txtalturae2").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 2' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae2").val()).length>0 
        && parseFloat($("#txtalturae2").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 2' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae3").val()).length>0 
        && isNaN($("#txtalturae3").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 3' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae3").val()).length>0 
        && parseFloat($("#txtalturae3").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 3' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtalturae4").val()).length>0 
        && isNaN($("#txtalturae4").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 4' debe ser numérico";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae4").val()).length>0 
        && parseFloat($("#txtalturae4").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 4' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae5").val()).length>0 
        && isNaN($("#txtalturae5").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 5' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae5").val()).length>0 
        && parseFloat($("#txtalturae5").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 5' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae6").val()).length>0 
        && isNaN($("#txtalturae6").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 6' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae6").val()).length>0 
        && parseFloat($("#txtalturae6").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 6' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae7").val()).length>0 
        && isNaN($("#txtalturae7").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 7' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae7").val()).length>0 
        && parseFloat($("#txtalturae7").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 7' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae8").val()).length>0 
        && isNaN($("#txtalturae8").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 8' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae8").val()).length>0 
        && parseFloat($("#txtalturae8").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 8' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae9").val()).length>0 
        && isNaN($("#txtalturae9").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 9' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae9").val()).length>0 
        && parseFloat($("#txtalturae9").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 9' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae10").val()).length>0 
        && isNaN($("#txtalturae10").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 10' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae10").val()).length>0 
        && parseFloat($("#txtalturae10").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 10' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtalturae11").val()).length>0 
        && isNaN($("#txtalturae11").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 11' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae11").val()).length>0 
        && parseFloat($("#txtalturae11").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 11' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtalturae12").val()).length>0 
        && isNaN($("#txtalturae12").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 12' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtalturae12").val()).length>0 
        && parseFloat($("#txtalturae12").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Altura de la Entrada 12' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    //CAMARAS
    if($.trim($("#txtcamarae1").val()).length>0 
        && isNaN($("#txtcamarae1").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 1' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae1").val()).length>0 
        && parseFloat($("#txtcamarae1").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 1' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtcamarae2").val()).length>0 
        && isNaN($("#txtcamarae2").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 2' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae2").val()).length>0 
        && parseFloat($("#txtcamarae2").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 2' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae3").val()).length>0 
        && isNaN($("#txtcamarae3").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 3' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae3").val()).length>0 
        && parseFloat($("#txtcamarae3").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 3' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtcamarae4").val()).length>0 
        && isNaN($("#txtcamarae4").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 4' debe ser numérico";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae4").val()).length>0 
        && parseFloat($("#txtcamarae4").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 4' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae5").val()).length>0 
        && isNaN($("#txtcamarae5").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 5' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae5").val()).length>0 
        && parseFloat($("#txtcamarae5").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 5' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae6").val()).length>0 
        && isNaN($("#txtcamarae6").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 6' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae6").val()).length>0 
        && parseFloat($("#txtcamarae6").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 6' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae7").val()).length>0 
        && isNaN($("#txtcamarae7").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 7' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae7").val()).length>0 
        && parseFloat($("#txtcamarae7").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 7' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae8").val()).length>0 
        && isNaN($("#txtcamarae8").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 8' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae8").val()).length>0 
        && parseFloat($("#txtcamarae8").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 8' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae9").val()).length>0 
        && isNaN($("#txtcamarae9").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 9' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae9").val()).length>0 
        && parseFloat($("#txtcamarae9").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 9' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae10").val()).length>0 
        && isNaN($("#txtcamarae10").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 10' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae10").val()).length>0 
        && parseFloat($("#txtcamarae10").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 10' debe ser mayor o igual a cero";
        es_Correcto=false;
    }
    
    if($.trim($("#txtcamarae11").val()).length>0 
        && isNaN($("#txtcamarae11").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 11' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae11").val()).length>0 
        && parseFloat($("#txtcamarae11").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 11' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if($.trim($("#txtcamarae12").val()).length>0 
        && isNaN($("#txtcamarae12").val())==true)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 12' debe ser numérico";
        es_Correcto=false;
    }
    if($.trim($("#txtcamarae12").val()).length>0 
        && parseFloat($("#txtcamarae12").val())<0)
    {
        str_Mensaje=str_Mensaje+"\n- La 'Cámara de la Entrada 12' debe ser mayor o igual a cero";
        es_Correcto=false;
    }

    if(es_Correcto==false)
    {
        alert(str_Mensaje);
        return false;
    }    
    return true;
}
