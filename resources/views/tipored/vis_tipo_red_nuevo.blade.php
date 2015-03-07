<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Registro de Tipo de Red</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

	@if (count($errors) > 0)
		
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		
	@endif

	<form role="form" method="POST" action="../tipored/Crear">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<section>
			<label>Nombre:</label>
			<input type="text" name="Nombre" autofocus required 
			       value="<?php echo Input::old('Nombre'); ?>" placeholder="Tipo de Red"/>
		</section>
			<input type="submit" name="agregar_tipored" value="Guardar"/>
			<p> {!! link_to_route('tipored','Regresar') !!} </p> 

	</form>

@stop