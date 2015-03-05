<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Registro de Pozos" />
    <title>TAPIRUS:  @yield('titulo')  </title>   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <nav>
    	<ul>
            <li><a href="#">Registro de Pozos</a></li>
            <li><a href="#">Salir</a></li>
        </ul>
    </nav>
</head>
<body>
 @section('sidebar')
            <!-- This is the master sidebar.  -->
        @show


        <!-- Especificamos los tags(secciones el body) de nuestra plantilla-->
            @yield('content')


</body>
</html>