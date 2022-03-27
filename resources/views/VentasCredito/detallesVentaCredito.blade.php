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

        <div class="form-group row">
            <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-cash-stack"></i> Cobro:</label>
            <div class="col-sm-8 mt-2 ml-6">
                Mensual
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


        <div class="col-sm-4 ml-5 pl-5">
        <acronym title="Haz clic para ver si hay más beneficiarios registrados.">
            <a class="hijo" href="#" onclick="esconderDiv()">
                <i class="bi bi-people-fill"></i>Otros beneficiarios
            </a>
        </acronym>
        </div>


        <br>
        <div class="col-sm-8 ml-5 pl-5" id="noMas" style="display: none">
            No hay más beneficiarios registrados.
        </div>

        <div id="divBeneficiario3" style="display:none;">
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°3:</label>
                <div class="col-sm-8 mt-2 ml-6" id="beneficiario3">{{$venta->beneficiario3}}</div>
            </div>
        </div>

        <div id="divtelefono3" style="display:none;">
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
                <div class="col-sm-8 mt-2 ml-6" id="telefono3" style="display: none;">{{$venta->telefono3}}</div>
            </div>
        </div>

        <div id="divBeneficiario4" style="display: none">
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°4:</label>
                <div class="col-sm-8 mt-2 ml-6" id="beneficiario4">{{$venta->beneficiario4}}</div>
            </div>
        </div>

        <div id="divtelefono4" style="display: none">
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
                <div class="col-sm-8 mt-2 ml-6" id="telefono4" style="display: none;">{{$venta->telefono4}}</div>
            </div>
        </div>

        <br>
        <!--botones-->
        <div>
            <a class="btn btn-primary" href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        </div>
</div>

<script>
    function esconderDiv() {
        var divBeneficiario3 = document.getElementById('divBeneficiario3');
        var divBeneficiario4 = document.getElementById('divBeneficiario4');
        var divtelefono3 = document.getElementById('divtelefono3');
        var divtelefono4 = document.getElementById('divtelefono4');
        var beneficiario3 = document.getElementById('beneficiario3');
        var beneficiario4 = document.getElementById('beneficiario4')
        var telefono3 = document.getElementById('telefono3');
        var telefono4 = document.getElementById('telefono4');
        var ver = document.getElementById('noMas');

        if (beneficiario3.innerHTML === '') {
            divBeneficiario3.style.display = "none";
        }else {
            divBeneficiario3.style.display = "block";
        }

        if (telefono3.innerHTML === '') {
            divtelefono3.style.display = "none";
        }else {
            divtelefono3.style.display = "block";
        }

        if (beneficiario3.innerHTML === '' && telefono3.innerHTML !== ''){
            divBeneficiario3.style.display = "none";
            divtelefono3.style.display = "none";
        }else if (beneficiario3.innerHTML !== '' && telefono3.innerHTML === ''){
            divBeneficiario3.style.display = "block";
            divtelefono3.style.display = "none";
        }

        if (beneficiario4.innerHTML === '') {
            beneficiario4.style.display = "none";
        }else {
            beneficiario4.style.display = "block";
        }

        if (telefono4.innerHTML === '') {
            divtelefono4.style.display = "none";
        }else {
            divtelefono4.style.display = "block";
        }

        if (beneficiario4.innerHTML === '' && telefono4.innerHTML !== ''){
            divBeneficiario4.style.display = "none";
            divtelefono4.style.display = "none";
        }else if (beneficiario4.innerHTML !== '' && telefono4.innerHTML === ''){
            divBeneficiario4.style.display = "block";
            divtelefono4.style.display = "none";
        }

        if (beneficiario3.innerHTML === '' && beneficiario4.innerHTML === ''){
            ver.style.display = 'block';
        }

    }
</script>

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
