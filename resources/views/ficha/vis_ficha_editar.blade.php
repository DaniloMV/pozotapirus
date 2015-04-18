<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<<<<<<< HEAD
<script src="/js/funcionesedit.min.js"></script>
<script src="/js/funciones.min.js"></script>
<script src="/pozotapirus/public/js/validacion.js"></script>
=======
>>>>>>> origin/master
<script src="/pozotapirus/public/js/funcionesedit.min.js"></script>
<script src="/pozotapirus/public/js/funciones.min.js"></script>
<script src="/pozotapirus/public/js/validacion.min.js"></script>
<h2 class="titulopagina">MODIFICAR FICHAS</h2>
<small class="tituloobligatorio">(*) CAMPOS OBLIGATORIOS</small>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')
    <!-- ponemos el contenido de la vista estamos dentro del body -->

	@if($errors->has())

		<ul id="VisualizarMensaje">
			{{ implode('', $errors->all('<li>:message</li>')) }}
		</ul>
	@endif


<form role="form" method="POST" action="../ficha/Actualizar">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

	
<section id="fichacabecera" class="campoform">
	
	<section>
	<label>Parroquia:</label>
	{!! Form::select('cmbparroquia', App\Parroquia::orderBy('des_parroquia', 'Asc')->lists('des_parroquia', 'id'),$datos->parroquia_id) !!} 
	</section>

	<section >
	<label>Barrio:</label>
	{!! Form::select('cmbbarrio', App\Barrio::where('parroquia_id','=',$datos->parroquia_id)->orderBy('des_barrio', 'Asc')->lists('des_barrio', 'id'),$datos->barrio_id) !!} 
	</section>

	<section>
	<label>Calle:<spam class="obligatorio"> (*)</spam></label>
	<input id="txtcalle" name="txtcalle" type="text" required value="<?php echo "{$datos->calle}"; ?>"  placeholder="nombre de la calle"></input>
	{!! $errors->first('txtcalle', '<p class="error_mensaje">:message</p>') !!}
	</section>
	<input type="hidden" name="hidden_sec"  value="<?php echo "{$datos->sec_ficha}"; ?>">
	<section>
	<label class="etiquetaform">Código:<spam class="obligatorio"> (*)</spam></label>
	<input id="txtpozocodigo" name="txtpozocodigo" type="text" required value="<?php echo "{$datos->id}"; ?>" pattern="\S{1,10}" placeholder="único (10 caracteres)"></input>
	{!! $errors->first('txtpozocodigo', '<p class="error_mensaje">:message</p>') !!}
	</section>

</section>


<div id="accordion">
  
<h3 id="tabgeneral">GENERAL</h3>

<div>
	<section id="fichacombos" class="campoform">

		<section>
		<label>Tipo Red:</label>
		{!! Form::select('cmbtipored', App\Tipored::orderBy('des_tipored', 'Asc')->lists('des_tipored', 'id'), $datos->cmb_tipo_red_id) !!} 
		</section>

		<section>
		<label>Calzada:</label>
		{!! Form::select('cmbtipocalzada', App\Tipocalzada::orderBy('des_calzada', 'Asc')->lists('des_calzada', 'id'), $datos->cmb_tipo_calzada_id) !!} 
		</section>

		<section>
		<label>Material colector:</label>
		{!! Form::select('cmbmaterialcolector', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmb_material_colector_id) !!} 
		</section>
		
		<section>
		<label>Tipo pozo:</label>
		{!! Form::select('cmbtipopozo', App\Tipopozo::orderBy('des_tipo_pozo', 'Asc')->lists('des_tipo_pozo', 'id'), $datos->cmb_tipo_pozo_id) !!} 
		</section>

		<section>
		<label>Tipo tapa:</label>
		{!! Form::select('cmbtipotapa', App\Tipotapa::orderBy('des_tipo_tapa', 'Asc')->lists('des_tipo_tapa', 'id'), $datos->cmb_tipo_tapa_id) !!} 
		</section>

		<section>
		<label>Estado pozo:</label>
		{!! Form::select('cmbestadopozo', App\Estadopozo::orderBy('des_estadopozo', 'Asc')->lists('des_estadopozo', 'id'), $datos->cmb_estado_pozo_id) !!} 
		</section>
	</section>
</div>
  
<h3 id="tabdetalle">DETALLES</h3>
<div>
	<section id="checkedlist" name="checkedlist" class="chkficha">
		
		<p>
		<label>Limpio</label>
		<input id="chklimpio" name="chklimpio" type="checkbox" value="1" <?php if($datos->es_limpio==1){echo "checked";} ?>></input>
		</p>
		
		<p>
		<label>Escalera</label>
		<input id="chkescalera" name="chkescalera" type="checkbox" value="1" <?php if($datos->es_escalera==1){echo "checked";} ?>></input>
		</p>
		
		<p>
		<label>Hormigón</label>
		<input id="chkhormigon" name="chkhormigon" type="checkbox" value="1" <?php if($datos->es_hormigon==1){echo "checked";} ?>></input>
		</p>

		<p>
		<label>Ladrillo</label>
		<input id="chkladrillo" name="chkladrillo" type="checkbox" value="1" <?php if($datos->es_ladrillo==1){echo "checked";} ?>></input>
		</p>

		<p>
		<label>Bloque</label>
		<input id="chkbloque" name="chkbloque" type="checkbox" value="1" <?php if($datos->es_bloque==1){echo "checked";} ?>></input>
		</p>	

		<p>	
		<label>Mixto</label>
		<input id="chkmixto" name="chkmixto" type="checkbox" value="1" <?php if($datos->es_mixto==1){echo "checked";} ?>></input>
		</p>

		<p>	
		<label>Tapa</label>
		<input id="chktapa" name="chktapa" type="checkbox" value="1" <?php if($datos->es_tapa==1){echo "checked";} ?>></input>
		</p>

		<p>	
		<label>Cadena</label>
		<input id="chkcadena" name="chkcadena" type="checkbox" value="1" <?php if($datos->es_cadena==1){echo "checked";} ?>></input>
		</p>

		<p>
		<label>Bisagra</label>
		<input id="chkbisagra" name="chkbisagra" type="checkbox" value="1" <?php if($datos->es_bisagra==1){echo "checked";} ?>></input>
		</p>

	</section>
 </div>
  
<h3 id="tabcoordenada">COORDENADAS</h3>

<div>
	
	<section id="coordenadas" name="coordenadas" class="campoform">

		<section>
			<label>X:<spam class="obligatorio"> (*)</spam></label>
			<input id="txtcoordenadax" name="txtcoordenadax" type="text" required value="<?php echo "{$datos->x}"; ?>"></input>
			{!! $errors->first('txtcoordenadax', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
			<label>Y:<spam class="obligatorio"> (*)</spam></label>
			<input id="txtcoordenaday" name="txtcoordenaday" type="text" required value="<?php echo "{$datos->y}"; ?>"></input>
			{!! $errors->first('txtcoordenaday', '<p class="error_mensaje">:message</p>') !!}
		</section>
		
		<section>
			<label>Z:<spam class="obligatorio"> (*)</spam></label>
			<input id="txtcoordenadaz" name="txtcoordenadaz" type="text" required value="<?php echo "{$datos->z}"; ?>"></input>
			{!! $errors->first('txtcoordenadaz', '<p class="error_mensaje">:message</p>') !!}
		</section>
	</section>

</div>

<h3 id="tabmedida">MEDIDAS</h3>
<div>
	<section id="medidas" name="medidas" class="campoform">

		<section>
		<label>Diámetro Tapa:</label>
		<input id="txtdiametrotapa" name="txtdiametrotapa" type="text" required value="<?php echo "{$datos->diametro_tapa}"; ?>" placeholder="diametro tapa"/>m
		{!! $errors->first('txtdiametrotapa', '<p class="error_mensaje">:message</p>') !!}
		</section>

		<section>
		<label>Salida:<spam class="obligatorio"> (*)</spam></label>
		<input id="txtdiametrosalida" name="txtdiametrosalida" type="text" required value="<?php echo "{$datos->salida}"; ?>" placeholder="metros"/>m
		{!! $errors->first('txtdiametrosalida', '<p class="error_mensaje">:message</p>') !!}
		</section>
		
		<section>
		<label>Altura:<spam class="obligatorio"> (*)</spam></label>
		<input id="txtaltura" name="txtaltura" type="text" required value="<?php echo "{$datos->altura}"; ?>" placeholder="metros"/>m
		{!! $errors->first('txtaltura', '<p class="error_mensaje">:message</p>') !!}
		</section>
	</section>
</div>

<h3 id="tabentradas">ENTRADAS</h3>
<div>
<<<<<<< HEAD
	<section id="entradas" name="entradas" >

	<section id="entradas" name="entradas">

=======
	<section id="entradas" name="entradas">
>>>>>>> origin/master

		<label class="columna">Diámetro (m)</label>
		<label class="columna">Altura (m)</label>
		<label class="columna">Mat. Colector</label>
		<label class="columna">Cámara (m)</label>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe1" name="txtdiametroe1" class='columna' type="text" required value="<?php echo "{$datos->entrada_1}"; ?>" placeholder="diametro 1"/>
		{!! $errors->first('txtdiametroe1', '<p class="error_mensaje">:message</p>') !!}
		<input id="txtalturae1" name="txtalturae1" class='columna' type="text" required value="<?php echo "{$datos->altura_e1}"; ?>" placeholder="altura 1"/>
=======
		<input id="txtdiametroe1" name="txtdiametroe1" type="text" required value="<?php echo "{$datos->entrada_1}"; ?>" placeholder="diametro 1"/>
		{!! $errors->first('txtdiametroe1', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae1" name="txtalturae1" type="text" required value="<?php echo "{$datos->altura_e1}"; ?>" placeholder="altura 1"/>
>>>>>>> origin/master
		{!! $errors->first('txtalturae1', '<p class="error_mensaje">:message</p>') !!}
		{!! Form::select('cmbmaterialcolectore1', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e1, array('class' => 'columna')) !!} 
<<<<<<< HEAD
		<input id="txtcamarae1" name="txtcamarae1" class='columna' type="text" required value="<?php echo "{$datos->camara_e1}"; ?>" placeholder="camara 1"/>
=======

		<input id="txtcamarae1" name="txtcamarae1" type="text" required value="<?php echo "{$datos->camara_e1}"; ?>" placeholder="camara 1"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae1', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe2" name="txtdiametroe2" class='columna' type="text" required value="<?php echo "{$datos->entrada_2}"; ?>" placeholder="diametro 2"/>
		{!! $errors->first('txtdiametroe2', '<p class="error_mensaje">:message</p>') !!}
		<input id="txtalturae2" name="txtalturae2" class='columna' type="text" required value="<?php echo "{$datos->altura_e2}"; ?>" placeholder="altura 2"/>
=======
		<input id="txtdiametroe2" name="txtdiametroe2" type="text" required value="<?php echo "{$datos->entrada_2}"; ?>" placeholder="diametro 2"/>
		{!! $errors->first('txtdiametroe2', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae2" name="txtalturae2" type="text" required value="<?php echo "{$datos->altura_e2}"; ?>" placeholder="altura 2"/>
>>>>>>> origin/master
		{!! $errors->first('txtalturae2', '<p class="error_mensaje">:message</p>') !!}
		{!! Form::select('cmbmaterialcolectore2', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e2, array('class' => 'columna')) !!} 
<<<<<<< HEAD
		<input id="txtcamarae2" name="txtcamarae2" class='columna' type="text" required value="<?php echo "{$datos->camara_e2}"; ?>" placeholder="camara 2"/>
=======

		<input id="txtcamarae2" name="txtcamarae2" type="text" required value="<?php echo "{$datos->camara_e2}"; ?>" placeholder="camara 2"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae2', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe3" name="txtdiametroe3" class='columna' type="text" required value="<?php echo "{$datos->entrada_3}"; ?>" placeholder="diametro 3"/>
		{!! $errors->first('txtdiametroe3', '<p class="error_mensaje">:message</p>') !!}
		<input id="txtalturae3" name="txtalturae3" class='columna' type="text" required value="<?php echo "{$datos->altura_e3}"; ?>" placeholder="altura 3"/>
=======
		<input id="txtdiametroe3" name="txtdiametroe3" type="text" required value="<?php echo "{$datos->entrada_3}"; ?>" placeholder="diametro 3"/>
		{!! $errors->first('txtdiametroe3', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae3" name="txtalturae3" type="text" required value="<?php echo "{$datos->altura_e3}"; ?>" placeholder="altura 3"/>
>>>>>>> origin/master
		{!! $errors->first('txtalturae3', '<p class="error_mensaje">:message</p>') !!}
		{!! Form::select('cmbmaterialcolectore3', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e3, array('class' => 'columna')) !!} 
<<<<<<< HEAD
		<input id="txtcamarae3" name="txtcamarae3" class='columna' type="text" required value="<?php echo "{$datos->camara_e3}"; ?>" placeholder="camara 3"/>
=======

		<input id="txtcamarae3" name="txtcamarae3" type="text" required value="<?php echo "{$datos->camara_e3}"; ?>" placeholder="camara 3"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae3', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">
<<<<<<< HEAD
		
		<input id="txtdiametroe4" name="txtdiametroe4" class='columna' type="text" required value="<?php echo "{$datos->entrada_4}"; ?>" placeholder="diametro 4"/>
		{!! $errors->first('txtdiametroe4', '<p class="error_mensaje">:message</p>') !!}
		<input id="txtalturae4" name="txtalturae4" class='columna' type="text" required value="<?php echo "{$datos->altura_e4}"; ?>" placeholder="altura 4"/>
		{!! $errors->first('txtalturae4', '<p class="error_mensaje">:message</p>') !!}		
		{!! Form::select('cmbmaterialcolectore4', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e4, array('class' => 'columna')) !!} 
		<input id="txtcamarae4" name="txtcamarae4" class='columna' type="text" required value="<?php echo "{$datos->camara_e4}"; ?>" placeholder="camara 4"/>
=======


		<input id="txtdiametroe4" name="txtdiametroe4" type="text" required value="<?php echo "{$datos->entrada_4}"; ?>" placeholder="diametro 4"/>
		{!! $errors->first('txtdiametroe4', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae4" name="txtalturae4" type="text" required value="<?php echo "{$datos->altura_e4}"; ?>" placeholder="altura 4"/>
		{!! $errors->first('txtalturae4', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore4', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e4, array('class' => 'columna')) !!} 

		<input id="txtcamarae4" name="txtcamarae4" type="text" required value="<?php echo "{$datos->camara_e4}"; ?>" placeholder="camara 4"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae4', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe5" name="txtdiametroe5" class='columna' type="text" required value="<?php echo "{$datos->entrada_5}"; ?>" placeholder="diametro 5"/>
		{!! $errors->first('txtdiametroe5', '<p class="error_mensaje">:message</p>') !!}
		<input id="txtalturae5" name="txtalturae5" class='columna' type="text" required value="<?php echo "{$datos->altura_e5}"; ?>" placeholder="altura 5"/>
		{!! $errors->first('txtalturae5', '<p class="error_mensaje">:message</p>') !!}		
		{!! Form::select('cmbmaterialcolectore5', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e5, array('class' => 'columna')) !!} 
		<input id="txtcamarae5" name="txtcamarae5" class='columna' type="text" required value="<?php echo "{$datos->camara_e5}"; ?>" placeholder="camara 5"/>
=======
		<input id="txtdiametroe5" name="txtdiametroe5" type="text" required value="<?php echo "{$datos->entrada_5}"; ?>" placeholder="diametro 5"/>
		{!! $errors->first('txtdiametroe5', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae5" name="txtalturae5" type="text" required value="<?php echo "{$datos->altura_e5}"; ?>" placeholder="altura 5"/>
		{!! $errors->first('txtalturae5', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore5', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e5, array('class' => 'columna')) !!} 

		<input id="txtcamarae5" name="txtcamarae5" type="text" required value="<?php echo "{$datos->camara_e5}"; ?>" placeholder="camara 5"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae5', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe6" name="txtdiametroe6" class='columna' type="text" required value="<?php echo "{$datos->entrada_6}"; ?>" placeholder="diametro 6"/>
		{!! $errors->first('txtdiametroe6', '<p class="error_mensaje">:message</p>') !!}		
		<input id="txtalturae6" name="txtalturae6" class='columna' type="text" required value="<?php echo "{$datos->altura_e6}"; ?>" placeholder="altura 6"/>
=======
		<input id="txtdiametroe6" name="txtdiametroe6" type="text" required value="<?php echo "{$datos->entrada_6}"; ?>" placeholder="diametro 6"/>
		{!! $errors->first('txtdiametroe6', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae6" name="txtalturae6" type="text" required value="<?php echo "{$datos->altura_e6}"; ?>" placeholder="altura 6"/>
>>>>>>> origin/master
		{!! $errors->first('txtalturae6', '<p class="error_mensaje">:message</p>') !!}
		{!! Form::select('cmbmaterialcolectore6', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e6, array('class' => 'columna')) !!} 
<<<<<<< HEAD
		<input id="txtcamarae6" name="txtcamarae6" class='columna' type="text" required value="<?php echo "{$datos->camara_e6}"; ?>" placeholder="camara 6"/>
=======

		<input id="txtcamarae6" name="txtcamarae6" type="text" required value="<?php echo "{$datos->camara_e6}"; ?>" placeholder="camara 6"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae6', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe7" name="txtdiametroe7" class='columna' type="text" required value="<?php echo "{$datos->entrada_7}"; ?>" placeholder="diametro 7"/>
		{!! $errors->first('txtdiametroe7', '<p class="error_mensaje">:message</p>') !!}
		<input id="txtalturae7" name="txtalturae7" class='columna' type="text" required value="<?php echo "{$datos->altura_e7}"; ?>" placeholder="altura 7"/>
=======
		<input id="txtdiametroe7" name="txtdiametroe7" type="text" required value="<?php echo "{$datos->entrada_7}"; ?>" placeholder="diametro 7"/>
		{!! $errors->first('txtdiametroe7', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae7" name="txtalturae7" type="text" required value="<?php echo "{$datos->altura_e7}"; ?>" placeholder="altura 7"/>
>>>>>>> origin/master
		{!! $errors->first('txtalturae7', '<p class="error_mensaje">:message</p>') !!}
		{!! Form::select('cmbmaterialcolectore7', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e7, array('class' => 'columna')) !!} 
<<<<<<< HEAD
		<input id="txtcamarae7" name="txtcamarae7" class='columna' type="text" required value="<?php echo "{$datos->camara_e7}"; ?>" placeholder="camara 7"/>
=======

		<input id="txtcamarae7" name="txtcamarae7" type="text" required value="<?php echo "{$datos->camara_e7}"; ?>" placeholder="camara 7"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae7', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe8" name="txtdiametroe8" class='columna' type="text" required value="<?php echo "{$datos->entrada_8}"; ?>" placeholder="diametro 8"/>
		{!! $errors->first('txtdiametroe8', '<p class="error_mensaje">:message</p>') !!}		
		<input id="txtalturae8" name="txtalturae8" class='columna' type="text" required value="<?php echo "{$datos->altura_e8}"; ?>" placeholder="altura 8"/>
=======
		<input id="txtdiametroe8" name="txtdiametroe8" type="text" required value="<?php echo "{$datos->entrada_8}"; ?>" placeholder="diametro 8"/>
		{!! $errors->first('txtdiametroe8', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae8" name="txtalturae8" type="text" required value="<?php echo "{$datos->altura_e8}"; ?>" placeholder="altura 8"/>
>>>>>>> origin/master
		{!! $errors->first('txtalturae8', '<p class="error_mensaje">:message</p>') !!}
		{!! Form::select('cmbmaterialcolectore8', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e8, array('class' => 'columna')) !!} 
<<<<<<< HEAD
		<input id="txtcamarae8" name="txtcamarae8" class='columna' type="text" required value="<?php echo "{$datos->camara_e8}"; ?>" placeholder="camara 8"/>
=======

		<input id="txtcamarae8" name="txtcamarae8" type="text" required value="<?php echo "{$datos->camara_e8}"; ?>" placeholder="camara 8"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae8', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe9" name="txtdiametroe9" class='columna' type="text" required value="<?php echo "{$datos->entrada_9}"; ?>" placeholder="diametro 9"/>
		{!! $errors->first('txtdiametroe9', '<p class="error_mensaje">:message</p>') !!}		
		<input id="txtalturae9" name="txtalturae9" class='columna' type="text" required value="<?php echo "{$datos->altura_e9}"; ?>" placeholder="altura 9"/>
		{!! $errors->first('txtalturae9', '<p class="error_mensaje">:message</p>') !!}		
		{!! Form::select('cmbmaterialcolectore9', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e9, array('class' => 'columna')) !!} 
		<input id="txtcamarae9" name="txtcamarae9" class='columna' type="text" required value="<?php echo "{$datos->camara_e9}"; ?>" placeholder="camara 9"/>
=======
		<input id="txtdiametroe9" name="txtdiametroe9" type="text" required value="<?php echo "{$datos->entrada_9}"; ?>" placeholder="diametro 9"/>
		{!! $errors->first('txtdiametroe9', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae9" name="txtalturae9" type="text" required value="<?php echo "{$datos->altura_e9}"; ?>" placeholder="altura 9"/>
		{!! $errors->first('txtalturae9', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore9', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e9, array('class' => 'columna')) !!} 

		<input id="txtcamarae9" name="txtcamarae9" type="text" required value="<?php echo "{$datos->camara_e9}"; ?>" placeholder="camara 9"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae9', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe10" name="txtdiametroe10" class='columna' type="text" required value="<?php echo "{$datos->entrada_10}"; ?>" placeholder="diametro 10"/>
		{!! $errors->first('txtdiametroe10', '<p class="error_mensaje">:message</p>') !!}		
		<input id="txtalturae10" name="txtalturae10" class='columna' type="text" required value="<?php echo "{$datos->altura_e10}"; ?>" placeholder="altura 10"/>
		{!! $errors->first('txtdiametroe10', '<p class="error_mensaje">:message</p>') !!}		
		{!! Form::select('cmbmaterialcolectore10', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e10, array('class' => 'columna')) !!} 
		<input id="txtcamarae10" name="txtcamarae10"  class='columna' type="text" required value="<?php echo "{$datos->camara_e10}"; ?>" placeholder="camara 10"/>
=======
		<input id="txtdiametroe10" name="txtdiametroe10" type="text" required value="<?php echo "{$datos->entrada_10}"; ?>" placeholder="diametro 10"/>
		{!! $errors->first('txtdiametroe10', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae10" name="txtalturae10" type="text" required value="<?php echo "{$datos->altura_e10}"; ?>" placeholder="altura 10"/>
		{!! $errors->first('txtalturae10', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore10', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e10, array('class' => 'columna')) !!} 

		<input id="txtcamarae10" name="txtcamarae10" type="text" required value="<?php echo "{$datos->camara_e10}"; ?>" placeholder="camara 10"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae10', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe11" name="txtdiametroe11" class='columna' type="text" required value="<?php echo "{$datos->entrada_11}"; ?>" placeholder="diametro 11"/>
		{!! $errors->first('txtdiametroe11', '<p class="error_mensaje">:message</p>') !!}		
		<input id="txtalturae11" name="txtalturae11" class='columna' type="text" required value="<?php echo "{$datos->altura_e11}"; ?>" placeholder="altura 11"/>
		{!! $errors->first('txtdiametroe11', '<p class="error_mensaje">:message</p>') !!}		
		{!! Form::select('cmbmaterialcolectore11', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e11, array('class' => 'columna')) !!} 
		<input id="txtcamarae11" name="txtcamarae11"  class='columna' type="text" required value="<?php echo "{$datos->camara_e11}"; ?>" placeholder="camara 11"/>
=======
		<input id="txtdiametroe11" name="txtdiametroe11" type="text" required value="<?php echo "{$datos->entrada_11}"; ?>" placeholder="diametro 11"/>
		{!! $errors->first('txtdiametroe11', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae11" name="txtalturae11" type="text" required value="<?php echo "{$datos->altura_e11}"; ?>" placeholder="altura 11"/>
		{!! $errors->first('txtalturae11', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore11', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e11) !!} 

		<input id="txtcamarae11" name="txtcamarae11" type="text" required value="<?php echo "{$datos->camara_e11}"; ?>" placeholder="camara 11"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae11', '<p class="error_mensaje">:message</p>') !!}

		</section>

		<section class="tabla">

<<<<<<< HEAD
		<input id="txtdiametroe12" name="txtdiametroe12" class='columna' type="text" required value="<?php echo "{$datos->entrada_12}"; ?>" placeholder="diametro 12"/>
		{!! $errors->first('txtdiametroe12', '<p class="error_mensaje">:message</p>') !!}		
		<input id="txtalturae12" name="txtalturae12" class='columna' type="text" required value="<?php echo "{$datos->altura_e12}"; ?>" placeholder="altura 12"/>
		{!! $errors->first('txtdiametroe12', '<p class="error_mensaje">:message</p>') !!}		
		{!! Form::select('cmbmaterialcolectore12', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e12, array('class' => 'columna')) !!} 
		<input id="txtcamarae12" name="txtcamarae12"  class='columna' type="text" required value="<?php echo "{$datos->camara_e12}"; ?>" placeholder="camara 12"/>
=======
		<input id="txtdiametroe12" name="txtdiametroe12" type="text" required value="<?php echo "{$datos->entrada_12}"; ?>" placeholder="diametro 12"/>
		{!! $errors->first('txtdiametroe12', '<p class="error_mensaje">:message</p>') !!}
		
		<input id="txtalturae12" name="txtalturae12" type="text" required value="<?php echo "{$datos->altura_e12}"; ?>" placeholder="altura 12"/>
		{!! $errors->first('txtalturae12', '<p class="error_mensaje">:message</p>') !!}
		
		{!! Form::select('cmbmaterialcolectore12', App\Materialcolector::orderBy('des_matcole', 'Asc')->lists('des_matcole', 'id'), $datos->cmbmaterialcolector_e12) !!} 

		<input id="txtcamarae12" name="txtcamarae12" type="text" required value="<?php echo "{$datos->camara_e12}"; ?>" placeholder="camara 12"/>
>>>>>>> origin/master
		{!! $errors->first('txtcamarae12', '<p class="error_mensaje">:message</p>') !!}

		</section>
		
	</section>
</div>

<h3 id="tabobservacion">OBSERVACIONES</h3>

<div>
	<section class="campoform">
		<textarea id="observaciones" name="observaciones" rows="3" cols="40"><?php echo "{$datos->observaciones}"; ?></textarea>
	</section>
</div>

</div>

	<input type="submit" id="btnguardaficha" name="agregar_ficha" class="btnguardar" value="Guardar"/>
	<p class="iniciaficha"> {!! link_to_route('ficha','Regresar') !!} </p> 

</form>

<script>
	$(function() {
		$( "#accordion" ).accordion({heightStyle: "content"});
		$( "#accordion" ).accordion( "option", "icons", { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" } );
		$( "#accordion" ).accordion({collapsible: true});
		$( "#accordion" ).accordion();
	});
</script>

@stop