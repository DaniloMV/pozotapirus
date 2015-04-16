<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="/js/funciones.min.js"></script>
<script src="/js/validacionnuevo.min.js"></script>
<h2 class="titulopagina">INICIAR FICHA</h2>
<small class="tituloobligatorio">(*) CAMPOS OBLIGATORIOS</small>


    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

	@if($errors->has())

		<ul id="VisualizarMensaje">
			{!! implode('', $errors->all('<li>:message</li>')) !!}
		</ul>
	@endif

<form role="form" method="POST" action="../ficha/Crear">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
<section id="fichacabecera" class="campoform">
	
	<section>
	<label>Parroquia:</label>
	{!! Form::select('cmbparroquia', App\Parroquia::orderBy('des_parroquia', 'Asc')->lists('des_parroquia', 'id')) !!} 
	</section>
   
	<section >
	<label>Barrio:</label>
	{!! Form::select('cmbbarrio') !!} 
	</section>

	<section>
	<label>Calle:<spam class="obligatorio"> (*)</spam></label>
	{!! Form::text('txtcalle', old('calle'), ['id' => 'txtcalle', 'placeholder' => 'Nombre de la calle']) !!}
	{!! $errors->first('txtcalle', '<p class="error_mensaje">:message</p>') !!}
	</section>

	<section>
	<label class="etiquetaform">Código: <spam class="obligatorio"> (*)</spam></label>
	{!! Form::text('txtpozocodigo', old('id'), ['id' => 'txtpozocodigo', 'placeholder' => 'único (10 caracteres)', 'pattern' => '\S{1,10}']) !!}
	{!! $errors->first('txtpozocodigo', '<p class="error_mensaje">:message</p>') !!}
	</section>

</section>


<div id="accordion">
  
<h3 id="tabgeneral">GENERAL</h3>

<div>
	<section id="fichacombos" class="campoform">

		<section>
		<label>Tipo Red:</label>
		{!! Form::select('cmbtipored', App\Tipored::orderBy('des_tipored', 'Asc')->lists('des_tipored', 'id')) !!} 
		</section>

		<section>
		<label>Calzada:</label>
		{!! Form::select('cmbtipocalzada', App\Tipocalzada::orderBy('des_calzada', 'Asc')->lists('des_calzada', 'id')) !!} 
		</section>

		<section>
		<label>Material colector:</label>
		{!! Form::select('cmbmaterialcolector', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		</section>

		<section>
		<label>Tipo pozo:</label>
		{!! Form::select('cmbtipopozo', App\Tipopozo::orderBy('des_tipo_pozo', 'Asc')->lists('des_tipo_pozo', 'id')) !!} 
		</section>

		<section>
		<label>Tipo tapa:</label>
		{!! Form::select('cmbtipotapa', App\Tipotapa::orderBy('des_tipo_tapa', 'Asc')->lists('des_tipo_tapa', 'id')) !!} 
		</section>
	
		<section>
		<label>Estado pozo:</label>
		{!! Form::select('cmbestadopozo', App\Estadopozo::orderBy('des_estadopozo', 'Asc')->lists('des_estadopozo', 'id')) !!} 
		</section>
	</section>
</div>
  
<h3 id="tabdetalle">DETALLES</h3>
<div>
	<section id="checkedlist" name="checkedlist" class="chkficha">
		
		<p>
		<label>Limpio</label>
		{!! Form::checkbox('chklimpio', old('es_limpio')) !!}
		</p>
		
		<p>
		<label>Escalera</label>
		{!! Form::checkbox('chkescalera', old('es_escalera')) !!}
		</p>
		
		<p>
		<label>Hormigón</label>
		{!! Form::checkbox('chkhormigon', old('es_hormigon')) !!}
		</p>

		<p>
		<label>Ladrillo</label>
		{!! Form::checkbox('chkladrillo', old('es_ladrillo')) !!}
		</p>

		<p>
		<label>Bloque</label>
		{!! Form::checkbox('chkbloque', old('es_bloque')) !!}
		</p>	

		<p>
		<label>Mixto</label>
		{!! Form::checkbox('chkmixto', old('es_mixto')) !!}
		</p>

		<p>
		<label>Tapa</label>
		{!! Form::checkbox('chktapa', old('es_tapa')) !!}
		</p>

		<p>
		<label>Cadena</label>
		{!! Form::checkbox('chkcadena', old('es_cadena')) !!}
		</p>

		<p>
		<label>Bisagra</label>
		{!! Form::checkbox('chkbisagra', old('es_bisagra')) !!}
		</p>

	</section>
 </div>
  
<h3 id="tabcoordenada">COORDENADAS</h3>

<div>
	
	<section id="coordenadas" name="coordenadas" class="campoform">

		<section>
			<label>X: <spam class="obligatorio"> (*)</spam></label>
			{!! Form::text('txtcoordenadax', old('x'), ['placeholder' => '']) !!}
			{!! $errors->first('txtcoordenadax', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
			<label>Y:<spam class="obligatorio"> (*)</spam></label>
			{!! Form::text('txtcoordenaday', old('y'), ['placeholder' => '']) !!}
			{!! $errors->first('txtcoordenaday', '<p class="error_mensaje">:message</p>') !!}
		</section>
		
		<section>
			<label>Z:<spam class="obligatorio"> (*)</spam></label>
			{!! Form::text('txtcoordenadaz', old('z'), ['placeholder' => '']) !!}
			{!! $errors->first('txtcoordenadaz', '<p class="error_mensaje">:message</p>') !!}
		</section>
	</section>

</div>

<h3 id="tabmedida">MEDIDAS</h3>
<div>
	<section id="medidas" name="medidas">


		<section>
		<label>Diámetro Tapa:</label>
		{!! Form::text('txtdiametrotapa', old('diametro_tapa'), ['id' => 'txtdiametrotapa', 'placeholder' => 'diametro tapa']) !!} m
		{!! $errors->first('txtdiametrotapa', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label>Salida:<spam class="obligatorio"> (*)</spam></label>
		{!! Form::text('txtdiametrosalida', old('salida'), ['id' => 'txtdiametrosalida','placeholder' => 'metros']) !!} m
		{!! $errors->first('txtdiametrosalida', '<p class="error_mensaje">:message</p>') !!}
		</section>
		
		<section>
		<label>Altura:<spam class="obligatorio">(*)</spam></label>
		{!! Form::text('txtaltura', old('altura'), ['placeholder' => 'metros']) !!} m
		{!! $errors->first('txtaltura', '<p class="error_mensaje">:message</p>') !!}
		</section>
	</section>
</div>

<h3 id="tabentradas">ENTRADAS</h3>
<div>
	<section id="entradas" name="entradas">

	
		<label class="columna">Diámetro (m)</label>
		<label class="columna">Altura (m)</label>
		<label class="columna">Mat. Colector</label>
		<label class="columna">Cámara (m)</label>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe1', old('entrada_1'), ['id' => 'txtdiametroe1', 'class'=>'columna','placeholder' => 'diametro 1']) !!}
		{!! $errors->first('txtdiametroe1', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae1', old('altura_1'), ['id' => 'txtalturae1', 'class'=>'columna','placeholder' => 'altura 1']) !!}
		{!! $errors->first('txtalturae1', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore1', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 

		{!! Form::text('txtcamarae1', old('camara_1'), ['id' => 'txtcamarae1', 'class'=>'columna','placeholder' => 'cámara 1']) !!}
		{!! $errors->first('txtcamarae1', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe2', old('entrada_2'), ['id' => 'txtdiametroe2', 'class'=>'columna','placeholder' => 'diametro 2']) !!}
		{!! $errors->first('txtdiametroe2', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae2', old('altura_2'), ['id' => 'txtalturae2', 'class'=>'columna','placeholder' => 'altura 2']) !!}
		{!! $errors->first('txtalturae2', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore2', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae2', old('camara_2'), ['id' => 'txtcamarae2', 'class'=>'columna','placeholder' => 'cámara 2']) !!}
		{!! $errors->first('txtcamarae2', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe3', old('entrada_3'), ['id' => 'txtdiametroe3', 'class'=>'columna','placeholder' => 'diametro 3']) !!}
		{!! $errors->first('txtdiametroe3', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae3', old('altura_3'), ['id' => 'txtalturae3', 'class'=>'columna','placeholder' => 'altura 3']) !!}
		{!! $errors->first('txtalturae3', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore3', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae3', old('camara_3'), ['id' => 'txtcamarae3', 'class'=>'columna','placeholder' => 'cámara 3']) !!}
		{!! $errors->first('txtcamarae3', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe4', old('entrada_4'), ['id' => 'txtdiametroe4', 'class'=>'columna','placeholder' => 'diametro 4']) !!}
		{!! $errors->first('txtdiametroe4', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae4', old('altura_4'), ['id' => 'txtalturae4', 'class'=>'columna','placeholder' => 'altura 4']) !!}
		{!! $errors->first('txtalturae4', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore4', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae4', old('camara_4'), ['id' => 'txtcamarae4', 'class'=>'columna','placeholder' => 'cámara 4']) !!}
		{!! $errors->first('txtcamarae4', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe5', old('entrada_5'), ['id' => 'txtdiametroe5', 'class'=>'columna','placeholder' => 'diametro 5']) !!}
		{!! $errors->first('txtdiametroe5', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae5', old('altura_5'), ['id' => 'txtalturae5', 'class'=>'columna','placeholder' => 'altura 5']) !!}
		{!! $errors->first('txtalturae5', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore5', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae5', old('camara_5'), ['id' => 'txtcamarae5', 'class'=>'columna','placeholder' => 'cámara 5']) !!}
		{!! $errors->first('txtcamarae5', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe6', old('entrada_6'), ['id' => 'txtdiametroe6', 'class'=>'columna','placeholder' => 'diametro 6']) !!}
		{!! $errors->first('txtdiametroe6', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae6', old('altura_6'), ['id' => 'txtalturae6', 'class'=>'columna','placeholder' => 'altura 6']) !!}
		{!! $errors->first('txtalturae6', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore6', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae6', old('camara_6'), ['id' => 'txtcamarae6', 'class'=>'columna','placeholder' => 'cámara 6']) !!}
		{!! $errors->first('txtcamarae6', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe7', old('entrada_7'), ['id' => 'txtdiametroe7', 'class'=>'columna','placeholder' => 'diametro 7']) !!}
		{!! $errors->first('txtdiametroe7', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae7', old('altura_7'), ['id' => 'txtalturae7', 'class'=>'columna','placeholder' => 'altura 7']) !!}
		{!! $errors->first('txtalturae7', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore7', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae7', old('camara_7'), ['id' => 'txtcamarae7', 'class'=>'columna','placeholder' => 'cámara 7']) !!}
		{!! $errors->first('txtcamarae7', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe8', old('entrada_8'), ['id' => 'txtdiametroe8', 'class'=>'columna','placeholder' => 'diametro 8']) !!}
		{!! $errors->first('txtdiametroe8', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae8', old('altura_8'), ['id' => 'txtalturae8', 'class'=>'columna','placeholder' => 'altura 8']) !!}
		{!! $errors->first('txtalturae8', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore8', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae8', old('camara_8'), ['id' => 'txtcamarae8', 'class'=>'columna','placeholder' => 'cámara 8']) !!}
		{!! $errors->first('txtcamarae8', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe9', old('entrada_9'), ['id' => 'txtdiametroe9', 'class'=>'columna','placeholder' => 'diametro 9']) !!}
		{!! $errors->first('txtdiametroe9', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae9', old('altura_9'), ['id' => 'txtalturae9', 'class'=>'columna','placeholder' => 'altura 9']) !!}
		{!! $errors->first('txtalturae9', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore9', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae9', old('camara_9'), ['id' => 'txtcamarae9', 'class'=>'columna','placeholder' => 'cámara 9']) !!}
		{!! $errors->first('txtcamarae9', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe10', old('entrada_10'), ['id' => 'txtdiametroe10', 'class'=>'columna','placeholder' => 'diametro 10']) !!}
		{!! $errors->first('txtdiametroe10', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae10', old('altura_10'), ['id' => 'txtalturae10', 'class'=>'columna','placeholder' => 'altura 10']) !!}
		{!! $errors->first('txtalturae10', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore10', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae10', old('camara_10'), ['id' => 'txtcamarae10', 'class'=>'columna','placeholder' => 'cámara 10']) !!}
		{!! $errors->first('txtcamarae10', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe11', old('entrada_11'), ['id' => 'txtdiametroe11', 'class'=>'columna','placeholder' => 'diametro 11']) !!}
		{!! $errors->first('txtdiametroe11', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae11', old('altura_11'), ['id' => 'txtalturae11', 'class'=>'columna','placeholder' => 'altura 11']) !!}
		{!! $errors->first('txtalturae11', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore11', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae11', old('camara_11'), ['id' => 'txtcamarae11', 'class'=>'columna','placeholder' => 'cámara 11']) !!}
		{!! $errors->first('txtcamarae11', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
		
		{!! Form::text('txtdiametroe12', old('entrada_12'), ['id' => 'txtdiametroe12', 'class'=>'columna','placeholder' => 'diametro 12']) !!}
		{!! $errors->first('txtdiametroe12', '<p class="error_mensaje">:message</p>') !!}
		
		
		{!! Form::text('txtalturae12', old('altura_12'), ['id' => 'txtalturae12', 'class'=>'columna','placeholder' => 'altura 12']) !!}
		{!! $errors->first('txtalturae12', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore12', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id')) !!} 
		
		{!! Form::text('txtcamarae12', old('camara_12'), ['id' => 'txtcamarae12', 'class'=>'columna','placeholder' => 'cámara 12']) !!}
		{!! $errors->first('txtcamarae12', '<p class="error_mensaje">:message</p>') !!}

		</section>

	</section>
</div>

<h3 id="tabobservacion">OBSERVACIONES</h3>

<div>
	<section class="campoform">
		{!! Form::textarea('observaciones', old('observaciones'), ['rows' => '3', 'cols' => '40']) !!}
	</section>
</div>

</div>

	<input type="submit" id="btnguardaficha" class="btnguardar" name="agregar_ficha" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('ficha','Regresar') !!} </p> 

</form>

<script>
  	


$(function() {

	$( "#accordion" ).accordion({heightStyle: "content"});
	$( "#accordion" ).accordion( "option", "icons", { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" } );
	$( "#accordion" ).accordion({collapsible: true});

	$( "#accordion" ).accordion();

});


  		
</script>

@stop