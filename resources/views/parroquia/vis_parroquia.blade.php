<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">Listado de Parroquias</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

    <div align="center"> 
    <section class="listado"> 
    <table>
    <caption></caption>
    <col><col><col>
    <thead>
    <tr>
        <th>Codigo
        <th>Parroquia
        <th>Estado
        <th>Acción
    </thead>
    <tbody>

        @foreach ($datos as $parroquia) 
        <tr>
        <td>{{ $parroquia->id }}</td>
        <td>{{ $parroquia->des_parroquia }}</td>
        
        <td>
            {!! Form::open(array('url'=>'parroquia/Eliminar')) !!}
            {!! Form::hidden('id', $parroquia->id) !!}  
            <input id='Estado' type='submit' name='deleteActivarInactivar' class='Botones' value='Anular'>
            
            {!! Form::close() !!}
        <td>
             <button id='Editar' class='Botones'> 
              {!! link_to_route('EditarParroquia','Editar',array($parroquia->id)) !!}
            </button>
        </tr>       
   
        @endforeach

    </tbody>
    </table> 
    
    <p align="center">{!! link_to_route('NuevaParroquia', 'Registrar parroquia') !!}</p>
    </section>
    </div>

    <?php echo $datos->render(); ?>
        
@stop