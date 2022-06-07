@extends('madre')
@section('title','Detalles de venta')

@section('content')

<div class="emple">
    <h3> Detalles de venta </h3>
    <hr>

    <!--Formulario para ver  los datos del cliente-->
    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
        <div class="form-group row">
            <label for="nombre" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Nombre del cliente:</label>
            <div class="col-sm-8 mt-2 ml-6 detalle">
                {{$contadoventa->clientes->nombres}} {{$contadoventa->clientes->apellidos}}
            </div>
        </div>
        

        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Empleado responsable:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$contadoventa->empleados->nombres}} {{$contadoventa->empleados->apellidos}}
            </div>
        </div>
        

        <div class="form-group row">
            <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-list-stars"></i>Tipo de servicio comprado:</label>
            <div class="col-sm-8 mt-2 ml-6">
            {{$contadoventa->servicios->tipo}}
            </div>
        </div>

        <div class="form-group row">
            <label for="cantidad_v" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-sort-numeric-down"></i>Cantidad comprada:</label>
            <div class="col-sm-7 mt-2 ml-6">
            {{$contadoventa->cantidad_v}}
            </div>
        </div>

        <div class="form-group row">
            <label for="cantidad_v" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-wallet2"></i>Total a pagar:</label>
            <div class="col-sm-7 mt-2 ml-6">
            {{$contadoventa->cantidad_v * $contadoventa->servicios->precio}}
            </div>
        </div>

        <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-month"></i>Fecha de venta:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{date_format($contadoventa->created_at,"d/m/Y")}}
            </div>
        </div>

        <div class="col"> </div>
        </div><br>
        <!--botones-->
        <a class="btn btn-primary" href="{{route('listadoVentas.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        
    </form>
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
        .requerido{
            margin-top:-6px;
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
