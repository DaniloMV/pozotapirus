<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2>Nuevo Usuario</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop



<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

<section class="campoform">
<label class="etiquetaform">Nombres:</label>
<input id="txtusuario" name="txtusuario" class="valorcampo" type="text" required placeholder="nombre usuario"
></input>
</section>

<section class="campoform">
<label class="etiquetaform">Email:</label>
<input id="txtemail" name="txtemail" class="valorcampo" type="email" required placeholder="usuario@tapirus.com"></input>
</section>

<section class="campoform">
<label class="etiquetaform">Password:</label>
<input id="txtpassword" name="txtpassword" class="valorcampo" type="pasword" required placeholder="password"></input>
</section>

<section class="campoform">
<label class="etiquetaform">Equipo:</label>
<select id="cmbequipo" name="cmbequipo" class="valorcampo"></select>
</section>

<section class="campoform">
<label class="etiquetaform">Tipo Usuario:</label>
<select id="cmbtipousuario" name="cmbtipousuario" class="valorcampo"></select>
</section>


@stop