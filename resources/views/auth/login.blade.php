<!-- Especifico la ruta de template -->
@extends('layouts.base')

@section('cabecera')
    @parent

 <h2 class="titulopagina">¡Bienvenido!</h2>

    <!-- <p>This is appended to the master sidebar.</p> -->
@stop

<!-- Lo que debe contener en el body -->
@section('contenido')

<link rel="stylesheet" href="/pozotapirus/public/css/jquery.bxslider.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script src="/pozotapirus/public/js/jquery.bxslider.min.js"></script>

<div id="slider">
<ul class="bxslider">
<figure>
  <li><img src="/pozotapirus/public/images/foto_1.jpg"/></li>
  <figcaption>
  	<small><strong>Quiénes somos?</strong></small>
	<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out.</p>
  </figcaption>
</figure>

<figure>
  <li><img src="/pozotapirus/public/images/foto_2.jpg"/></li>
  <figcaption>
  	<small><strong>Misión</strong></small>
	<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out.</p>
  </figcaption>
</figure>

<figure>
  <li><img src="/pozotapirus/public/images/foto_3.jpg"/></li>
  <figcaption>
  	<small><strong>Visión</strong></small>
	<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out.</p>
  </figcaption>
</figure>

</ul>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
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

					<form class="form-horizontal fuenteingreso" role="form" method="POST" action="../auth/login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recordar 
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btningreso" style="margin-right: 15px;">
									Ingresar
								</button>
							</div>
							<div class="col-md-6 col-md-offset-4 ">
								<a href="../password/email">Haz olvidado tu contraseña?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$('.bxslider').bxSlider({
  auto: true,
  autoControls: true,
  speed:1000
});

</script>
@stop