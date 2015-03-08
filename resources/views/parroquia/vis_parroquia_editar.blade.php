<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Editar Parroquia</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->
<form role="form" method="POST" action="../Actualizar">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	{!! Form::hidden('hidden_id', $datos->id) !!}  
	<section>
	<label>Nombre:</label>
	<input id="txtparroquia" name="txtparroquia" type="text" value="<?php echo "{$datos->des_parroquia}"; ?>" required placeholder="Nombre Parroquia"
	></input>
	</section>

	<input type="submit" name="agregar_parroquia" value="Guardar"/>
	<p> {!! link_to_route('parroquia','Regresar') !!} </p> 

</form>

@stop