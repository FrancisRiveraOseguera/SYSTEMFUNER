@extends('madre')
@section('title','Detalles de venta')

@section('content')

<div class="formato">
    <h3>Detalles de la venta al crédito</h3>
    <hr>

    <!--Datos de la venta al crédito-->
    <div class="formato">
        <div class="form-group row">
            <label for="nombre" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i> Nombre del cliente:</label>
            <div class="col-sm-8 mt-2 ml-6 detalle">
                {{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}
            </div>
        </div>

        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-person-workspace"></i> Empleado responsable:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$venta->responsable}}
            </div>
        </div>

        <div class="form-group row">
            <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-list-stars"></i>Tipo de servicio comprado:</label>
            <div class="col-sm-8 mt-2 ml-6">
            {{$venta->servicios->tipo}}
            </div>
        </div>

        <div class="form-group row">
            <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-wallet2"></i>Total a pagar:</label>
            <div class="col-sm-8 mt-2 ml-6">
                L.{{number_format($venta->servicios->precio, 2)}}
            </div>
        </div>

        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-month"></i> Fecha de venta:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{date_format($venta->created_at,"d/m/Y")}}
            </div>
        </div>

        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°1:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$venta->beneficiario1}}
            </div>
        </div>

        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$venta->telefono1}}
            </div>
        </div>

        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°2:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$venta->beneficiario2}}
            </div>
        </div>

        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$venta->telefono2}}
            </div>
        </div>

        <div class="col-lg-7 ml-5 pl-5">
            <acronym title="Haz click para ver si hay más beneficiarios agregados y click para ocultarlos." >
                <a class="checkbox" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-user-plus"></i> Ver más beneficiarios.
                </a>
            </acronym><br>
        </div>
        <div class="collapse" id="collapseExample"><br>
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°3:</label>
                <div class="col-sm-8 mt-2 ml-6">
                    {{$venta->beneficiario3}}
                </div>
            </div>

            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
                <div class="col-sm-8 mt-2 ml-6">
                    {{$venta->telefono3}}
                </div>
            </div>

            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°4:</label>
                <div class="col-sm-8 mt-2 ml-6">
                    {{$venta->beneficiario4}}
                </div>
            </div>

            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
                <div class="col-sm-8 mt-2 ml-6">
                    {{$venta->telefono4}}
                </div>
            </div>
        </div>

        <br>
        <!--botones-->
        <div>
            <a class="btn btn-primary" href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        </div>
    </div>
</div>

<style>
    .formato {
        border-top: 1px solid #E6E6E6 ;
        border-left: 1px solid #E6E6E6 ;
        border-right: 1px solid #E6E6E6;
        border-bottom: 1px solid #E6E6E6 ;
        padding: 20px;
        background-color: #E0F8F7;
        position:relative;
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .requerido{
        margin-top:-6px;
    }

    .hijo{
        font-weight: bold;
    }


    #IcNewEmp{
    font-size:25px;
    width: 1em;
    height: 1em;
}

</style>
@endsection
