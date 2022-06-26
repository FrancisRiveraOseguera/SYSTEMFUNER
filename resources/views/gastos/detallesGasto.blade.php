@extends('madre')
@section('title','Detalles del gasto')

@section('content')

<div class="emple">
    <h3> Detalles del gasto</h3>
    <hr>

    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
        <div class="form-group row">
            <label for="tipo_gasto" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-card-heading"></i>Tipo de gasto:</label>
            <div class="col-sm-8 mt-1 ml-6">
                {{$gasto->tipo_gasto}}
            </div>
        </div>


        <div class="form-group row">
            <label for="detalles_gasto" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Descripción:</label>
            <textarea disabled rows="4" style="color: black; background: none; border: none; resize: none;" class="col-sm-6 mt-1 ml-6">{{$gasto->detalles_gasto}}
            </textarea>
        </div>
        

        <div class="form-group row">
                <label for="cantidad" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-cash-coin"></i>Cantidad:</label>
            <div class="col-sm-8 mt-1 ml-6">
                L. {{$gasto->cantidad}}
            </div>
        </div>
        

        <div class="form-group row">
            <label for="empleado_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Responsable:</label>
            <div class="col-sm-8 mt-1 ml-6">
            {{$gasto->empleados->nombres}} {{$gasto->empleados->apellidos}}
            </div>
        </div>


        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-month"></i>Fecha:</label>
            <div class="col-sm-7 mt-1 ml-6">
                {{($gasto->fecha)}}
            </div>
        </div><br>
         
        <!--botones-->
        <a class="btn btn-primary" href="/listadoGastos"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        
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
    </style>
</div>
@endsection
