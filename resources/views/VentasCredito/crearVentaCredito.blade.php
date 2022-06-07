@extends('madre')
<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM clientes");
    $query2=mysqli_query($mysqli,"SELECT id, tipo, cuota, prima, precio FROM servicios");
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

@section ('title' , ' Venta al Crédito')

@section('content')
<!--Contenedor para el título de la vista y los mensajes de error-->
<div class="servfun">
        <h3 class="servfu" >Nueva Venta al Crédito</h3>

            <hr>
            <acronym title="Haz click para agregar un cliente nuevo desde aquí.">
            <a class="btn btn-info btn block" style="position:relative; float:right; margin: top 20em; " href="{{route('cliente.nuevo',['cliente'=>-1])}}">
            <i class="bi bi-plus-circle"></i>Nuevo cliente</a>
            </acronym>

        <a class="btn btn-link " href="{{route('ventas.index')}}" >
                <i class="bi bi-box-arrow-left"></i>Ir al inicio de Ventas </a>

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
         <select name="empleado_id" style="width: 500px;" class=" form-control" >

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
          <select id="servicioseleccionado" name="servicio_id" style="width: 1025px;" class="  form-control " charset="utf8_decode" >
            <option disabled selected value="0">Selecciona el tipo de servicio</option>
                    <?php

                        while($datos = mysqli_fetch_array($query2))
                        {?>
                            <option id="obtenido" value="<?php echo $datos['id']?>">

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Precio:
                            <?php echo $datos['precio' ]?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Prima:
                            <?php echo $datos['prima' ]?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Cuota:
                            <?php echo $datos['cuota' ]?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Tipo:
                            <?php echo $datos['tipo' ]?>
                            </option>
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


</div>
<br>
<p><i style="color: #bda914 ;" class="bi bi-exclamation-triangle"></i>Se otorga los beneficios de la póliza a las personas que también <b>responderán con el pago</b>  en caso de la
    defunción del contratante, ellos son:
</p>
<br>

<div class="row mb-4">
    <div class="col">
           <label class=" form-label" for="beneficiario1">Beneficiario N°1:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="beneficiario1" id="beneficiario1"  maxlength = "50" placeholder="Nombre y apellido del primer beneficiario." class="form-control"
                value="{{old('beneficiario1', $creditoVenta->beneficiario1 ?? '')}}"/>
    </div>

    <div class="col">
           <label class=" form-label" for="telefono1">Teléfono:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="telefono1" id="telefono1"  maxlength = "8" placeholder="Teléfono del beneficiario." class="form-control"
                value="{{old('telefono1', $creditoVenta->telefono1 ?? '')}}"/>
    </div>
</div>
<div class="row mb-4">
      <div class="col">
           <label class=" form-label" for="beneficiario2">Beneficiario N°2:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="beneficiario2" id="beneficiario2"  maxlength = "50" placeholder="Nombre y apellido del segundo beneficiario." class="form-control"
                value="{{old('beneficiario2', $creditoVenta->beneficiario2 ?? '')}}"/>
       </div>

       <div class="col">
           <label class=" form-label" for="telefono2">Teléfono:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="telefono2" id="telefono2"  maxlength = "8" placeholder="Teléfono del beneficiario." class="form-control"
                value="{{old('telefono2', $creditoVenta->telefono2 ?? '')}}"/>
        </div>
  </div>

  <acronym title="Para agregar haz click, para ocultar haz click nuevamente." >
  <a class="checkbox" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
  <i class="bi bi-person-plus"></i> Agregar más beneficiarios.
  </a>
  </acronym>
<div class="collapse" id="collapseExample">
<div class="row mb-4">
    <div class="col">
        <br>
           <label class=" form-label" for="beneficiario3">Beneficiario N°3:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="beneficiario3" id="beneficiario3"  maxlength = "50" placeholder="Nombre y apellido del tercer beneficiario." class="form-control"
                value="{{old('beneficiario3', $creditoVenta->beneficiario3 ?? '')}}"/>
    </div>

    <div class="col">
        <br>
          <label class=" form-label" for="telefono3">Teléfono:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="telefono3" id="telefono3"  maxlength = "8" placeholder="Teléfono del beneficiario." class="form-control"
                value="{{old('telefono3', $creditoVenta->telefono3 ?? '')}}"/>
    </div>
</div>


<div class="row mb-4">
    <div class="col">
           <label class=" form-label" for="beneficiario4">Beneficiario N°4:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="beneficiario4" id="beneficiario4"  maxlength = "50" placeholder="Nombre y apellido del cuarto beneficiario." class="form-control"
                value="{{old('beneficiario4', $creditoVenta->beneficiario4 ?? '')}}"/>
    </div>
    <div class="col">
       <div class="form-outline">
           <label class=" form-label" for="telefono4">Teléfono:</label>
           <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="telefono4" id="telefono4"  maxlength = "8" placeholder="Teléfono del beneficiario." class="form-control"
                value="{{old('telefono4', $creditoVenta->telefono4 ?? '')}}"/>
         </div>
     </div>
</div>
</div>

<div class="row mb-4">
  <div class="col">
    <div class="form-outline">

        <br>
            <label for="fechaCobro" class="form-label">
                Cobro:</label>
            <div class="col-sm-13">
                <input readonly type="text" style="width: 500px;" name="fechaCobro" id="fechaCobro" class="form-control"
                value="Mensual"/>
            </div>
        </div>
    </div>

    <div class="col">
    <?php $fecha_actual = date("d-m-Y");?>

        <div class="form-outline">
            <br>
            <label for="fecha" class="form-label">Fecha de venta</label>
            <div class="col-sm-13">
                    <input type="date"  name="fecha" id="fecha" class="form-control" style="width:490px;"
                    value="<?php echo date($fecha_actual)?>{{($creditoVenta->fecha ?? '')}}"/>
            </div>
        </div>
    </div>
</div>
    <!--Contenedor para los botones de la vista agregar servicio-->
    <div>
        <a class="btn btn-primary " href="{{route('ventasCredito.index')}}"> <i class="bi bi-box-arrow-left"></i>Ir al listado de ventas al crédito</a>

        <td>
            <!--Modal: modalPush-->
            <a class="btn btn-success"  style="color: white;" data-toggle="modal" data-target="#modalPush"><i class="bi bi-save"></i>Guardar venta al Crédito</a>
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
                            <button type="close"  class="modal-footer btn-primary">¡Entendido!</button>
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
