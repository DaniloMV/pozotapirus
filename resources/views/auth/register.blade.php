<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Registro de Usuario</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')


	@if (count($errors) > 0)
		
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		
	@endif

	<form role="form" method="POST" action="../auth/register">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<section class="campoform">
		<label class="etiquetaform">Nombre:</label>
		<input id="txtusuario" name="txtusuario" class="valorcampo" type="text" value="{{ old('name') }}" required placeholder="nombre usuario"
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
		{!! Form::select('TipoUsuario', App\Usuariotipo::orderBy('tipo_usu', 'Desc')->lists('tipo_usu', 'id')) !!} 
   
		</section>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Crear Usuario
				</button>
			</div>
		</div>

	</form>

@stop