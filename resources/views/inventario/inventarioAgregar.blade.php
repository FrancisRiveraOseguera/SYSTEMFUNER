<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, tipo FROM servicios");
    

    if(isset($_POST['servicio_id']))
    {
        $servicio_id=$_POST['servicio_id'];
        echo $servicio_id;
    }


?>

@extends('madre')

@section ('title' , 'Agregar a inventario')

@section('content')

    <div class="emple">
    <h3>Agregar a inventario</h3>
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
                <label for="servicio_id" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-card-list"></i>Número de producto</label>
            <div class="col-sm-8">
            <select name="servicio_id" style="width: 675px;" class=" form-control">
                      <option value="0">Selecciona el servicio a agregar a inventario. </option>
                        <?php 
                          while($datos = mysqli_fetch_array($query))
                        {?>     
                      <option value="<?php echo $datos['id']?>"> <?php echo $datos['tipo' ] ?> </option>
                        <?php
                        }?> 
           </select>
            </div>
            <script type="text/javascript">
             $(document).ready(function(){
             $('servicio_id').select2();
               });
           </script>
        </div>
        
        <div class="form-group row">
            <label for="responsable" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-person-lines-fill"></i>Responsable</label>
            <div class="col-sm-8"> 
            <select name="responsable" id="responsable"  class="form-control" value="{{old('responsable', $inventario->responsable ?? '')}}">
                    <option selected disabled value="none">Elige el responsable</option>
                    <option value="Carlos Rodriguez">Carlos Rodriguez</option> 
                    <option value="Francis Rivera">Francis Rivera</option> 
                    <option value="Eleana Cano">Eleana Cano</option> 
                    <option value="Cindy Salgado">Cindy Salgado</option>
                </select>     
            </div>
        </div>

        <?php $fecha_actual = date("d-m-Y");?>
        
        <div class="form-group row">
            <label for="fecha_ingreso" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp"class="bi bi-calendar-date"></i>Fecha de Ingreso</label>
            <div class="col-sm-8">
                    <input type="text" readonly name="fecha_ingreso" id="fecha_ingreso" class="form-control hijo" 
                    value="<?php echo date($fecha_actual)?>{{($inventario->fecha_ingreso ?? '')}}"/>
            </div>
        </div>
            
        <div class="form-group row">
            <label for="cantidad_aIngresar" class="col-lg-2 control-label offset-md-1 requerido"><i id="IcNewEmp" class="bi bi-clipboard-check"></i>Cantidad </label>
            <div class="col-sm-8">
            <input type="text" placeholder="Ingresa la cantidad a agregar al inventario." maxlength="3"
                id="cantidad_aIngresar" name="cantidad_aIngresar" class="form-control" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('cantidad_aIngresar', $inventario->cantidad_aIngresar ?? '')}}"/>
            </div>
        </div>

        <br>

        <!--botones-->
        <a class="btn btn-primary" href="{{route('historialinventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a> 
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

        .hijo{
            -moz-user-select: none;
            user-select: none;
        }


        #IcNewEmp{
        font-size:25px;
        width: 1em;
        height: 1em;
    }

       
    </style>    


@endsection   