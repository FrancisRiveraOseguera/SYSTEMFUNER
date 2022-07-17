@extends('madre')
@section('title','Detalles del servicio')

@section('content')

<!--Contenedor para ver la información del tipo de servicio-->
<div class="formato">
    <h3> Detalles del tipo de servicio</h3>
    <hr>
    <div class="formato">
        <div class="form-group row">
            <label for="tipo" class="col-lg-3 control-label offset-md-1 requerido hijo" >
                <i id="IcNewServ" class="bi bi-archive"></i>Tipo de servicio funerario:
            </label>
            <div class="col-sm-8 mt-2 detalle">
                {{$Servicio->tipo}}
            </div>
        </div>

        <div class="form-group row">
            <label for="precio" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio:
            </label>
            <div class="col-sm-8 mt-2 detalle">
                L.{{number_format($Servicio->precio,2)}}
            </div>
        </div>

        <div class="form-group row">
            <label for="cuota" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota del servicio:
            </label>
            <div class="col-sm-8 mt-2 detalle">
                L.{{number_format($Servicio->cuota,2)}}
            </div>
        </div>

        <div class="form-group row">
            <label for="prima" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio:
            </label>
            <div class="col-sm-8 mt-2 detalle">
                L.{{number_format($Servicio->prima,2)}}
            </div>
        </div>

        <div class="form-group row">
            <label for="categoria" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría del servicio:
            </label>
            <div class="col-sm-8 mt-2 detalle">
                {{$Servicio->categoria}}
            </div>
        </div>

        <div class="form-group row">
            <label for="detalles" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewServ" class="bi bi-pencil-square"></i>Detalles del servicio:
            </label>
            <div class="col-sm-8 mt-2 detalle">
                <textarea  name="detalles"  id="detalles" disabled
                        cols="52" rows="3" style="border: none; resize: none; background: none; color: rgb(48, 48, 48);user-select: none;">{{$Servicio->detalles}}
                </textarea>
            </div>
        </div>
        <br>

        <!--Contenedor para los botones-->
        <div class="col-md-12 ">
            <a class="btn btn-primary " href="{{route('Servicio.lista')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>
        </div>
    </div>
</div>

@endsection
