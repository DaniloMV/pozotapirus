<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Lista de usuarios</h2>

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

	    	@foreach ($datos as $usuario)	
	    	<tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>    
            <td style='display:none'>{{ $usuario->usuariotipo_id }}</td>
            <td>{{ $usuario->modusuariotipo->tipo_usu }}</td>
            <td style='display:none'>{{ $usuario->usuario_equ_id }}</td>
            <td>{{ $usuario->modusuarioequipo->equipo }}</td>
            <td style='display:none'>{{ $usuario->estreg }}</td>
            <td>{{ $usuario->estreg }}</td>
            <td>
                {!! Form::open(array('url'=>'usuario/Eliminar')) !!}
                {!! Form::hidden('id', $usuario->id) !!}
                {!! Form::hidden('estado', $usuario->estreg) !!}   
                
                <?php                 
                $Estado="Activar"; 
                if( $usuario->estreg == 1)
                {
                    $Estado="Inactivar";  
                }
                
                echo "<input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value=$Estado >";
                ?>
                
                {!! Form::close() !!}
            <td>
                 <button id='Editar' class='Botones'> 
                  {!! link_to_route('EditarUsuario','Editar',array($usuario->id)) !!}
                </button>
            </tr> 


			@endforeach

    	</tbody>
    	</table> 
        
		<p align="center">{!! link_to_route('NuevoUsuario', 'Nuevo Usuario') !!}</p>

    	</div>
@stop