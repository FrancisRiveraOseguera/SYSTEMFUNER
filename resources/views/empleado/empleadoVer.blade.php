@extends('madre')
@section('title', 'Detalles empleado')

@section('content')

    <div class="emple">
        <h3> Detalles del empleado</h3>
        <hr>
    <div class="emple">
        <form method="post" action="">
            @csrf
            <div class="form-group row">
                <label for="DNI_empleado" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Identidad:</label>
                <div class="col-sm-8 mt-2">
                  {{$empleado->identidad}}
                </div>
            </div>

            <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres:</label>
                <div class="col-sm-8 mt-2">
                 {{$empleado->nombres }}
                </div>
            </div>

            <div class="form-group row" >
                <label for="apellidos" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos:</label>
                <div class="col-sm-8 mt-2">
                    {{$empleado->apellidos}}
                </div>
            </div>
        
            <div class="form-group row">
                <label for="apellidos" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-gender-ambiguous"></i>Género:</label>
                <div class="col-sm-8 mt-2">
                    {{$empleado->genero}}
                </div>
            </div>

            <?php $fecha_actual = date("d-m-Y");?>

            <div class="form-group row">
                <label for="fecha_ingreso"  class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha de Ingreso:</label>
                <div class="col-sm-8 mt-2">
                {{date('d-m-Y',strtotime($empleado->fecha_ingreso))}}
                </div>
            </div>

            <div class="form-group row">
                <label for="cargo_id"  class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp"class="bi bi-person-rolodex"></i>Cargo:</label>
                <div class="col-sm-8 mt-2">
                    {{$empleado->cargos->cargo}}
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_de_nacimiento" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp"class="bi bi-calendar-month"></i>Fecha Nacimiento:</label>
                <div class="col-sm-8 mt-2">
                {{date('d-m-Y',strtotime($empleado->fecha_de_nacimiento))}}
                
                </div>
            </div>

            <div class="form-group row">
                <label for="telefono" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. Empleado:</label>
                <div class="col-sm-8 mt-2">
                    {{$empleado->telefono}}
                </div>
            </div>

            <div class="form-group row">
                <label for="contacto_de_emergencia" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. Emergencia:</label>
                <div class="col-sm-8 mt-2">
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
            <a class="btn btn-primary" href="{{route('empleado.index')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>
            <a class="btn btn-danger" href="{{route('constanciatrabajo.pdf', ['id'=>$empleado->id])}}" data-toggle="modal" data-target="#modalPush{{$empleado->id}}"><i class="fas fa-file-pdf"></i>Previsualizar e imprimir constancia de trabajo</a>
            <!--Modal: modalPush-->
            <div class="modal fade" tabindex="1" id="modalPush{{$empleado->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
    <!--Header-->
    <div class="modal-header d-flex justify-content-center">
        <p class="heading">Un momento...</p>
    </div>

    <!--Body-->
    <div class="modal-body">
        <i class="pdf fas fa-file-pdf fa-4x mb-4"></i>
        <p>Para exportar la constancia de trabajo  a PDF y poder imprimirlo, haz clíc en el logo de la funeraria ubicado en la parte superior izquierda.</p>
    </div>

    <!--Footer-->
    <div class="modal-footer flex-center">
        <a href="{{route('constanciatrabajo.pdf', ['id'=>$empleado->id])}}" class="modal-footer btn-info">¡Entendido!</a>
    </div>
</div>
</div>
</div>

</td>

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