<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT name, id FROM turnos ");
    $query2=mysqli_query($mysqli,"SELECT nombres, apellidos, id FROM empleados ");
       
    if(isset($_POST['turno_id']))
    {
        $turno_id=$_POST['turno_id'];
        echo $turno_id;
    }
       
    if(isset($_POST['empleado_id']))
    {
        $empleado_id=$_POST['empleado_id'];
        echo $empleado_id;
    }

?>
@extends('madre')
@section ('title' , 'Nueva Jornada Laboral')

@section('content')

<div class="emple">
    <h3> Nueva jornada laboral</h3>
    <hr>
@if ($errors->any())
<div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i>El formulario contiene errores</h5>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div><br>
@endif
<!-- formulario de nueva jornada laboral -->
<div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
        <p style="background: rgba(227,223,168,0.4); padding: 5px; font-size: 13px; font-weight: bold; color: green; border-radius: 10px">Nota: La duración mínima de cada jornada es de siete días.</p>
<!--Campo para seleccionar el turno  -->
	<div class="form-group row">
            <label for="turno_id" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp"  class="bi bi-journal-check"></i>Turno</label>
        <div class="col-sm-8" >
            <select name="turno_id"  class=" form-control">
                
                <option selected disabled value="0">Para seleccionar escribe las primeras letras del nombre del turno.</option>
        
                <?php 
                while($datos = mysqli_fetch_array($query))
                {?>     
                <option value="<?php echo $datos['id']?>"> <?php echo $datos['name' ]?> </option>
                <?php
                }?>
            </select>
        </div>
    </div>

    <div>
    <script src='../../js/select2.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $('turno_id').select2();
        });
    </script>
</div>
<!--Campo para seleccionar el empleado  -->
    <div class="form-group row">
            <label for="empleado_id" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp"  class="bi bi-person-lines-fill"></i>Empleado</label>
        <div class="col-sm-8" >
            <select name="empleado_id"  class=" form-control">  
                <option selected disabled value="0">Para seleccionar escribe las primeras letras del nombre del empleado.</option>
        
                    <?php 
                        while($datos = mysqli_fetch_array($query2))
                    {?>     
                <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombres' ].' '.$datos['apellidos' ]?> </option>
                   <?php
                     }?>
            </select>
        </div>
    </div>

    <div>
    <script src='../../js/select2.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $('empleado_id').select2();
        });
    </script>
</div>
<!-- Campo para la fecha de inicio de la jornada laboral -->
    <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
            <label for="fecha_inicio" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha inicio</label>
            <div class="col-sm-8">
                    <input type="date" name="fecha_inicio" id="fecha" class="form-control hijo" oninput="calculardiasDiscount()"
                    value="<?php echo date('Y-m-d',strtotime($fecha_actual))?>{{($jornadalaboral->fecha_inicio ?? '')}}"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>"
                    min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
            </div>
        </div>
<!-- Campo para la fecha de finalizacíon de la jornada laboral -->
    <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
            
            <label for="fecha_fin" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha finalización</label>
            <div class="col-sm-8">
                    
                    <input type="date" name="fecha_fin" id="fechafin" class="form-control hijo" 
                    value="<?php echo date('Y-m-d',strtotime($fecha_actual))?>{{($jornadalaboral->fecha_fin ?? '')}}"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual." 90 day"));?>"
                    min="<?php echo date('Y-m-d',strtotime($fecha_actual." +7 day"));?>"/>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--Campo que mostrará automáticamente los dias que durará la jornada laboral  -->
    <div class="form-group row">
            <label for="duracion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp"  class="bi bi-clock-history"></i>Días de trabajo</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="duracion" name="duracion" readonly value=""/>
            </div>
        </div>
<!-- Código para el calculo de días que durará la jornada laboral -->
        <script src="http://momentjs.com/downloads/moment.min.js"></script>
        <script>$(function(){
            $('#fechafin').on('change', calculardias);
             });
        
             function calculardias() {
            
                      fecha = $(this).val();
                      var fechainicial = moment(new Date());
                      var fechafinal = moment(new Date(fecha));
                      var days = fechafinal.diff(fechainicial, 'days')+3;

                     $('#duracion').val(days);
              } 
        </script>
<!-- Campo para colocar la descripción de la jornada laboral -->
        <div class="form-group row">
            <label for="descripcion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Descripción</label>
            <div class="col-sm-8">
                <textarea rows="2" cols="52" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="descripcion" id="descripcion"  maxlength = "70" minlenght = "10"
                    placeholder="Descripción de la jornada laboral." 
                    class="form-control">{{old('descripcion', $jornadalaboral->descripcion ?? '')}}</textarea>
            </div>
        </div>
<!-- Botones  -->
		<a class="btn btn-primary" href="/ListadoJornadaLaboral"><i class="bi bi-box-arrow-left"></i>Regresar</a>
		<button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>
@endsection
