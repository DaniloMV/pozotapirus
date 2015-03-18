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
        <section class="listado"> 
    	<table>
    	<caption></caption>
    	<col><col><col><col><col>
   		<thead>
    	<tr>
    		<th>Parroquia 
    		<th>Barrio
            <th>Estado
    		<th>Acción
    	</thead>
    	<tbody>

	    	@foreach ($datos as $barrio)	
	    	<tr>
            <td>{{ $barrio->modparroquia->des_parroquia }}</td>
            <td>{{ $barrio->des_barrio }}</td>
            <td>
                {!! Form::open(array('url'=>'barrio/Eliminar')) !!}
                {!! Form::hidden('id', $barrio->id) !!}
                {!! Form::hidden('id_parroquia', $barrio->parroquia_id) !!}
                {!! Form::hidden('hidden_estado', $barrio->estreg) !!}
                
                <?php                 
                $Estado="Activar"; 
                if( $barrio->estreg == 1)
                {
                    $Estado="Inactivar";  
                }
                
                echo "<input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value=$Estado >";
                ?>

                {!! Form::close() !!}
            <td>

                {!! Form::open(array('url'=>'barrio/Editar')) !!}
                {!! Form::hidden('hidden_id', $barrio->id) !!}
                {!! Form::hidden('hidden_id_parroquia', $barrio->parroquia_id) !!}  
                <input id='Editar' type='submit' name='Editar' class='Botones' value='Editar'>
                {!! Form::close() !!}
            </tr>       
        	</tr>
			@endforeach

    	</tbody>
    	</table> 
        
        <p align="center">{!! link_to_route('NuevoBarrio', 'Registrar barrio') !!}</p>
       
        </section>
    	</div>
        
        <?php echo $datos->render(); ?>

@stop