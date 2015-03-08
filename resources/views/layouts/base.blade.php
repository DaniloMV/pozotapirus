<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Registro de Pozos" />
    <title>TAPIRUS:  @yield('titulo')  </title>   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/pozotapirus/public/css/base.css">
</head>
<body>
<header class="cabecera">
<figure>
<img id="imglogo" src="/pozotapirus/public/images/logo.jpg">
<figcaption id="textocab">
<h1>"TAPIRUS S.A"</h1>
<small>AQUI EL SLOGAN DE LA EMPRESA</small>
</figcaption>
</figure>
<nav class="menuprincipal">
    <a href="/">Inicio</a>
@if (Auth::guest())
    <a href="../public/auth/login">Ingresar</a>
    <a href="../public/usuario/Nuevo">Registrarse</a>
@endif 
@if (Auth::check())
@if (Auth::user()->usuario_tipo_id==2)
    <a hef="/pozotapirus/public/parroquia">Parroquias</a>
    <a hef="/pozotapirus/public/barrio">Barrios</a>
    <a hef="/pozotapirus/public/ficha">Fichas</a>
    <a hef="/pozotapirus/public/usuario">Usuarios</a>
    <a href="/"><span>{{ Auth::user()->name }}</span></a>
@elseif (Auth::user()->usuario_tipo_id==1)
    <a hef="/pozotapirus/public/ficha">Fichas</a>
    <a href="/"><span>{{ Auth::user()->name }}</span></a>
@endif 
@endif
    <a href="/pozotapirus/public/auth/logout">Salir</a>
</nav>


</header>
<label class="usuario"><strong>Usuario:</strong> Nombre de usuario</label>


</header>

 @section('cabecera')
    <!-- This is the master sidebar.  -->
    @show
        

    <!-- Especificamos los tags(secciones el body) de nuestra plantilla-->
    @yield('contenido')

</body>
</html>

