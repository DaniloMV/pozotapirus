<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Registro de Fichas</h2>
 
    <!-- <p>This is appended to the master sidebar.</p> -->
@stop


@section('contenido')
    <!-- <p>This is my body content.</p> -->

<label>Código:</label>
<input type="text" placeholder="Código" required>
<label>Parroquia</label>
<input type="text" placeholder="Parroquia" required>
<label>Barrio</label>
<input type="text" placeholder="Barrio" required>
<label>Tipo Red:</label>
<!-- {{ Form::select('TipoRed', Red::orderBy('descripcion', 'Asc')->lists('descripcion', 'id')) }}  -->
<label>Calzada:</label>
<!-- {{ Form::select('TipoRed', Red::orderBy('descripcion', 'Asc')->lists('descripcion', 'id')) }}  -->
<label>Material Colector:</label>
<!-- {{ Form::select('TipoRed', Red::orderBy('descripcion', 'Asc')->lists('descripcion', 'id')) }}  -->
<input type="submit" value="ACEPTAR">


@stop