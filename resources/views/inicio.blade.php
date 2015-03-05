<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('sidebar')
    @parent
    <!-- <p>This is appended to the master sidebar.</p> -->
@stop
<!-- Lo que debe contener en el body -->
@section('content')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

    <input>

@stop