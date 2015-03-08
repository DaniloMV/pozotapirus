<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Nuevo Usuario</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->
<form role="form" method="POST" action="../usuario/Crear">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section class="campoform">
	<label class="etiquetaform">Nombre:</label>
	<input id="txtusuario" name="txtusuario" class="valorcampo" type="text" value="{{ old('name') }}" required placeholder="Nombre Usuario"
	></input>
	</section>

	<section class="campoform">
	<label class="etiquetaform">Email:</label>
	<input id="txtemail" name="txtemail" class="valorcampo" type="email" value="{{ old('email') }}" required placeholder="usuario@tapirus.com"></input>
	</section>

	<section class="campoform">
	<label class="etiquetaform">Password:</label>
	<input id="txtpassword" name="txtpassword" class="valorcampo" type="password" required placeholder="password"></input>
	</section>

	<section class="campoform">
	<label class="etiquetaform">Confirmar Password</label>
	<input type="password" class="valorcampo" id="password_confirmation" name="password_confirmation" required placeholder="Confirmar Password">
	</section>

	<section class="campoform">
	<label class="etiquetaform">Equipo:</label>
	{!! Form::select('UsuarioEquipo', App\Usuarioequipo::orderBy('equipo', 'Desc')->lists('equipo', 'id')) !!} 
	</section>

	<section class="campoform">
	<label class="etiquetaform">Tipo Usuario:</label>
	{!! Form::select('UsuarioTipo', App\Usuariotipo::orderBy('tipo_usu', 'Desc')->lists('tipo_usu', 'id')) !!} 

	</section>

	<input type="submit" name="agregar_tipored" value="Guardar"/>
	<p> {!! link_to_route('usuario','Regresar') !!} </p> 

</form>

@stop