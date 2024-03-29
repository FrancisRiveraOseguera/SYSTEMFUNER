<!doctype html>
<html lang="en">
<head>@yield('head')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="../../css/style.css" rel="stylesheet" type="text/css" >
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="../../css/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link rel="icon" type="image/x-icon" href="/assets/page-logo.png"/>
    <script src="/icons.js"></script>

    <!-- jQuery -->
    <script src="../../js/jquery.min.js"></script>

    <!-- select2 css -->
    <link href='../../css/select2.min.css' rel='stylesheet' type='text/css'>

    <!-- select2 script -->
    <script src='../../js/select2.min.js'></script>
    <!-- Libreria español -->
    <script src="../../js/i18n/es.js"></script>

    <!--Titulo de la página-->
    <title>@yield('title')</title>
</head>
<body>

<!--Panel superior-->
<nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
        <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand">
        <img src="/assets/logo.png" class="rounded-circle" style="margin-right:10px; margin-left:10px;" width="50" height="50">
        <h4 style="text-shadow: 4px 4px 8px black;"3 id="logo">Funerales La Bendición</h4>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" style="font-size:14px; font-weight: bold; " id="link"><i class="fas fa-user"></i>{{Auth()->User()->nameUser}}</a>
            </li>
            <li class="nav-item colorbs">
                <form action="{{route('logout')}}" method="post" id="formulario1">
                    @csrf
                    <a class="nav-link" id="link" style="font-size:14px;" href="javascript: document.forms['formulario1'].submit()">
                        <i class="fas fa-sign-out-alt"></i>
                        Cerrar sesión
                        <span class="sr-only">(current)</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</nav>

<!--Panel Lateral-->
<div class="wrapper fixed-left">
    <nav id="sidebar">
        <ul class="list-unstyled components" style="font-size: 14px">
            <li><br>
                <a href="{{url('/inicio')}}"><i class="fas fa-home" style="font-size: 14px;"></i>Inicio</a>
            </li>

            @can('Listado_cargos')
            <li>
                <a href="{{route('listadoCargos.index')}}"><i class="bi bi-person-workspace" style="font-size: 14px"></i>Cargos</a>
            </li>
            @endcan

            @can('Listado_clientes')
            <li>
                <a href="{{route('listado.clientes')}}"><i class="fas fa-user-circle" style="font-size: 14px"></i>Clientes</a>
            </li>
            @endcan

            @can('Listado_Empleados')
            <li>
                <a href="{{route('empleado.index')}}"><i class="fas fa-user-tie" style="font-size: 14px"></i>Empleados</a>
            </li>
            @endcan

            @can('Listado_gasto')
            <li>
                <a href="{{route('listadoGastos.index')}}"><i class="fa fa-chart-pie" style="font-size: 14px"></i>Gastos</a>
            </li>
            @endcan

            @can( 'Listado_inventario')
            <li>
                <a href="{{route('inventario.home')}}"><i class="fas fa-boxes" style="font-size: 14px"></i>Inventario</a>
            </li>
            @endcan

            <li>
                <a href="{{route('ListadoJornadaLaboral.index')}}"><i class="bi bi-calendar-week-fill" style="font-size: 14px"></i>Jornada laboral</a>
            </li>

            @can( 'Listado_permisos')
            <li>
                <a href="{{route('permisos.lista')}}"><i class="fa fa-user-shield" style="font-size: 14px"></i>Permisos</a>
            </li>
            @endcan

            @can('Listado_roles')
            <li>
                <a href="{{route('roles.index')}}"><i class="fa fa-address-card" style="font-size: 14px"></i>Roles</a>
            </li>
            @endcan

            @can( 'Listado_turnos')
            <li>
                <a href="{{route('turnos.index')}}"><i class="bi bi-calendar-fill" style="font-size: 14px"></i>Turnos</a>
            </li>
            @endcan

            @can('Listado_usuario')
            <li>
                <a href="{{route('listado.usuario')}}"><i class="fas fa-users-cog" style="font-size: 14px"></i>Usuarios</a>
            </li>
            @endcan

            @can('Listado_ventas')
            <li>
                <a href="{{route('ventas.index')}}"><i class="fas fa-cash-register" style="font-size: 14px"></i>Ventas</a>
            </li>
            @endcan
        </ul>
    </nav>

<!--Contenido de la página-->
    <div id="content">
        @yield('content')
        <!--para agregar iconos de bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="../../js/script.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
