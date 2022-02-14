@extends('madre');
@section('title','Detalles del servicio');

@section('content')

<style>
    #IcNewServ{
        font-size:30px;
        width: 1em;
        height: 1em;
    }
    .servfun {
  border-top: 1px solid #E6E6E6 ;
  border-left: 1px solid #E6E6E6 ;
  border-right: 1px solid #E6E6E6;
  border-bottom: 1px solid #E6E6E6 ;
  padding: 20px;
  background-color: #E0F8F7;
  position:relative;
   }

   .servfu{
       font-style: bold;
       font-family: 'Times New Roman', Times, serif;
   }
</style>

<div class="servfun">
    <h1 class="servfu text-center">Detalles del Servicio</h1>
</div>
<!--Contenedor para los datos-->
<div class="servfun w-100" style="height: 700px">

    <div id="carouselExampleIndicators" class="carousel slide w-50 m-5" data-ride="carousel" style="float: right">

        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/assets/EuropeoLujo.jpeg" alt="First slide" style="height: 300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tipo Europeo de Lujo</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/Faraón.jpeg" alt="Second slide" style="height: 300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tipo Faraón</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/italianoLujo.jpeg" alt="Third slide" style="height: 300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tipo Italiano de Lujo</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/tipoEjecutivo.jpeg" alt="Fourth slide" style="height: 300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tipo Ejecutivo</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/tipoJardin.jpeg" alt="fifth slide" style="height: 300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tipo Jardín</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/assets/tipoRomano.jpeg" alt="sixth slide" style="height: 300px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tipo Romano</h5>
                </div>
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

    <form class="form-outline w-auto" style="float: left">
            <div class="form-group">
                <div class="form-outline col-md-12">
                    <label class="form-label" for="type">
                        <i id="IcNewServ" class="bi bi-archive"></i> Tipo de servicio
                    </label>
                    <input type="text" id="type" class="form-control" name="type"
                               value="{{$Servicio->type}}" readonly/>
                </div>
            </div>

            <div class="form-group">
                <div class="form-outline col-md-12">
                    <label class=" form-label" for="price">
                        <i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio
                    </label>
                    <input type="text" id="price" class="form-control"  name="price"
                           value="{{$Servicio->price}}" readonly/>
                </div>
            </div>


            <div class="form-group">
                <div class="form-outline col-md-12">
                    <label class="form-label" for="cuota">
                        <i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota
                    </label>
                    <input type="text" id="cuota" class="form-control"  name="cuota"
                          value="{{$Servicio->cuota}}" readonly/>
                </div>
            </div>

            <div class="form-group">
                <div class="form-outline col-md-12">
                    <label class="form-label" for="prima">
                        <i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio
                    </label>
                    <input type="text" id="prima" class="form-control"  name="prima"
                           value="{{$Servicio->prima}}" readonly/>
                </div>
            </div>


            <div class="form-group">
                <div class="form-outline col-md-12">
                    <label class="form-label" for="description">
                        <i id="IcNewServ" class="bi bi-pencil-square"></i>Descripción
                    </label>
                    <div class="col-md-12">
                        <textarea  name="description"  id="description"  cols="45" rows="3"
                                   readonly>{{$Servicio->description}}
                    </textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-outline col-md-12">
                    <label class="form-label" for="category">
                        <i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría
                    </label>
                    <input type="text" id="category" class="form-control"  name="category"
                           value="{{$Servicio->category}}" readonly/>
                </div>
            </div>


        <!--Contenedor para los botones-->
        <div class="col-md-12">
            <a class="btn btn-primary " href="#" > <i class="bi bi-x-octagon"></i>Ver Clientes</a>
            <a class="btn btn-warning " href="{{route('Servicio.lista')}}" > <i class="bi bi-x-octagon"></i>Regresar</a>
        </div><br>
    </form>
</div>

@endsection
