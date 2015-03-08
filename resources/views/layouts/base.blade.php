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
    <ul><li><a href="/">Inicio</a><ul><li>
@if (Auth::guest())
    <ul><li><a href="../public/auth/login">Ingresar</a><ul><li>
    <ul><li><a href="../public/usuario/Nuevo">Registrarse</a><ul><li>
@else
    <ul><li><a hef="/pozotapirus/public/parroquia">Parroquias</a><ul><li>
    <ul><li><a hef="/pozotapirus/public/barrio">Barrios</a><ul><li>
    <ul><li><a hef="/pozotapirus/public/ficha">Fichas</a><ul><li>
    <ul><li><a hef="/pozotapirus/public/usuario">Usuarios</a><ul><li>
    <ul><li><a href="/"><span>{{ Auth::user()->name }}</span></a><ul><li>
    <ul><li><a href="pozotapirus/public/auth/logout">Salir</a><ul><li>
    
@endif
</nav>

<section class="contenido">

</section>

 @section('cabecera')
    <!-- This is the master sidebar.  -->
    @show
        

    <!-- Especificamos los tags(secciones el body) de nuestra plantilla-->
    @yield('contenido')

</body>
</html>

