<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Nuevo Usuario</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->
<form role="form" method="POST" action="../usuario/Crear">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<section class="campoform">
	<section>
	<label>Nombre:</label>
	<input id="txtusuario" name="txtusuario" type="text" value="{{ old('name') }}" required placeholder="Nombre Usuario"
	></input>
	</section>

	<section>
	<label>Email:</label>
	<input id="txtemail" name="txtemail" type="email" value="{{ old('email') }}" required placeholder="usuario@tapirus.com"></input>
	</section>

	<section>
	<label>Password:</label>
	<input id="txtpassword" name="txtpassword" type="password" required placeholder="password"></input>
	</section>

	<section>
	<label>Confirmar Password</label>
	<input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirmar Password">
	</section>

	<section>
	<label>Equipo:</label>
	{!! Form::select('UsuarioEquipo', App\Usuarioequipo::orderBy('equipo', 'Desc')->lists('equipo', 'id')) !!} 
	</section>

	<section>
	<label>Tipo Usuario:</label>
	{!! Form::select('UsuarioTipo', App\Usuariotipo::orderBy('tipo_usu', 'Desc')->lists('tipo_usu', 'id')) !!} 

	</section>
</section>

	<input class="btnguardar" type="submit" name="agregar_tipored" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('usuario','Regresar') !!} </p> 

</form>

@stop