@extends('madre')
@section('title','Detalles jornada laboral')

@section('content')

<div class="emple">
    <h3> Detalles de la jornada laboral</h3>
    <hr>

    <!--Formulario para ver  los datos del cliente-->
    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
        <div class="form-group row">
            <label for="turno_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-journal-check"></i>Turno:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$jornadalaboral->turnos->name}}
            </div>
        </div>
        

        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-person-lines-fill"></i>Empleado:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$jornadalaboral->empleados->nombres}} {{$jornadalaboral->empleados->apellidos}}
            </div>
        </div>
        

        

        <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-group row ">
            <label for="fecha_inicio" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-date"></i>Fecha de inicio:</label>
            <div class="col-sm-7 mt-2 ml-6">
            {{date('d-m-Y',strtotime( $jornadalaboral->fecha_inicio))}}
            
            </div>
        </div>

        <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-group row ">
            <label for="fecha_fin" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-date-fill"></i>Fecha de finalización:</label>
            <div class="col-sm-7 mt-2 ml-6">
            {{date('d-m-Y',strtotime( $jornadalaboral->fecha_fin))}}
            
            </div>
        </div>
        

        <div class="form-group row">
            <label for="duracion" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-clock-history"></i>Días de trabajo:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$jornadalaboral->duracion}}
            </div>
        </div>
        

        <div class="form-group row">
            <label for="descripcion" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="fas fa-tasks"></i>Descripción:</label>
            <textarea disabled cols="52" rows="2" style="border: none; resize: none; background: none; color: rgb(48, 48, 48);user-select: none;">  {{$jornadalaboral->descripcion}}</textarea>
        </div>
        



        <div class="col"> </div>
        </div> 
        <!--botones-->
        <a class="btn btn-primary" href="/ListadoJornadaLaboral"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        
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
