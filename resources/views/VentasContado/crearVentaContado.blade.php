@extends('madre')
<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM clientes");
    $query2=mysqli_query($mysqli,"SELECT servicio_id, tipo FROM cantidad_inventario");
    $query3=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM empleados WHERE estado = 1");


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

            <hr>
        @can('Nuevo_cliente')
        <a class="btn btn-info btn block" style="position:relative; float:right; margin: top 20em; " href="{{route('cliente.nuevo',['cliente'=>0])}}">
            <i class="bi bi-plus-circle"></i>Nuevo cliente</a>
        @endcan

        @can('Listado_ventas')
        <a class="btn btn-link " href="{{route('ventas.index')}}" >
            <i class="bi bi-box-arrow-left"></i>Ir al inicio de Ventas </a>
        @endcan

                <div>
                 </div>
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
        <label class="form-label" for="cliente_id">Nombre del cliente que adquirirá la póliza de servicio funerario:</label>
        <div>
         <select name="cliente_id" style="width: 500px;" class=" form-control">
            @if (isset($ident))
                <option style="display: none" value="{{$ident->id}}">{{$ident->nombres}} {{$ident->apellidos}}</option>
            @else
                <option value="0">Para seleccionar escribe las primeras letras del nombre del cliente. </option>
            @endif
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
        <label class="form-label" for="empleado_id">Nombre del empleado responsable:</label>
        <div>
         <select name="empleado_id" style="width: 500px;" class=" form-control">

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
        <label  class="form-label" for="servicio_id">Tipo de póliza de servicio funerario:</label>
        <div>
        <select  name="servicio_id" style="width: 500px;" class="  form-control " charset="utf8_decode" >

        <option disabled selected value="0">Selecciona el tipo de servicio</option>
                    <?php

                        while($datos = mysqli_fetch_array($query2))
                        {?>
                            <option value="<?php echo $datos['servicio_id']?>"> <?php echo $datos['tipo' ]?> </option>
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
            <label for="cantidad_v" class="form-label">Cantidad comprada:</label>
            <div class="col-sm-15">
            <input type="text" placeholder="Ingresa la cantidad a comprar" maxlength="2"
                id="cantidad_v" name="cantidad_v" class="form-control" style="float:left;"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('cantidad_v', $contadoVenta->cantidad_v ?? '')}}"/>
            </div>
        </div>
</div>



<div class="collapse" id="collapseform">

</div>

    <div class="row mb-4">
    <div class="col">
    <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-outline">
            <label for="fecha" class="form-label">
                Fecha: </label>
            <div class="col-sm-13">
                    <input type="date"   name="fecha" id="fecha" class="form-control" style="width:500px;"
                    value="<?php echo date('Y-m-d',strtotime($fecha_actual))?>{{($contadoVenta->fecha ?? '')}}"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>"
                    min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
            </div>
            </div>

    </div>

    <div class="col">

    </div>
    </div>

    <!--Contenedor para los botones de la vista agregar servicio-->
    <div>
        <a class="btn btn-primary " href="{{route('listadoVentas.index')}}"> <i class="bi bi-box-arrow-left"></i>Ir al listado de ventas al contado</a>

        <td>
            <!--Modal: modalPush-->
            <a class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#modalPush"><i class="bi bi-save"></i>Guardar Venta</a>
            <div class="modal fade" tabindex="1" id="modalPush" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <p>Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria ubicado en la parte superior izquierda.</p>
                    </div>
                    <!--Footer-->
                        <div class="modal-footer flex-center">
                            <button type="close" class="modal-footer btn-info">¡Entendido!</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </div>
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

   .servfun{
       font-style: bold;
       font-family: 'Times New Roman', Times, serif;
   }
   .modal-header{
        font-size: 20px;
        background-color: #1CB6E9;
        color: #FFFFFF;
    }
    .modal-body{
        font-size: 15px;
    }
    .modal-footer{
        font-size: 15px;
    }
   </style>
@endsection

