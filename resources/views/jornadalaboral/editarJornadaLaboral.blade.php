<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT name, id FROM turnos ");
    $query2=mysqli_query($mysqli,"SELECT cargo, id FROM cargos ");
       
    if(isset($_POST['turno_id']))
    {
        $turno_id=$_POST['turno_id'];
        echo $turno_id;
    }
       
    if(isset($_POST['cargo_id']))
    {
        $cargo_id=$_POST['cargo_id'];
        echo $cargo_id;
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
</div><br>
@endif

<div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
		@method('put')
		<div class="form-group row">
            <label for="turno_id" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp"  class="bi bi-journal-check"></i>Turno</label>
        <div class="col-sm-8" >
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
            <label for="cargo_id" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp"  class="bi bi-person-lines-fill"></i>Cargo</label>
        <div class="col-sm-8" >
            <select name="cargo_id"  class=" form-control" charset="utf8_decode">
                
                <option value="{{$jornadas->cargo_id}}">{{$jornadas->cargos->cargo}}</option>
        
                <?php 
                while($datos = mysqli_fetch_array($query2))
                {?>     
                <option value="<?php echo $datos['id']?>"> <?php echo $datos['cargo' ]?> </option>
                <?php
                }?>
            </select>
        </div>
    </div>

    <div>
    <script src='../../js/select2.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $('cargo_id').select2();
        });
    </script>
</div>

        <div class="form-group row">
            <label for="duracion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="bi bi-clock-history"></i>Duración</label>
            <div class="col-sm-8">
            <input type = "text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength = "15" name="duracion" id="duracion"
                    placeholder="Duración en días o meses de la jornada laboral" class="form-control"
                    value="{{$jornadas->duracion}}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-lg-2 control-label offset-md-1 requerido">
                <i id="IcNewEmp" class="fas fa-tasks"></i>Descripción</label>
            <div class="col-sm-8">
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