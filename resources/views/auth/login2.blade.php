<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent



    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

<link rel="stylesheet" href="/pozotapirus/public/css/jquery.bxslider.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/pozotapirus/public/js/jquery.bxslider.min.js"></script>

@if (!Auth::check())
	<h2 class="titulopagina">Ingresar al Sistema</h2>
 	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form role="form" id="formularioingreso" class="formularioingreso" method="POST" action="../auth/login">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		{!! Form::email('email', old('email'), ['id' => 'email', 'placeholder' => 'E-mail del usuario']) !!}
		<input type="password" id="password" name="password" placeholder="Contraseña del usuario" required>
		<input type="checkbox" name="remember">Recordar    </input>
		<input type="submit" value="Ingresar">
		<a href="../password/email">Haz olvidado tu contraseña?</a>
	</form>
@else
	<h2 class="titulopagina">¡Bienvenido!</h2>
@endif
	

<div id="slider">
	<ul class="bxslider">
	<figure>
	  <li><img src="/pozotapirus/public/images/foto_1.jpg" width="90%"/></li>
	  <figcaption>
	  	<small><strong>TAPIRUS</strong></small>
		<p>“Tapirus Cía. Ltda.” Se constituyó en octubre del año 2008. Sus socios fundadores, los hermanos  Vilma Susana y Víctor Hugo Torres López inician esta compañía limitada con el propósito de poner en práctica los conocimientos adquiridos en la universidad: el ambiente y la geografía, dos carreras vinculadas al estudio de las interrelaciones entre el hombre y la naturaleza.</p>
	  </figcaption>
	</figure>

	<figure>
	  <li><img src="/pozotapirus/public/images/foto_3.jpg" width="90%"/></li>
	  <figcaption>
	  	<small><strong>Misión</strong></small>
		<p>“TAPIRUS Cía. Ltda.” es una consultora que cree en el desarrollo local, que por medio de la investigación, construcción y la gestión en temas de geografía y  ambiente aporta al progreso de la región del País cumpliendo de manera profesional con las exigencias de las empresas públicas y privadas.</p>
	  </figcaption>
	</figure>

	<figure>
	  <li><img src="/pozotapirus/public/images/foto_4.jpg" width="90%"/></li>
	  <figcaption>
	  	<small><strong>Visión</strong></small>
		<p> “TAPIRUS Cía. Ltda.” ser la principal consultora y Constructora de la Región  en lo referente a investigación de temas sociales, ambientales y Rehabitación de Bienes Patrimoniales, para la promoción del desarrollo local. Y busca posicionarse a nivel Nacional, para emprender la conquista del Sud América.</p>
	  </figcaption>
	</figure>

	</ul>
</div>

<script type="text/javascript">
$('.bxslider').bxSlider({
  auto: true,
  autoControls: true,
  speed:3000
});

</script>
@stop