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
<form role="form" method="POST" action="../Actualizar">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section class="campoform">
	<label class="etiquetaform">Nombre:</label>
	<input id="txtusuario" name="txtusuario" class="valorcampo" type="text" value=<?php echo "{$datos->name}"; ?> required placeholder="Nombre Usuario"
	></input>
	</section>

	<section class="campoform">
	<label class="etiquetaform">Email:</label>
	<input id="txtemail" name="txtemail" class="valorcampo" type="email" value=<?php echo "{$datos->email}"; ?> disabled required placeholder="usuario@tapirus.com"></input>
	</section>
	<input type="hidden" name="hidden_id"  value=<?php echo "{$datos->id}"; ?>>
	<section class="campoform">
	<label class="etiquetaform">Equipo:</label>
	{!! Form::select('UsuarioEquipo', App\Usuarioequipo::orderBy('equipo', 'Desc')->lists('equipo', 'id'), $datos->usuario_equ_id) !!} 
	</section>

	<section class="campoform">
	<label class="etiquetaform">Tipo Usuario:</label>
	{!! Form::select('UsuarioTipo', App\Usuariotipo::orderBy('tipo_usu', 'Desc')->lists('tipo_usu', 'id'), $datos->usuario_tipo_id) !!} 

	</section>

	<input type="submit" name="agregar_tipored" value="Guardar"/>
	<p> {!! link_to_route('usuario','Regresar') !!} </p> 

</form>

@stop