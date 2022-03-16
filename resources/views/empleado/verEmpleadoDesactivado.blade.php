@extends('madre')
@section('title', 'Detalles empleado')

@section('content')

    <div class="emple">
        <h3> Detalles del empleado desactivado</h3>
        <hr>
    <div class="emple">
        <form method="post" action="">
            @csrf
            <div class="form-group row">
                <label for="identidad" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Identidad:</label>
                <div class="col-sm-8">
                  {{$empleado->identidad}}
                </div>
            </div>

            <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres:</label>
                <div class="col-sm-8">
                 {{$empleado->nombres }}
                </div>
            </div>

            <div class="form-group row" >
                <label for="apellidos" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos:</label>
                <div class="col-sm-8">
                    {{$empleado->apellidos}}
                </div>
            </div>

            <div class="form-group row">
                <label for="apellidos" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-gender-ambiguous"></i>Género:</label>
                <div class="col-sm-8">
                    {{$empleado->genero}}
                </div>
            </div>

            <?php $fecha_actual = date("d-m-Y");?>

            <div class="form-group row">
                <label for="fecha_de_nacimiento" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp"class="bi bi-calendar-month"></i>Fecha Nacimiento:</label>
                <div class="col-sm-8">
                    {{$empleado->fecha_de_nacimiento}}
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_ingreso"  class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-date"></i>Fecha de Ingreso:</label>
                <div class="col-sm-8">
                   {{$empleado->fecha_ingreso}}
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_ingreso"  class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="fas fa-calendar-check"></i>Fecha de Desactivación:</label>
                <div class="col-sm-8">
                    {{$empleado->fecha_desactivacion}}
                </div>
            </div>

            <div class="form-group row">
                <label for="telefono" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. Empleado:</label>
                <div class="col-sm-8">
                    {{$empleado->telefono}}
                </div>
            </div>

            <div class="form-group row">
                <label for="contacto_de_emergencia" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. emergencia:</label>
                <div class="col-sm-8">
                   {{$empleado->contacto_de_emergencia }}
                </div>
            </div>

            <div class="form-group row">
                <label for="apellidos" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-signpost"></i>Dirección:</label>
                <textarea disabled cols="52" rows="2" style="border: none; resize: none; user-select: none;">{{$empleado->direccion}}
                </textarea>
            </div>
            <br>

            <!--REGRESAR A PANTALLA PRINCIPAL EMPLEADO-->
            <a class="btn btn-primary" href="{{route('listado.empleados.desactivados')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>

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

@endsection
