<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent
 <h2>INGRESO AL SISTEMA</h2>
    <!-- <p>This is appended to the master sidebar.</p> -->
@stop


@section('contenido')
    <!-- <p>This is my body content.</p> -->

<!-- Lo que debe contener en el body -->
@section('content')
    <!-- ponemos el contenido de la vista estamos dentro del body -->


<input type="text" required placeholder="usuario">
<input type="password" required placeholder="clave">
<input type="submit" value="ACEPTAR">


@stop