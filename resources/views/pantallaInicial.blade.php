<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css/style.css" rel="stylesheet" type="text/css" >
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--para agregar iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <!--Titulo de la página-->
    <title>Funerales La Bendición</title>
</head>
<body>
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase"><img src="assets/logo.png" style="width: 50px;" alt="Logo" /> Funerales La Bendición</div><br>
        <div class="masthead-subheading">¡Bienvenido a Funerales La Bendición!</div><br>
        <a class="btn btn-light" href="#categorias">Categorías principales</a><br>
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel" style="width: 400px; margin-left: 350px">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/Jardín.png" alt="First slide" style="height: 280px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/Faraón.png" alt="Second slide" style="height: 280px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/Romano.png" alt="Third slide" style="height: 280px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</header>
<br>
<section class="page-section">
    <div class="container" id="categorias">
        <div class="text-center" style="font-family: 'Georgia'">
            <h1 class="section-heading text-uppercase">Categorías principales</h1><br>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <img src="/assets/empleados.png" alt="Empleados" width="200px">
                <a class="btn btn-success" href="{{route('empleado.index')}}">Dirigir a empleados</a>
                <p class="text-muted">Ingresa a nuestra base de datos para empleados.</p>
            </div>
            <div class="col-md-4">
                <img src="/assets/clientes.png" alt="Clientes" width="200px" class="mb-1"><br>
                <a class="btn btn-success" href="{{route('listado.clientes')}}">Dirigir a clientes</a>
                <p class="text-muted">Ingresa a nuestra base de datos para clientes.</p>
            </div>
            <div class="col-md-4">
                <img src="/assets/ataud.png" alt="Servicios" width="200px">
                <a class="btn btn-success" href="{{route('Servicio.lista')}}">Dirigir a servicios</a>
                <p class="text-muted">Ingresa a nuestra base de datos para servicios.</p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <img src="/assets/inventario1.png" alt="Inventario" width="200px">
                <a class="btn btn-success" href="{{route('inventario.home')}}">Dirigir a inventario</a>
                <p class="text-muted">Ingresa a nuestro inventario de productos.</p>
            </div>
            <div class="col-md-4">
                <img src="/assets/ventas1.png" alt="Ventas" width="200px" class="mb-1"><br>
                <a class="btn btn-success" href="{{route('ventas.index')}}">Dirigir a ventas</a>
                <p class="text-muted">Ingresa a nuestra base de datos de ventas.</p>
            </div>
        </div>
    </div>
</section>
<<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="../../js/script.js"></script>
</body>
</html>

