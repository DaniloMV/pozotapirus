<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Lista de Tipos de Red</h2>

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
    		<th>Id 
    		<th>Nombre
    		<th style="display:none">Estadotipored
    		<th>Estado
    		<th>Acción
    	</thead>
    	<tbody>

	    	@foreach ($datos as $tipored)	
	    	<tr>
            <td>{{ $tipored->id }}</td>
            <td>{{ $tipored->des_tipored }}</td>
            <td style='display:none'>{{ $tipored->estreg }}</td>
            <td>{{ $tipored->estreg }}</td>
            <td></td>           
        	</tr>
			@endforeach

    	</tbody>
    	</table> 
        
		<!-- <p align="center"><a href="../public/tipored/Nuevo">Nuevo tipored</a></p> -->

    	</div>
@stop