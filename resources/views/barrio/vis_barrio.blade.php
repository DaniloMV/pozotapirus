<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Listado de Barrios</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

        
		<div align="center"> 
    	<table>
    	<caption></caption>
    	<col><col><col><col><col>
   		<thead>
    	<tr>
    		<th>Parroquia 
    		<td>Codigo
    		<th>Barrio
    		<th>Acción
    	</thead>
    	<tbody>

	    	@foreach ($datos as $barrio)	
	    	<tr>
            <td>{{ $barrio->parroquia_id }}</td>
            <td>{{ $barrio->id }}</td>
            <td>{{ $barrio->des_barrio }}</td>
            <td>
                {!! Form::open(array('url'=>'barrio/Eliminar')) !!}
                {!! Form::hidden('sec', $barrio->id) !!}  
                <input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value='Anular'>
                
                {!! Form::close() !!}
            <td>
                 <button id='Editar' class='Botones'> 
                  {!! link_to_route('EditarBarrio','Editar',array($barrio->id)) !!}
                </button>
            </tr>       
        	</tr>
			@endforeach

    	</tbody>
    	</table> 
        
        <p align="center">{!! link_to_route('NuevoBarrio', 'Registrar barrio') !!}</p>


    	</div>
@stop