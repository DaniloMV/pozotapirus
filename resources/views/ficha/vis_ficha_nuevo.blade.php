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
<script src="/pozotapirus/public/js/validacion.js"></script>
<h2 class="titulopagina">INICIAR FICHA</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

	@if (count($errors) > 0)
		
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		
	@endif

<form role="form" method="POST" action="../ficha/Crear">


<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">


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
	<label>Calle:</label>
	<input id="txtcalle" name="txtcalle" type="text" value="{{ old('calle') }}" required placeholder="nombre de la calle"
	></input>
	</section>

	<section>
	<label class="etiquetaform">Código:</label>
	<input id="txtpozocodigo" name="txtpozocodigo" type="text" value="{{ old('id') }}" required placeholder="único (10 caracteres)"
	></input>
	</section>

</section>


<div id="accordion">
  
<h3>GENERAL</h3>

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
	  
	<h3>DETALLES</h3>
	<div>
		<section id="checkedlist" name="checkedlist" class="chkficha">
			
			<p>
			<input id="chklimpio" name="chklimpio" type="checkbox" value="{{ old('es_limpio') }}" ></input>
			<label>Limpio</label>
			</p>
			
			<p>
			<input id="chkescalera" name="chkescalera" type="checkbox" value="{{ old('es_escalera') }}"></input>
			<label>Escalera</label>
			</p>
			
			<p>
			<input id="chkhormigon" name="chkhormigon" type="checkbox" value="1"></input>
			<label>Hormigón</label>
			</p>

			<p>
			<input id="chkladrillo" name="chkladrillo" type="checkbox" value="1"></input>
			<label>Ladrillo</label>
			</p>

			<p>
			<input id="chkbloque" name="chkbloque" type="checkbox" value="1"></input>
			<label>Bloque</label>
			</p>	

			<p>	
			<input id="chkmixto" name="chkmixto" type="checkbox" value="1"></input>
			<label>Mixto</label>
			</p>

			<p>	
			<input id="chktapa" name="chktapa" type="checkbox" value="1"></input>
			<label>Tapa</label>
			</p>

			<p>	
			<input id="chkcadena" name="chkcadena" type="checkbox" value="1"></input>
			<label>Cadena</label>
			</p>

			<p>
			<input id="chkbisagra" name="chkbisagra" type="checkbox" value="1"></input>
			<label>Bisagra</label>
			</p>

		</section>
	 </div>
	  
	<h3>COORDENADAS</h3>

	<div>
		
		<section id="coordenadas" name="coordenadas" class="campoform">

			<section>
				<label>X:</label>
				<input id="txtcoordenadax" name="txtcoordenadax" required type="text"/>
			</section>

			<section>
				<label>Y:</label>
				<input id="txtcoordenaday" name="txtcoordenaday" required type="text"/>
			</section>
			
			<section>
				<label>Z:</label>
				<input id="txtcoordenadaz" name="txtcoordenadaz" required type="text"/>
			</section>
		</section>

	</div>

	<h3>MEDIDAS</h3>
	<div>
		<section id="medidas" name="medidas" class="campoform">

			<section>
			<label>Diámetro E1:</label>
			<input id="txtdiametroe1" name="txtdiametroe1" type="text" required placeholder="metros"/>m
			</section>

			<section>
			<label>Diámetro E2:</label>
			<input id="txtdiametroe2" name="txtdiametroe2" type="text" required placeholder="metros"/>m
			</section>

			<section>
			<label>Diámetro E3:</label>
			<input id="txtdiametroe3" name="txtdiametroe3" type="text" required placeholder="metros"/>m
			</section>

			<section>
			<label>Diámetro E4:</label>
			<input id="txtdiametroe4" name="txtdiametroe4" type="text" required placeholder="metros"/>m
			</section>

			<section>
			<label>Diámetro E5:</label>
			<input id="txtdiametroe5" name="txtdiametroe5" type="text" required placeholder="metros"/>m
			</section>

			<section>
			<label>Salida:</label>
			<input id="txtdiametrosalida" name="txtdiametrosalida" type="text" required placeholder="metros"/>m
			</section>
			
			<section>
			<label>Altura:</label>
			<input id="txtaltura" name="txtaltura" type="text" required placeholder="metros"/>m
			</section>
		</section>
	</div>

	<h3>OBSERVACIONES</h3>

	<div>
		<section class="campoform">
			<textarea id="observaciones" name="observaciones" rows="3" cols="40"></textarea>
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