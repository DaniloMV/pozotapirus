<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Registro de Pozos" />
    <title>TAPIRUS:  @yield('titulo')  </title>   
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD

    <link rel="stylesheet" type="text/css" href="/css/base.min.css">

=======
    <link rel="stylesheet" type="text/css" href="/css/base.min.css">
>>>>>>> origin/master
    <link rel="stylesheet" type="text/css" href="/pozotapirus/public/css/base.min.css">
</head>
<body>
<header class="cabecera">
<figure>
<img id="imglogotapirus" src="/pozotapirus/public/images/tapirus.jpg">
<figcaption id="textocab">
<h1>"TAPIRUS"</h1>
<small>INVESTIGACIÓN Y GESTIÓN DE PROYECTOS</small>
</figcaption>
<img id="imglogokunhwa" src="/pozotapirus/public/images/kunhwa.jpg">
</figure>
<nav class="menuprincipal">
    <ul> 
@if (Auth::check())

    @if (Auth::user()->usuario_tipo_id==2)
        <li><a href="/parroquia">Parroquias</a></li>
        <li><a href="/barrio">Barrios</a></li>
        <li><a href="/pozotapirus/public/ficha">Fichas</a></li>
        <li><a href="/usuario">Usuarios</a></li>
        
    @else
        <a href="/ficha">Fichas</a>
    @endif 

@endif
    </ul>
</nav>


</header>
@if (Auth::check())
<label class="login"><strong>Hola: </strong> {{ Auth::user()->name }}</label>
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

