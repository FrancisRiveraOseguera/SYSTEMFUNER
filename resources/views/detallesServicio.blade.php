@extends('madre');
@section('title','Detalles del servicio');

@section('content')

    <!--Contenedor para ver la información del tipo de servicio-->
    <div class="emple">
        <h3> Detalles del tipo de Servicio</h3>
        <hr>
        <div class="emple">
            <form class="form-outline">
                @csrf
                <div class="form-group row">
                    <label for="tipo" class="col-lg-3 control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-archive"></i>Tipo de servicio:
                    </label>
                    <div class="col-sm-8">
                        {{$Servicio->tipo}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="precio" class="col-lg-3 control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio:
                    </label>
                    <div class="col-sm-8">
                        {{$Servicio->precio}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cuota" class="col-lg-3 control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota:
                    </label>
                    <div class="col-sm-8">
                        {{$Servicio->cuota}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prima" class="col-lg-3 control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio:
                    </label>
                    <div class="col-sm-8">
                        {{$Servicio->prima}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoria" class="col-lg-3 control-label offset-md-1 requerido hijo">
                        <i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría:
                    </label>
                    <div class="col-sm-8">
                        {{$Servicio->categoria}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="detalles" class="col-lg-3 control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-pencil-square"></i>Detalles:
                    </label>
                    <div class="col-sm-8">
                        {{$Servicio->detalles}}
                    </div>
                </div>
                <br>

                <!--Contenedor para los botones-->
                <div class="col-md-12 ">
                    <a class="btn btn-primary " href="#" > <i class="fas fa-user"></i>Ver Clientes</a>
                    <a class="btn btn-warning " href="{{route('Servicio.lista')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>
                </div>
            </form>
        </div>
    </div>


    <style>
        .emple {
            border-top: 1px solid #E6E6E6 ;
            border-left: 1px solid #E6E6E6 ;
            border-right: 1px solid #E6E6E6;
            border-bottom: 1px solid #E6E6E6 ;
            padding: 20px;
            background-color: #E0F8F7;
            position:relative;
        }

        .emple{
            font-style: bold;
            font-family: 'Times New Roman', Times, serif;
        }

        .hijo{
            font-weight: bold;
        }
    </style>

@endsection
