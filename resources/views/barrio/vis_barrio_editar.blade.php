<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Editar Barrios</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->
<form role="form" method="POST" action="../Actualizar">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	{!! Form::hidden('hidden_id', $datos->id) !!}  
	{!! Form::hidden('hidden_id_parroquia', $datos->parroquia_id) !!}  
	<section class="campoform">
	<section>
	<label>Nombre:</label>
	<input id="txtbarrio" name="txtbarrio" type="text" value="<?php echo "{$datos->des_barrio}"; ?>" required placeholder="Nombre Barrio"
	></input>
	</section>
	</section>

	<input type="submit" class="btnguardar" name="agregar_barrio" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('barrio','Regresar') !!} </p> 

</form>

@stop