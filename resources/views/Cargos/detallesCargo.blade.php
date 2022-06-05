@extends('madre')
@section('title','Detalles del cargo')

@section('content')

<div class="formato">
    <h3>Detalles del cargo</h3>
    <hr>

    <div class="formato">
        <div class="form-group row">
            <label for="nombre" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-card-heading"></i> Tipo de cargo:</label>
            <div class="col-sm-8 mt-2 detalle">
                {{$cargo->cargo}}
            </div>
        </div>

        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-cash-coin"></i> Sueldo mensual:</label>
            <div class="col-sm-8 mt-2">
                L.{{number_format($cargo->sueldo, 2)}}
            </div>
        </div>

        <div class="form-group row">
            <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Tareas del cargo:</label>
            <div class="col-sm-8 mt-2 ">
            <textarea disabled rows="10" cols="60" style="border: none; resize: none; user-select: none;">{{$cargo->detalles_cargo}}</textarea>
            </div>
        </div>
        <br>

        <div>
            <a class="btn btn-primary" href="{{route('listadoCargos.index')}}">
                <i class="bi bi-box-arrow-left"></i>Regresar
            </a>
        </div>
    </div>
</div>

@endsection
