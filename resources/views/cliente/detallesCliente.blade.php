@extends('madre')
@section('title','Detalles del cliente')

@section('content')

<div class="emple">
    <h3> Detalles del cliente</h3>
    <hr>

    <!--Formulario para ver  los datos del cliente-->
    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
        <div class="form-group row">
            <label for="identidad" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Identidad:</label>
            <div class="col-sm-8">
                {{$cliente->identidad}}
            </div>
        </div>


        <div class="form-group row">
                <label for="nombres" class="col-lg-2 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres:</label>
            <div class="col-sm-8">
                {{$cliente->nombres}}
            </div>
        </div>


        <div class="form-group row">
            <label for="apellidos" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos:</label>
            <div class="col-sm-8">
            {{$cliente->apellidos}}
            </div>
        </div>


        <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-group row">
            <label for="fecha_de_nacimiento" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-month"></i>Fecha Nacimiento:</label>
            <div class="col-sm-8">
                {{ $cliente->fecha_de_nacimiento}}
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. del Cliente:</label>
            <div class="col-sm-8">
                {{$cliente->telefono}}
            </div>
        </div>


        <div class="form-group row">
            <label for="direccion" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-signpost"></i>Dirección:</label>
            <textarea disabled cols="52" rows="2">{{$cliente->direccion}}
            </textarea>
        </div>


        <div class="form-group row">
            <label for="ocupacion" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="fas fa-user-tie"></i>Ocupación:</label>
            <div class="col-sm-8">
            {{$cliente->ocupacion}}
            </div>
        </div>


        <div class="form-group row">
            <label for="tipo_de_servicio" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-archive"></i>Tipo de servicio funerario:</label>
            <div class="col-sm-8">
            {{ $cliente->tipo_de_servicio}}
            </div>
        </div>

        <div class="form-group row">
            <label for="nombre_beneficiario_1" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombre del beneficiario N°1:</label>
            <div class="col-sm-8">
                {{ $cliente->nombre_beneficiario_1}}
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono_beneficiario_1" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. del Beneficiario N°1:</label>
            <div class="col-sm-8">
                    {{$cliente->telefono_beneficiario_1}}
            </div>
        </div>


        <div class="form-group row">
            <label for="nombre_beneficiario_2" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombre del beneficiario N°2:</label>
            <div class="col-sm-8">
                    {{ $cliente->nombre_beneficiario_2}}
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono_beneficiario_2" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. del Beneficiario N°2:</label>
            <div class="col-sm-8">
                    {{$cliente->telefono_beneficiario_2}}
            </div>
        </div>


        <div class="form-group row">
            <label for="nombre_beneficiario_3" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombre del beneficiario N°3:</label>
            <div class="col-sm-8">
                {{$cliente->nombre_beneficiario_3}}
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono_beneficiario_3" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. del Beneficiario N°3:</label>
            <div class="col-sm-8">
                {{$cliente->telefono_beneficiario_3}}
            </div>
        </div>

        <div class="form-group row">
            <label for="nombre_beneficiario_4" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombre del beneficiario N°4:</label>
            <div class="col-sm-8">
                {{$cliente->nombre_beneficiario_4}}
            </div>
        </div>


        <div class="form-group row">
            <label for="telefono_beneficiario_4" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. del Beneficiario N°4:</label>
            <div class="col-sm-8">
                {{$cliente->telefono_beneficiario_4}}
            </div>
        </div>
        <br>

        <!--botones-->
        <a class="btn btn-primary" href="{{route('listado.clientes')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        
    </form>

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

        #IcNewEmp{
        font-size:25px;
        width: 1em;
        height: 1em;
    }


    </style>


@endsection
