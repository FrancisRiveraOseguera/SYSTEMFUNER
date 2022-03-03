@extends('madre');
@section('title','Detalles del servicio');

@section('content')

    <!--Contenedor para ver la información del tipo de servicio-->
    <div class="emple">
        <h3> Detalles del tipo de servicio</h3>
        <hr>
        <div class="emple">
            <form>
                @csrf
                <div class="form-group row">
                        <label for="tipo" class="control-label offset-md-1 requerido hijo" >
                            <i id="IcNewServ" class="bi bi-archive"></i>Tipo de servicio:
                        </label>
                        <div class="col-sm-8 mt-2 ml-4">
                            {{$Servicio->tipo}}
                        </div>
                </div>

                <div class="form-group row">
                    <label for="precio" class="control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio:
                    </label>
                    <div class="col-sm-8 m-2">
                        {{$Servicio->precio}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cuota" class="control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota del servicio:
                    </label>
                    <div class="col-sm-8 m-2 mr-5">
                        {{$Servicio->cuota}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prima" class="control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio:
                    </label>
                    <div class="col-sm-8 m-2">
                        {{$Servicio->prima}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="categoria" class="control-label offset-md-1 requerido hijo">
                        <i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría:
                    </label>
                    <div class="col-sm-8 mt-2" style="margin-left: 65px">
                        {{$Servicio->categoria}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="detalles" class="col-lg-2 control-label offset-md-1 requerido hijo">
                        <i id="IcNewServ" class="bi bi-pencil-square"></i>Detalles:
                    </label>
                    <div class="col-sm-8">
                        <textarea  name="detalles"  id="detalles" disabled
                                   cols="52" rows="2" style="border: none;">{{$Servicio->detalles}}
                        </textarea>
                    </div>
                </div>
                <br>

                <!--Contenedor para los botones-->
                <div class="col-md-12 ">
                    <a class="btn btn-primary " href="{{route('Servicio.lista')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>
                    <a class="btn btn-secondary " href="#" > <i class="fas fa-user"></i>Ver Clientes</a>
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
