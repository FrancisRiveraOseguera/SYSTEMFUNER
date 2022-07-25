<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT name, id FROM turnos ");
    if(isset($_POST['turno_id']))
    {
        $turno_id=$_POST['turno_id'];
        echo $turno_id;
    }

    

?>
@extends('madre')
@section ('title' , 'Editar jornada laboral')
@section('content')

<div class="emple">
    <h3> Editar jornada laboral</h3>
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
</div>
@endif
</div> <br>

<div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
		@method('put')
		<div class="form-group row">
            <label for="turno_id" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp"  class="bi bi-journal-check"></i>Turno</label>
        <div class="col-sm-7" >
            <select name="turno_id"  class=" form-control" charset="utf8_decode">
                
                <option value="{{$jornadas->turno_id}}">{{$jornadas->turnos->name}}</option>
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

<div class="form-group row">
    <label for="empleado_id" class="col-lg-3 control-label offset-md-1 requerido">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i id="IcNewEmp"  class="bi bi-person-lines-fill"></i>Empleado</label>
<div class="col-sm-7">
    <input type = "text" readonly
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        maxlength = "35" name="empleado_id" id="empleado_id"
        placeholder="Seleccione el nombre del empleado." class="form-control"
    value="{{$jornadas->empleados->nombres }} {{$jornadas->empleados->apellidos}}"/>
</div>
</div>



<!-- Campo para la fecha de inicio de la jornada laboral -->
    
<?php $fecha_actual = date("d-m-Y");?>   
        <div class="form-group row">
            <label for="fecha_inicio" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha inicio</label>
            <div class="col-sm-7">
                    <input type="date" name="fecha_inicio" id="fecha" class="form-control hijo"  readonly oninput="calculardiasDiscount()"
                    value= "{{old('fecha_inicio', $jornadas->fecha_inicio ?? '')}}"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>"
                    min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
            </div>
        </div>
<!-- Campo para la fecha de finalizacíon de la jornada laboral -->
    <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
            
            <label for="fecha_fin" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp"class="bi bi-calendar-date-fill"></i>Fecha finalización</label>
            <div class="col-sm-7">
                    
                    <input type="date" name="fecha_fin" id="fechafin" class="form-control hijo"  
                    value= "{{old('fecha_fin', $jornadas->fecha_fin ?? '')}}"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual." 90 day"));?>"
                    min="<?php echo date('Y-m-d',strtotime($fecha_actual." +7 day"));?>"/>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Campo que mostrará automáticamente los dias que durará la jornada laboral  -->
            <div class="form-group row">
                    <label for="duracion" class="col-lg-3 control-label offset-md-1 requerido">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i id="IcNewEmp"  class="bi bi-clock-history"></i>Días de trabajo</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="duracion" name="duracion" readonly value="{{$jornadas->duracion}}"/>
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

        <div class="form-group row">
            <label for="descripcion" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="fas fa-tasks"></i>Descripción</label>
            <div class="col-sm-7">
                <textarea rows="2" cols="52" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="descripcion" id="descripcion"  maxlength = "70" minlenght = "10"
                    placeholder="Descripción de la jornada laboral." 
                    class="form-control">{{$jornadas->descripcion}}</textarea>
            </div>
        </div>


		<a class="btn btn-primary" href="/ListadoJornadaLaboral"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
		<button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>
@endsection