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

        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>

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
            @if (Auth::user()->usuario_tipo_id==2) 
    		<th>Estado 
            @endif  
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
            <td> 
            {!! Form::select('cmbusuarioequipo', App\Usuarioequipo::where('id', '=', $ficha->modusuario->usuario_equ_id)->lists('equipo', 'id'), $ficha->modusuario->usuario_equ_id) !!} 
            </td>
            @if (Auth::user()->usuario_tipo_id==2) 
            <td> 
                {!! Form::open(array('url'=>'ficha/Eliminar')) !!}
                {!! Form::hidden('sec', $ficha->sec_ficha) !!}  
                {!! Form::hidden('estado', $ficha->estreg) !!}   
                
                <?php                 
                $Estado="Activar"; 
                if( $ficha->estreg == 1)
                {
                    $Estado="Inactivar";  
                }
                
                echo "<input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value=$Estado >";
                ?>
                
                {!! Form::close() !!}
            </td> 
            @endif 
            <td>
                {!! Form::open(array('url'=>'ficha/Editar')) !!}
                {!! Form::hidden('sec', $ficha->sec_ficha) !!}  
                <input id='Editar' type='submit' name='Editar' class='Botones' value='Editar'>
                
                {!! Form::close() !!}
            </td>
            </tr>
			@endforeach

    	</tbody>
    	</table> 
        </section>

        <p align="center" class="iniciaficha">{!! link_to_route('NuevaFicha', 'Iniciar Ficha') !!}</p>
        
    	</div>
        <?php echo $datos->render(); ?>
@stop