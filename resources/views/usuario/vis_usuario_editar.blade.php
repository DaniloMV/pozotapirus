<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Editar Usuario</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

	@if($errors->has())

		<ul id="VisualizarMensaje">
			{{ implode('', $errors->all('<li>:message</li>')) }}
		</ul>
	@endif
<form role="form" method="POST" action="../Actualizar">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<section class="campoform">
		<section>
		<label>Nombre:</label>
		<input id="txtusuario" name="txtusuario" type="text" value=<?php echo "{$datos->name}"; ?> required placeholder="Nombre Usuario"></input>
		{!! $errors->first('txtusuario', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label >Email:</label>
		<input id="txtemail" name="txtemail" type="email" value=<?php echo "{$datos->email}"; ?> disabled required placeholder="usuario@tapirus.com"></input>
	    {!! $errors->first('txtemail', '<p class="error_mensaje">:message</p>') !!}
		</section>
		<input type="hidden" name="hidden_id"  value=<?php echo "{$datos->id}"; ?>>
		<section >
		<label >Equipo:</label>
		{!! Form::select('UsuarioEquipo', App\Usuarioequipo::orderBy('equipo', 'Desc')->lists('equipo', 'id'), $datos->usuario_equ_id) !!} 
		</section>

		<section>
		<label>Tipo Usuario:</label>
		{!! Form::select('UsuarioTipo', App\Usuariotipo::orderBy('tipo_usu', 'Desc')->lists('tipo_usu', 'id'), $datos->usuario_tipo_id) !!} 

		</section>
	</section>
	<input class="btnguardar" type="submit" name="agregar_tipored" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('usuario','Regresar') !!} </p> 

</form>

@stop