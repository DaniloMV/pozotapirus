<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Nuevo Barrio</h2>

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

	<section class="campoform">
	<section>
	<label>Parroquia:</label>
	{!! Form::select('cmbparroquia', App\Parroquia::orderBy('des_parroquia', 'Asc')->lists('des_parroquia', 'id')) !!} 
	</section>
	
	<section>
	<label>Nombre:</label>
	<input id="txtbarrio" name="txtbarrio" type="text" value="{{ old('name') }}" required placeholder="Nombre Barrio"
	></input>
	</section>
</section>
	<input class="btnguardar" type="submit" name="agregar_parroquia" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('parroquia','Regresar') !!} </p> 

</form>

@stop