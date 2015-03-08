<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Nuevo Usuario</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')

@if (count($errors) > 0)
		
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		
	@endif

<!-- ponemos el contenido de la vista estamos dentro del body -->
<form role="form" method="POST" action="../barrio/Crear">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section>
	<label>Nombre:</label>
	<input id="txtparroquia" name="txtparroquia" type="text" value="{{ old('name') }}" required placeholder="Nombre Parroquia"
	></input>
	</section>

	<input type="submit" name="agregar_parroquia" value="Guardar"/>
	<p> {!! link_to_route('barrio','Regresar') !!} </p> 

</form>

@stop