@extends('madre')
<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, cargo  FROM cargos");
    
   
    if(isset($_POST['cargo_id']))
    {
        $cliente_id=$_POST['cargo_id'];
        echo $cargo_id;
    }


?>
@section ('title' , 'Nuevo Empleado')

@section('content')

    <div class="emple">
    <h3> Nuevo empleado</h3>
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

    <!--Formulario-->
    <div class="emple"> 
    <form method="post" action="" autocomplete="off">
        @csrf
        <div class="form-group row">
            <label for="identidad" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Identidad</label>
            <div class="col-sm-7">
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                maxlength = "13" name="identidad" id="identidad" maxlength = "13" placeholder="Escriba el número de identidad del empleado, sin guiones." 
                class="form-control" value="{{old('identidad', $empleado->identidad ?? '')}}"/>  
            </div>
        </div>



        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Nombres</label>
            <div class="col-sm-7">
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                maxlength = "35" name="nombres" id="nombres"  maxlength = "35" placeholder="Nombres del empleado." class="form-control" 
                value="{{old('nombres', $empleado->nombres ?? '')}}"/>  
            </div>

        </div>


        <div class="form-group row">
            <label for="apellidos" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="bi bi-person-fill"></i>Apellidos</label>
            <div class="col-sm-7">
                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                maxlength = "35" name="apellidos" id="apellidos" maxlength = "35"  placeholder="Apellidos del empleado." class="form-control" 
                value="{{old('apellidos', $empleado->apellidos ?? '')}}"/>  
            </div>
        </div>

        <div class="form-group row">
            <label for="genero" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="bi bi-gender-ambiguous"></i>Género</label>
            <div class="col-sm-7">
                <select name="genero" id="genero"  class="form-control" value="{{old('genero', $empleado->genero ?? '')}}"/>
                    <option selected disabled value="">Seleccione el género del empleado</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>    
            </div>
        </div>


        <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
                <label for="fecha_ingreso" class="col-lg-3 control-label offset-md-1 requerido">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha de Ingreso</label>
            <div class="col-sm-7">
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" 
                value="{{old('fecha_ingreso', $empleado->fecha_ingreso ?? '')}}"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="cargo_id" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="bi bi-person-rolodex"></i>Cargo</label>
            <div class="col-sm-7">
                <select  name="cargo_id" style=";" class="  form-control " charset="utf8_decode" >

            <option disabled selected value="0">Selecciona el cargo del nuevo empleado</option>
                <?php 
            
                while($datos = mysqli_fetch_array($query))
                {?>      
                    <option value="<?php echo $datos['id']?>"> <?php echo $datos['cargo' ]?> </option>
                    <?php
                }
                    ?> 
                </select>
            </div>
            <script src='../../js/select2.min.js'></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('cargo_id').select2();
        });
    </script>
        </div>


        
        <div class="form-group row">
            <label for="fecha_de_nacimiento" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp"class="bi bi-calendar-month"></i>Fecha Nacimiento</label>
            <div class="col-sm-7">
                <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento" class="form-control" 
                value="{{old('fecha_de_nacimiento', $empleado->fecha_de_nacimiento ?? '')}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 60 year"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>"/>
            </div>
        </div>
        
            
        <div class="form-group row">
            <label for="telefono" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. Empleado</label>
            <div class="col-sm-7">
            <input type="text" placeholder="Número de teléfono del empleado." maxlength="8"
                id="telefono" name="telefono" maxlength="8" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('telefono', $empleado->telefono ?? '')}}"/>
            </div>
        </div>
        

        <div class="form-group row">
            <label for="contacto_de_emergencia" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i id="IcNewEmp" class="bi bi-telephone-forward"></i>Tel. Emergencia</label>
            <div class="col-sm-7">
            <input type="text" placeholder="Número de emergencia del empleado." maxlength="8"
                id="contacto_de_emergencia" name="contacto_de_emergencia" maxlength="8" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                value="{{old('contacto_de_emergencia', $empleado->contacto_de_emergencia ?? '')}}"/>
            </div>
        </div>


        <div class="form-group row">
            <label for="direccion" class="col-lg-3 control-label offset-md-1 requerido">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i  id="IcNewEmp"class="bi bi-signpost"></i>Dirección</label>
            <div class="col-sm-7">
                <textarea   maxlength = "100" name="direccion" id="direccion" maxlength="100" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                placeholder="Dirección de domicilio."  rows="1" cols="52"
                class="form-control">{{old('direccion', $empleado->direccion ?? '')}}</textarea>
            </div>
        </div>


        <br>

        <!--botones-->
        <a class="btn btn-primary" href="/empleado"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
        <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>

                

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


        #IcNewEmp{
        font-size:25px;
        width: 1em;
        height: 1em;
    }

       
    </style>    


@endsection   