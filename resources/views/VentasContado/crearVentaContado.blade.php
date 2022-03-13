@extends('madre')
<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM clientes");
    $query2=mysqli_query($mysqli,"SELECT id, tipo FROM servicios");
    $query3=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM empleados");
   
    if(isset($_POST['cliente_id']))
    {
        $cliente_id=$_POST['cliente_id'];
        echo $cliente_id;
    }

    if(isset($_POST['servicio_id']))
    {
        $servicio_id=$_POST['servicio_id'];
        echo $servicio_id;
    }

    if(isset($_POST['empleado_id']))
    {
        $empleado_id=$_POST['empleado_id'];
        echo $empleado_id;
    }
?>
@section ('title' , ' Venta al Contado')

@section('content')
<!--Contenedor para el título de la vista y los mensajes de error-->
<div class="servfun">
        <h3 class="servfu" >Nueva Venta al Contado</h3>
        
            <a class="btn btn-info btn block" href="{{route('cliente.nuevo')}}">
            <i class="bi bi-plus-circle"></i>Nuevo cliente</a>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>El formulario contiene errores.</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     @endforeach
                </ul>
            </div> 
        @endif
</div><br>
<!--Formulario-->
<div class="servfun"> 
<form method="post"  autocomplete="off">
  @csrf 
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="cliente_id">Nombre del Cliente que adquirirá la póliza de servicio funerario:</label>
        <div>
         <select name="cliente_id" style="width: 500px;" class=" form-control">
                      <option value="0">Para seleccionar escribe las primeras letras del nombre del cliente. </option>
                        <?php 
                          while($datos = mysqli_fetch_array($query))
                        {?>     
                      <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombres' ].' '.$datos['apellidos' ]?> </option>
                        <?php
                        }?> 
           </select>
      </div>
          <script src='../../js/select2.min.js'></script>
          <script type="text/javascript">
             $(document).ready(function(){
             $('cliente_id').select2();
               });
           </script>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
          <label class=" form-label" for="empleado_id"></i>Empleado responsable de la venta de la póliza:</label>
          <div>
          <select name="empleado_id" style="width: 490px;" class=" form-control">
                      <option value="0">Para seleccionar escribe las primeras letras del nombre del empleado. </option>
                    <?php 
                        while($datos = mysqli_fetch_array($query3))
                        {?>       
                            <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombres' ].' '.$datos['apellidos' ]?> </option>
                    <?php
                        }?> 
            </select>
          </div>
          <script src='../../js/select2.min.js'></script>
      <script type="text/javascript">
        $(document).ready(function(){
            $('empleado_id').select2();
        });
      </script>
    </div>
    </div>
    </div>

    <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="servicio_id">Póliza de servicio funerario tipo:</label>
        <div>
        <select name="servicio_id" style="width: 500px;" class=" form-control" >
                      <option value="0">Selecciona el tipo de servicio:</option>
                    <?php 
                    
                        while($datos = mysqli_fetch_array($query2))
                        {?>      
                            <option value="<?php echo $datos['id']?>"> <?php echo $datos['tipo' ]?> </option>
                    <?php
                        }
                    ?> 
          </select>
        </div>
        <script src='../../js/select2.min.js'></script>
      <script type="text/javascript">
        $(document).ready(function(){
            $('servicio_id').select2();
        });
      </script>
      </div>
    </div>

    <div class="col">
    <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-outline">
            <label for="fecha" class="form-label">
                Fecha </label>
            <div class="col-sm-13">
                <input type="date" name="fecha" id="fecha" class="form-control"
                value="{{old('fecha', $contadoVenta->fecha ?? '')}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 2 day"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
            </div>
        </div>

    </div>
    </div>
    
  
    <!--Contenedor para los botones de la vista agregar servicio-->
      <div  >
      <a class="btn btn-primary " href="{{route('listadoVentas.index')}}" > <i class="bi bi-box-arrow-left"></i> Regresar</a>
     
       <button type="submit" class="btn btn-success"  href="{{route('listadoVentas.index')}}" ><i class="bi bi-save"></i>Guardar Venta</button>
       </div>
  
    <br>
    <br>
  </div>
  <style>
    #IcNewServ{
        font-size:30px;
        width: 1em;
        height: 1em;
    }
    .servfun {
  border-top: 1px solid #E6E6E6 ;
  border-left: 1px solid #E6E6E6 ;
  border-right: 1px solid #E6E6E6;
  border-bottom: 1px solid #E6E6E6 ;
  padding: 20px;
  background-color: #E0F8F7;
  position:relative;
   }

   .servfu{
       font-style: bold;
       font-family: 'Times New Roman', Times, serif;
   }
   </style>
@endsection