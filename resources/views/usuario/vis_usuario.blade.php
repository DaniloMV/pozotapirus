<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Lista de Usuarios</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

        
		<div align="center"> 
    	<table>
    	<caption></caption>
    	<col><col><col><col><col><col><col><col><col><col><col>
   		<thead>
    	<tr>
    		<th>Id 
    		<th>Nombre
    		<th>Correo
            <th style="display:none">TipoUsuario 
            <th>TipoUsuario 
            <th style="display:none">Equipo 
            <th>Equipo 
    		<th style="display:none">EstadoUsuario
    		<th>Estado
    		<th>Acción
    	</thead>
    	<tbody>

	    	@foreach ($usuarios as $usuario)	
	    	<tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>    
            <td style='display:none'>{{ $usuario->usuariotipo_id }}</td>
            <td>{{ $usuario->modusuariotipo->tipo_usu }}</td>
            <td style='display:none'>{{ $usuario->usuario_equ_id }}</td>
            <td>{{ $usuario->modusuarioequipo->equipo }}</td>
            <td style='display:none'>{{ $usuario->estreg }}</td>
            <td>{{ $usuario->estreg }}</td>
            <td></td>
            <td></td>           
        	</tr>


			@endforeach

    	</tbody>
    	</table> 
        
		<p align="center"><a href="../public/usuario/Nuevo">Nuevo Usuario</a></p>

    	</div>
@stop