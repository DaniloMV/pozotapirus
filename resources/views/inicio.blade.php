<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent
 <h2>INGRESO AL SISTEMA</h2>
    <!-- <p>This is appended to the master sidebar.</p> -->
@stop


<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

<p>
<label>Usuario: </label>
<input id="txtusuario" name="txtusuario" type="email" required placeholder="usuario">
</p>
<p>
<label>Clave: </label>
<input id="txtclave" name="txtclave" type="password" required placeholder="clave">
</p>
<input id="btnaceptar" name="btnaceptar" type="submit" value="ACEPTAR">

@stop