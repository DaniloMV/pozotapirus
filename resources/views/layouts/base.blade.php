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
    <ul> 
@if (Auth::check())

    @if (Auth::user()->usuario_tipo_id==2)
        <li><a href="/pozotapirus/public/parroquia">Parroquias</a></li>
        <li><a href="/pozotapirus/public/barrio">Barrios</a></li>
        <li><a href="/pozotapirus/public/ficha">Fichas</a></li>
        <li><a href="/pozotapirus/public/usuario">Usuarios</a></li>
        
    @else
        <a href="/pozotapirus/public/ficha">Fichas</a>
    @endif 
@else
    <li><a href="../public/auth/login">Ingresar</a></li>
    <li><a href="../public/usuario/Nuevo">Registrarse</a></li>
@endif
    </ul>
</nav>


</header>
@if (Auth::check())
<label class="login"><strong>Bienvenido:</strong> {{ Auth::user()->name }}</label>
<a class="logout" href="/pozotapirus/public/Salir">Cerrar Sesión</a>
@endif

</header>

 @section('cabecera')
    <!-- This is the master sidebar.  -->
    @show
        

    <!-- Especificamos los tags(secciones el body) de nuestra plantilla-->
    @yield('contenido')

</body>
</html>

