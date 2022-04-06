@extends('madre')

@section ('title' , 'Nuevo pago')

@section('content')

<!--Contenedor para el título de la vista y los mensajes de error-->
<div class="servfun">
    <h3 class="servfu" > Agregar nuevo pago</h3>
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
      <label class="form-label" for="tipo">Tipo de servicio</label>
      <input type="text" id="tipo" class="form-control"  name="tipo" value="{{$venta->servicios->tipo}} " readonly/>
    </div>
  </div>


<div class="col">
  <div class="form-outline">
    <label class="form-label" for="tipo">Cliente</label>
    <input type="text" id="cliente" class="form-control"  name="cliente" value="{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}" readonly/>
  </div>
</div>
</div>

<div class="row mb-4">
<div class="col">
    <div class="form-outline">
      <label class="form-label" for="tipo">Fecha</label>
      <input type="text" id="cliente" class="form-control"  name="cliente" value="{{date('d/m/Y')}}" readonly/>
    </div>
  </div>

  <div class="col">
    <div class="form-outline">
      <label class="form-label" for="tipo">Total de cuotas</label>
      <input type="text" id="cliente" class="form-control"  name="cliente" value="{{number_format($venta->servicios->prima+$venta->cuota,2)}}" readonly/>
    </div>
  </div>
</div>

    
    
<div class="row mb-4">
  <div class="col">
      <div class="form-outline">
        <label class="form-label" for="tipo">Saldo pendiente</label>
        <input type="text" id="cliente" class="form-control"  name="cliente" value="{{number_format($venta->servicios->precio - $venta->servicios->prima - $venta->cuota,2)}}" readonly/>
      </div>
  </div>

  
    <div class="col">
        <div class="form-outline">
          <label class="form-label" for="tipo">Cuota</label>
          <input type="text" id="cliente" class="form-control"  name="cliente" value="{{number_format($venta->servicios->cuota, 2)}}" readonly/>
        </div>
    </div>
  </div>

  <div class="row mb-4">
  <div class="col">
    <div class="form-outline">
      <label class="form-label" for="tipo">Cantidad a pagar</label>
      <input type="text" id="pago" class="form-control"  name="pago" placeholder="0.00" />
    </div>
  </div>

 
<div class="col">

</div>
</div>

<!--Contenedor para los botones de la vista agregar nuevo pago-->
  <div  >
  <a class="btn btn-primary " href="{{route('ventasCredito.index')}}" > <i class="bi bi-box-arrow-left"></i> Regresar</a>
 
  <td>          
            <!--Modal: modalPush-->
            <a class="btn btn-success"  style="color: white;" data-toggle="modal" data-target="#modalPush"><i class="bi bi-save"></i>Guardar pago</a>
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
                            <p>Para exportar a PDF e imprimir el recibo haz clíck en el logo de la funeraria ubicado en la parte superior izquierda.</p>
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

<br>
</form>
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