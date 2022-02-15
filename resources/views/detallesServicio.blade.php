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
<div class="servfun w-100">

    <form class="form-outline w-100">
        <div class="form-group">
            <div class="form-inline">
                <label class="form-label col-lg-3 offset-md-1" for="type">
                    <i id="IcNewServ" class="bi bi-archive"></i> Tipo de servicio
                </label>
                <input type="text" id="type" class="form-control col-sm-6" name="type"
                       value="{{$Servicio->type}}" readonly/>
            </div>
        </div>

        <div class="form-group">
            <div class="form-inline">
                <label class=" form-label col-lg-3 offset-md-1" for="price">
                    <i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio
                </label>
                <input type="text" id="price" class="form-control col-sm-6"  name="price"
                       value="{{$Servicio->price}}" readonly/>
            </div>
        </div>


        <div class="form-group">
            <div class="form-inline">
                <label class="form-label col-lg-3 offset-md-1" for="cuota">
                    <i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota
                </label>
                <input type="text" id="cuota" class="form-control col-sm-6"  name="cuota"
                       value="{{$Servicio->cuota}}" readonly/>
            </div>
        </div>

        <div class="form-group">
            <div class="form-inline">
                <label class="form-label col-lg-3 offset-md-1" for="prima">
                    <i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio
                </label>
                <input type="text" id="prima" class="form-control col-sm-6"  name="prima"
                       value="{{$Servicio->prima}}" readonly/>
            </div>
        </div>


        <div class="form-group">
            <div class="form-inline">
                <label class="form-label col-lg-3 offset-md-1" for="description">
                    <i id="IcNewServ" class="bi bi-pencil-square"></i>Descripción
                </label>
                <div class="col-sm-6">
                        <textarea  name="description"  id="description"  cols="67" rows="3"
                                   readonly>{{$Servicio->description}}
                    </textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-inline">
                <label class="form-label col-lg-3 offset-md-1 text" for="category">
                    <i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría
                </label>
                <input type="text" id="category" class="form-control col-sm-6"  name="category"
                       value="{{$Servicio->category}}" readonly/>
            </div>
        </div>
        <br>

        <!--Contenedor para los botones-->
        <div class="col-md-12 text-center ">
            <a class="btn btn-primary " href="#" > <i class="bi bi-x-octagon"></i>Ver Clientes</a>
            <a class="btn btn-warning " href="{{route('Servicio.lista')}}" > <i class="bi bi-x-octagon"></i>Regresar</a>
        </div><br>
    </form>
</div>

@endsection
