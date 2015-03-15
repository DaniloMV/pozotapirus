<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="/pozotapirus/public/css/base.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="/pozotapirus/public/js/funciones.js"></script>
<script src="/pozotapirus/public/js/validacionnuevo.js"></script>
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
	<section id="medidas" name="medidas" class="campoform">

		<section>
		<label>Diámetro E1:<spam class="obligatorio"> (*)</spam></label>
		{!! Form::text('txtdiametroe1', old('entrada_1'), ['id' => 'txtdiametroe1', 'placeholder' => 'metros']) !!} m
		{!! $errors->first('txtdiametroe1', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label>Diámetro E2:</label>
		{!! Form::text('txtdiametroe2', old('entrada_2'), ['id' => 'txtdiametroe2', 'placeholder' => 'metros']) !!} m
		{!! $errors->first('txtdiametroe2', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label>Diámetro E3:</label>
		{!! Form::text('txtdiametroe3', old('entrada_3'), ['id' => 'txtdiametroe3', 'placeholder' => 'metros']) !!} m
		{!! $errors->first('txtdiametroe3', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label>Diámetro E4:</label>
		{!! Form::text('txtdiametroe4', old('entrada_4'), ['id' => 'txtdiametroe4', 'placeholder' => 'metros']) !!} m
		{!! $errors->first('txtdiametroe4', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label>Diámetro E5:</label>
		{!! Form::text('txtdiametroe5', old('entrada_5'), ['id' => 'txtdiametroe5', 'placeholder' => 'metros']) !!} m
		{!! $errors->first('txtdiametroe5', '<p class="error_mensaje">:message</p>') !!}
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