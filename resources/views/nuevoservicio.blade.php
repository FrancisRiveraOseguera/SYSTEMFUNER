@extends('madre')
@section ('title' , 'Nuevo servicio')

@section('content')
<!--Contenedor para el título de la vista y los mensajes de error-->
<div class="servfun">
        <h3 class="servfu" > Agregar nuevo servicio</h3>
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
        <label class="form-label" for="tipo"><i id="IcNewServ" class="bi bi-archive"></i>Tipo de servicio</label>
        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
        type="text" maxlength = "25" id="tipo" class="form-control"  name="tipo" 
        placeholder= "Ingresa el tipo de servicio"  value="{{old('tipo', $servicio->tipo ?? '')}}"/>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
          <label class=" form-label" for="precio"><i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio</label>
        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
        type="float" maxlength = "8" id="precio" class="form-control"  name="precio" 
        placeholder= "Ingresa el precio del servicio" value="{{old('precio', $servicio->precio?? '')}}" />
      </div>
    </div>
    </div>

    <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="cuota"><i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota</label>
        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
        type="float" maxlength = "4" id="cuota" class="form-control"  name="cuota" 
        placeholder= "Ingresa la cuota"  value="{{old('cuota', $servicio->cuota?? '')}}"/>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
          <label class=" form-label" for="prima"><i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio</label>
        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
        type="float" maxlength = "5" id="prima" class="form-control"  name="prima" 
        placeholder= "Ingresa la prima del servicio" value="{{old('prima', $servicio->prima ?? '')}}"/>
      </div>
    </div>
    </div>

  <div class="row mb-4">
<div class="col">
      <div class="form-outline">
        <label class="form-label" for="detalles"><i id="IcNewServ" class="bi bi-pencil-square"></i>Detalles del servicio</label>
        <br>
        <textarea  name="detalles"  id="detalles" maxlength="300" 
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        placeholder="Ingresa los detalles del servicio" cols="52" rows="1" ></textarea>

      </div>
    </div>
  
  <div class="col">
      <div class="form-outline">
        <label class="form-label" for="categoria"><i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría</label>  
        <br>
        <select name="categoria" id="categoria"style=background:white  >
       <option selected value="0" > Elige la categoría del nuevo servicio </option>
       <option value="Adultos">Adultos</option> 
       <option value="Juvenil">Juvenil</option> 
       <option value="Infantil">Infantil</option> 
       </select> 
      </div>
      </div>
  </div>
  
    <!--Contenedor para los botones de la vista agregar servicio-->
      <div  >
      <a class="btn btn-primary " href="{{route('Servicio.lista')}}" > <i class="bi bi-box-arrow-left"></i> Regresar</a>
     
       <button type="submit" class="btn btn-success"  href="{{route('Servicio.lista')}}" ><i class="bi bi-save"></i>Guardar</button>
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

   .servfu{
       font-style: bold;
       font-family: 'Times New Roman', Times, serif;
   }

   </style>

@endsection