<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Fichas Registradas</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

        
		<div align="center"> 

<<<<<<< HEAD
        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>
<<<<<<< HEAD
=======

        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>

>>>>>>> origin/master
=======

>>>>>>> origin/master
=======
        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>

>>>>>>> origin/master
        <section class="listado"> 
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
            <td>{{ date('d/M/Y H:i:s', $ficha->fecha) }}</td>
            <td>{{ $ficha->modusuario->name }}</td>
            <td>Equipo</td>
            <td>
                {!! Form::open(array('url'=>'ficha/Eliminar')) !!}
                {!! Form::hidden('sec', $ficha->sec_ficha) !!}  
                <input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value='Anular'>
                {!! Form::close() !!}
                
            <td>
                {!! Form::open(array('url'=>'ficha/Editar')) !!}
                {!! Form::hidden('sec', $ficha->sec_ficha) !!}  
                <input id='Editar' type='submit' name='Editar' class='Botones' value='Editar'>
                
                {!! Form::close() !!}
            </tr>       
        	</tr>
			@endforeach

    	</tbody>
    	</table> 
        </section>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> origin/master
=======

>>>>>>> origin/master
        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>

<<<<<<< HEAD
=======

=======

        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>
        

>>>>>>> origin/master

    	</div>
        <?php echo $datos->render(); ?>
@stop