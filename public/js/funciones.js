$(document).on("ready",funciones)

function funciones(){

	$("select[name=cmbparroquia]").on("change",cargabarrio);
	cargabarrio();
}

function cargabarrio() {
    $.ajax({
        url: '../ficha/Buscar/'+$("select[name=cmbparroquia]").val(),
        type: 'GET',
        data: {Parroquia: $("select[name=cmbparroquia]").val()},
        dataType: 'JSON',
        beforeSend: function() {
            $("#respuesta").html('Buscando por favor espere...');
        },
        error: function() {
            $("#respuesta").html('<div> Ha surgido un error</div>');
        },
        success: function(respuesta) {
        	
            if (respuesta) {
            	var str_Combo="";	
                for(datos in respuesta.listados){

                    sec = respuesta.listados[datos].id;
                    nombre = respuesta.listados[datos].des_barrio;
                    
                    str_Combo+="<option value="+sec+">"+nombre+"</option>";
                }
                $("select[name=cmbbarrio]").html(str_Combo);
            } else {
                $("select[name=cmbbarrio]").html('');
            }
        }
    });
}




