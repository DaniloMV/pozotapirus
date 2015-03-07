<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Lista de Tipos de Red</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

<label>Código:</label>
<input type="text" placeholder="Código" required>
<label>Parroquia</label>
<input type="text" placeholder="Parroquia" required>
<label>Barrio</label>
<input type="text" placeholder="Barrio" required>
<input type="submit" value="ACEPTAR">


@stop