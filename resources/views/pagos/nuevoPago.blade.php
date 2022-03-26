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
    <label class="form-label" for="tipo">cliente</label>
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
        <label class="form-label" for="tipo">Cantidad a pagar</label>
        <input type="number" id="pago" class="form-control"  name="pago" placeholder="0.00" />
      </div>
    </div>
  </div>
    
</div>



<!--Contenedor para los botones de la vista agregar servicio-->
  <div  >
  <a class="btn btn-primary " href="{{route('ventasCredito.index')}}" > <i class="bi bi-box-arrow-left"></i> Regresar</a>
 
   <button type="submit" class="btn btn-success" ><i class="bi bi-save"></i>Guardar</button>
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

</style>

@endsection