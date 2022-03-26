@extends('madre')
<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT id, nombres, apellidos FROM clientes");
    $query2=mysqli_query($mysqli,"SELECT id, tipo FROM servicios");
    
   
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

?>

@section ('title' , ' Venta al Crédito')

@section('content')
<!--Contenedor para el título de la vista y los mensajes de error-->
<div class="servfun">
        <h3 class="servfu" >Nueva Venta al Crédito</h3>
        
            <hr>
            <acronym title="Haz click para agregar un cliente nuevo desde aquí.">
            <a class="btn btn-info btn block" style="position:relative; float:right; margin: top 20em; ">
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
          <label class=" form-label" for="responsable">Empleado responsable de la venta de la póliza:</label>
          <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                type = "text"
                name="responsable" id="responsable"  maxlength = "50" placeholder="Nombre y apellido del responsable de la venta." class="form-control" 
                value="{{old('responsable', $contadoVenta->responsable ?? '')}}"/> 
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
                Fecha de venta:</label>
            
                <input type="date" style="width: 495px;" name="fecha" id="fecha" class="form-control"
                value="{{old('fecha', $contadoVenta->fecha ?? '')}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"/>
            
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
        <?php $fecha_actual = date("d-m-Y");?>
        <br>
            <label for="fechaCobro" class="form-label">
                Fecha de cobro:</label>
            <div class="col-sm-13">
                <input type="date" style="width: 500px;" name="fechaCobro" id="fechaCobro" class="form-control"
                value="{{old('fechaCobro', $contadoVenta->fechaCobro ?? '')}}"
                min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 0 day"));?>"
                max="<?php echo date('Y-m-d',strtotime($fecha_actual." 10 year"));?>"/>
            </div>
        </div>
    </div>  

    <div class="col">
        
    </div>
</div> 
    <!--Contenedor para los botones de la vista agregar servicio-->
    
    <div  >
      <a class="btn btn-primary " href="" > <i class="bi bi-box-arrow-left"></i> Ir al listado de ventas al crédito</a>

       <button type="submit" class="btn btn-success"  href="" ><i class="bi bi-save"></i>Guardar Venta al Crédito</button>
       </div>

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