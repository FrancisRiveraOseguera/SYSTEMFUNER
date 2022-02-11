@extends('madre');
@section ('title' , 'Nuevo servicio');

@section('content')

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

<!--Contenedor para el título de la vista y los mensajes de error-->
<div class="servfun">
        <h1 class="servfu" > Agregar Nuevo Servicio</h1>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger" >
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
<form method="post">
  @csrf 
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="type"><i id="IcNewServ" class="bi bi-archive"></i>Tipo de servicio</label>
        <input type="text" id="type" class="form-control"  name="type" 
        placeholder= "Ingresa el tipo de servicio"  value="{{old('type')}}"/>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
          <label class=" form-label" for="price"><i id="IcNewServ" class="bi bi-cash-coin"></i>Precio del servicio</label>
        <input type="text" id="price" class="form-control"  name="price" 
        placeholder= "Ingresa el Precio de servicio" value="{{old('price')}}"/>
      </div>
    </div>
    </div>

    <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="cuota"><i id="IcNewServ" class="bi bi-currency-dollar"></i>Cuota</label>
        <input type="text" id="cuota" class="form-control"  name="cuota" 
        placeholder= "Ingresa la cuota"  value="{{old('cuota')}}"/>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
          <label class=" form-label" for="prima"><i id="IcNewServ" class="bi bi-coin"></i>Prima del servicio</label>
        <input type="text" id="prima" class="form-control"  name="prima" 
        placeholder= "Ingresa la prima del servicio" value="{{old('prima')}}"/>
      </div>
    </div>
    </div>

  <div class="row mb-4">
<div class="col">
      <div class="form-outline">
        <label class="form-label" for="description"><i id="IcNewServ" class="bi bi-pencil-square"></i>Descripción</label>
        <br>
        <textarea  name="description"  id="description"
        placeholder="Ingresa la descripción del servicio" cols="52" rows="1" ></textarea>

      </div>
    </div>
  

  <div class="col">
      <div class="form-outline">
        <label class="form-label" for="category"><i  id="IcNewServ" class="bi bi-list-stars"></i>Categoría</label>  
        <br>
        <select name="category" id="category"style=background:white  >
       <option selected value="0"> Elige la categoría del nuevo servicio </option>
       <option value="Adultos">Adultos</option> 
       <option value="Juvenil">Juvenil</option> 
       <option value="Infantil">Infantil</option> 
       </select> 
      </div>
      </div>
  </div>

    
  
    <!--Contenedor para los botones-->
      <div  >

       <button type="submit" class="btn btn-success"  href="{{route('Servicio.lista')}}" >Agregar Servicio</button>
       <a class="btn btn-danger " href="{{route('Servicio.lista')}}" > <i class="bi bi-x-octagon"></i> Cancelar</a>
     </div>
  
    <br>
  </div>
  
@endsection