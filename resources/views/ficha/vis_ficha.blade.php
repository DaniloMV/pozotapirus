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
            <td>{{ $ficha->fecha }}</td>
            <td>{{ $ficha->modusuario->name }}</td>
            <td>Equipo</td>
            <td style='display:none'>{{ $ficha->estreg }}</td>
            <td>{{ $ficha->estreg }}</td>
            <td></td>           
        	</tr>
			@endforeach

    	</tbody>
    	</table> 
        
        <p align="center">{!! link_to_route('NuevaFicha', 'Registrar Ficha') !!}</p>


    	</div>
@stop