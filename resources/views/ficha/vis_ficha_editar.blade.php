<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<h2 class="titulopagina">MODIFICAR FICHAS</h2>

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


<form role="form" method="POST" action="../ficha/Actualizar">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

	
<section id="fichacabecera" class="campoform">
	
	<section>
	<label>Parroquia:</label>
	{!! Form::select('cmbparroquia', App\Parroquia::orderBy('des_parroquia', 'Asc')->lists('des_parroquia', 'id'),$datos->parroquia_id) !!} 
	</section>

	<section >
	<label>Barrio:</label>
	{!! Form::select('cmbbarrio', App\Barrio::orderBy('des_barrio', 'Asc')->lists('des_barrio', 'id'),$datos->barrio_id) !!} 
	</section>

	<section>
	<label>Calle:</label>
	<input id="txtcalle" name="txtcalle" type="text" required value="<?php echo "{$datos->calle}"; ?>"  placeholder="nombre de la calle"
	></input>
	</section>
	<input type="hidden" name="hidden_sec"  value="<?php echo "{$datos->sec_ficha}"; ?>">
	<section>
	<label class="etiquetaform">Código:</label>
	<input id="txtpozocodigo" name="txtpozocodigo" type="text" required value="<?php echo "{$datos->id}"; ?>"  placeholder="código pozo"
	></input>
	</section>

</section>


<div id="accordion">
  
<h3>GENERAL</h3>

	<div>
		<section id="fichacombos" class="campoform">

			<section>
			<label>Tipo Red:</label>
			{!! Form::select('cmbtipored', App\Tipored::orderBy('des_tipored', 'Asc')->lists('des_tipored', 'id'), $datos->cmb_tipo_red_id) !!} 
			</section>

			<section>
			<label>Calzada:</label>
			{!! Form::select('cmbtipocalzada', App\Tipocalzada::orderBy('des_calzada', 'Asc')->lists('des_calzada', 'id'), $datos->cmb_tipo_calzada_id) !!} 
			</section>

			<section>
			<label>Material colector:</label>
			{!! Form::select('cmbmaterialcolector', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmb_material_colector_id) !!} 
			</section>

			<section>
			<label>Estado pozo:</label>
			{!! Form::select('cmbestadopozo', App\Estadopozo::orderBy('des_estadopozo', 'Asc')->lists('des_estadopozo', 'id'), $datos->cmb_estado_pozo_id) !!} 
			</section>
		</section>
	</div>
	  
	<h3>DETALLES</h3>
	<div>
		<section id="checkedlist" name="checkedlist" class="chkficha">
			
			<p>
			<input id="chklimpio" name="chklimpio" type="checkbox" value="1" <?php if($datos->es_limpio==1){echo "checked";} ?>></input>
			<label>Limpio</label>
			</p>
			
			<p>
			<input id="chkescalera" name="chkescalera" type="checkbox" value="1" <?php if($datos->es_escalera==1){echo "checked";} ?>></input>
			<label>Escalera</label>
			</p>
			
			<p>
			<input id="chkhormigon" name="chkhormigon" type="checkbox" value="1" <?php if($datos->es_hormigon==1){echo "checked";} ?>></input>
			<label>Hormigón</label>
			</p>

			<p>
			<input id="chkladrillo" name="chkladrillo" type="checkbox" value="1" <?php if($datos->es_ladrillo==1){echo "checked";} ?>></input>
			<label>Ladrillo</label>
			</p>

			<p>
			<input id="chkbloque" name="chkbloque" type="checkbox" value="1" <?php if($datos->es_bloque==1){echo "checked";} ?>></input>
			<label>Bloque</label>
			</p>	

			<p>	
			<input id="chkmixto" name="chkmixto" type="checkbox" value="1" <?php if($datos->es_mixto==1){echo "checked";} ?>></input>
			<label>Mixto</label>
			</p>

			<p>	
			<input id="chktapa" name="chktapa" type="checkbox" value="1" <?php if($datos->es_tapa==1){echo "checked";} ?>></input>
			<label>Tapa</label>
			</p>

			<p>	
			<input id="chkcadena" name="chkcadena" type="checkbox" value="1" <?php if($datos->es_cadena==1){echo "checked";} ?>></input>
			<label>Cadena</label>
			</p>

			<p>
			<input id="chkbisagra" name="chkbisagra" type="checkbox" value="1" <?php if($datos->es_bisagra==1){echo "checked";} ?>></input>
			<label>Bisagra</label>
			</p>

		</section>
	 </div>
	  
	<h3>COORDENADAS</h3>

	<div>
		
		<section id="coordenadas" name="coordenadas" class="campoform">

			<section>
				<label>Pozo:</label>
				<input id="txtpozo" name="txtpozo" type="text" required value="<?php echo "{$datos->pozo}"; ?>"></input>
			</section>

			<section>
				<label>Sumidero:</label>
				<input id="txtsumidero" name="txtsumidero" type="text" required value="<?php echo "{$datos->sumidero}"; ?>"></input>
			</section>
			
			<section>
				<label>Zona:</label>
				<input id="txtzona" name="txtzona" type="text" required value="<?php echo "{$datos->zona}"; ?>"></input>
			</section>

			<section>
				<label>X:</label>
				<input id="txtcoordenadax" name="txtcoordenadax" type="text" required value="<?php echo "{$datos->x}"; ?>"></input>
			</section>

			<section>
				<label>Y:</label>
				<input id="txtcoordenaday" name="txtcoordenaday" type="text" required value="<?php echo "{$datos->y}"; ?>"></input>
			</section>
			
			<section>
				<label>Z:</label>
				<input id="txtcoordenadaz" name="txtcoordenadaz" type="text" required value="<?php echo "{$datos->z}"; ?>"></input>
			</section>
		</section>

	</div>

	<h3>MEDIDAS</h3>
	<div>
		<section id="medidas" name="medidas" class="campoform">

			<section>
			<label>Cota:</label>
			<input id="txtcota" name="txtcota" type="text" required value="<?php echo "{$datos->cota}"; ?>"></input>
			</section>

			<section>
			<label>Diametro Sup:</label>
			<input id="txtdiametrosup" name="txtdiametrosup" type="text" required value="<?php echo "{$datos->diametro_sup}"; ?>" placeholder="Diámetro superior"/>
			</section>

			<section>
			<label>Diametro Medio:</label>
			<input id="txtdiametromedio" name="txtdiametromedio" type="text" required value="<?php echo "{$datos->diametro_med}"; ?>" placeholder="Diámetro intermedio"/>
			</section>

			<section>
			<label>Diametro Inf:</label>
			<input id="txtdiametroinf" name="txtdiametroinf" type="text" required value="<?php echo "{$datos->diametro_inf}"; ?>" placeholder="Diámetro inferior"/>
			</section>
			
			<section>
			<label>Altura:</label>
			<input id="txtaltura" name="txtaltura" type="text" required value="<?php echo "{$datos->altura}"; ?>" placeholder="Altura del pozo"/>
			</section>
		</section>
	</div>

	<h3>OBSERVACIONES</h3>

	<div>
		<section id="observaciones" class="campoform">
			<textarea rows="3" cols="40" value="<?php echo "{$datos->observaciones}"; ?>"></textarea>
		</section>
	</div>

</div>

	<input type="submit" name="agregar_ficha" class="btnguardar" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('ficha','Regresar') !!} </p> 

</form>

<script>
  		$(function() {
    	$( "#accordion" ).accordion();
  			});
</script>

@stop