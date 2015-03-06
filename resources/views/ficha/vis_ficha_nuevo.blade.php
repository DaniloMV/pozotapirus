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

<section class="campoform">
<label class="etiquetaform">Parroquia:</label>
<select id="cmbparroquia" name="cmbparroquia" required class="valorcampo">
	<option>Parroquia 1</option>
	<option>Parroquia 2</option>
</select>
</section>

<section class="campoform">
<label class="etiquetaform">Barrio:</label>
<select id="cmbbarrio" name="cmbbarrio" required class="valorcampo">
	<option>Barrio 1</option>
	<option>Barrio 2</option>
</select>
</section>

<section class="campoform">
<label class="etiquetaform">Calle:</label>
<input id="txtcalle" name="txtcalle" class="valorcampo" type="text" required placeholder="nombre de la calle"
></input>
</section>

<section class="campoform">
<label class="etiquetaform">Código:</label>
<input id="txtpozo" name="txtpozo" class="valorcampo" type="text" required placeholder="codigo pozo"
></input>
</section>

<section class="campoform">
<label class="etiquetaform">Tipo Red:</label>
<select id="cmbtipored" name="cmbtipored" required class="valorcampo">
	<option>Tipo Red 1</option>
	<option>Tipo Red 2</option>
</select>
</section>

<section class="campoform">
<label class="etiquetaform">Calzada:</label>
<select id="cmbtipocalzada" name="cmbtipocalzada" required class="valorcampo">
	<option>Calzada 1</option>
	<option>Calzada 2</option>
</select>
</section>

<section class="campoform">
<label class="etiquetaform">Material colector:</label>
<select id="cmbmaterialcolector" name="cmbmaterialcolector" required class="valorcampo">
	<option>Colector 1</option>
	<option>Colector 2</option>
</select>
</section>
<section name="checked">
<input id="chklimpio" name="chklimpio" type="checkbox" value="true">Limpio</input>
<input id="chkescalera" name="chkescalera" type="checkbox" value="true">Escalera</input>
<input id="chkhormigon" name="chkhormigon" type="checkbox" value="true">Hormigon</input>
<input id="chkladrillo" name="chkladrillo" type="checkbox" value="true">Ladrillo</input>
</section>



@stop