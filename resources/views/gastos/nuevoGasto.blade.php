@extends('madre')
@section ('title' , 'Nuevo Gasto')
@section('content')

<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM empleados");
       
    if(isset($_POST['empleado_id']))
    {
        $empleado_id=$_POST['empleado_id'];
        echo $empleado_id;
    }

?>

<div class="formato">
    <h3> Nuevo gasto</h3>
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
</div><br>

    <div class="formato">
    <form method="post" action="" autocomplete="off">
        @csrf
    
        <div class="form-group row">
                <label for="tipo_gasto" class="col-lg-2 control-label offset-md-1 requerido">
                    <i id="IcNewEmp" class="bi bi-card-heading"></i>Tipo de gasto</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "50" name="tipo_gasto" id="tipo_gasto"
                    placeholder="Nombre del gasto" class="form-control"
                    value="{{old('tipo_gasto', $gasto->tipo_gasto ?? '')}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="detalles_gasto" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Descripción</label>
            <div class="col-sm-8">
                <textarea rows="2" cols="52" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="detalles_gasto" id="detalles_gasto"  maxlength = "1000" minlenght = "25"
                    placeholder="Descripción de los detalles del gasto." 
                    class="form-control">{{old('detalles_gasto', $gasto->detalles_gasto ?? '')}}</textarea>
            </div>
        </div>

        

        <div class="form-group row">
            <label for="cantidad" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-cash-coin"></i>Cantidad</label>
            <div class="col-sm-8">
                <input type = "text"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    name="cantidad" id="cantidad"  maxlength = "5"
                    placeholder="Cantidad gastada" class="form-control"
                    value="{{old('cantidad', $gasto->cantidad ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="empleado_id" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Responsable</label>
        <div class="col-sm-8">
            <select name="empleado_id"  class=" form-control">
                
                <option selected disabled value="0">Para seleccionar escribe las primeras letras del nombre del empleado.</option>
        
                <?php 
                while($datos = mysqli_fetch_array($query))
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

        <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
            <label for="fecha" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha</label>
            <div class="col-sm-8">
                    <input type="text" readonly name="fecha" id="fecha_ingreso" class="form-control hijo" 
                    value="<?php echo date($fecha_actual)?>{{($gasto->fecha ?? '')}}"/>
            </div>
        </div>

        
        <br>

        <a class="btn btn-primary" href="/listadoGastos"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

    </form>
</div>

@endsection
