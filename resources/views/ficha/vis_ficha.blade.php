<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Fichas Registradas</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

        
		<div align="center"> 
    	<table>
    	<caption></caption>
    	<col><col><col><col><col><col><col><col><col><col>
   		<thead>
    	<tr>
    		<th>Parroquia 
    		<th>Barrio
            <th>Código Ficha
            <th style='display:none'>sec
            <th>Fecha
            <th>Usuario
            <th>Equipo
    		<th style="display:none">Estado
    		<th>Estado
    		<th>Acción
    	</thead>
    	<tbody>

	    	@foreach ($datos as $ficha)	
	    	<tr>
            <td>{{ $ficha->modparroquia->des_parroquia }}</td>
            <td>{{ $ficha->modbarrio->des_barrio }}</td>
            <td>{{ $ficha->id }}</td>
            <td style='display:none'>{{ $ficha->sec_ficha }}</td>
            <td>{{ $ficha->fecha }}</td>
            <td>{{ $ficha->modusuario->name }}</td>
            <td>Equipo</td>
            <td>{{ $ficha->estreg }}</td>
            <td>
                {!! Form::open(array('url'=>'ficha/Eliminar')) !!}
                {!! Form::hidden('sec', $ficha->sec_ficha) !!}  
                <input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value='Anular'>
                
                {!! Form::close() !!}
            <td>
                 <button id='Editar' class='Botones'> 
                  {!! link_to_route('EditarFicha','Editar',array($ficha->sec_ficha)) !!}
                </button>
            </tr>       
        	</tr>
			@endforeach

    	</tbody>
    	</table> 
        
        <p align="center">{!! link_to_route('NuevaFicha', 'Registrar Ficha') !!}</p>


    	</div>
@stop