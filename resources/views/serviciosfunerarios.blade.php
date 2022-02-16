@extends('madre')
@section ('title' , 'Servicios Funerarios');

@section('content')
<div class="servfun">

    <div> <h1 class="servfu"> Servicios funerarios </h1> <hr>
    <a class="btn btn-info" href="{{route('Servicio.nuevo')}}">
    <i class="bi bi-plus-circle"></i>Nuevo Servicio</a>
    <br> <br>
    </div>

    <!--Barra de búsqueda-->
    <div id="busqueda" class="d-md-flex justify-content-md-end ">
        <form class="busqueda" action="{{route('Servicio.lista')}}" method="GET">
             <div class="btn-group">
             <input class="form-control" type="search" name="busqueda"  placeholder="Buscar por tipo o categoría" >
             <button type="submit" class="btn btn-primary"  href="{{route('Servicio.lista')}}">
             <i class="bi bi-search"></i></button>
             <button type="submit" class="btn btn-secondary"  href='servicio' >
             <i class="bi bi-arrow-left-circle"></i></button>
            </div>
       </form>
    </div>

     <!--Mensaje de alerta para validacón-->
    @if(session('mensaje'))
    <div class= "alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif

    </div><br>

    <!--Creación de tabla de servicios funerarios-->
<div class="servfun !important">
  <table class="table ">
  <thead>
     <tr class="table-info ">
      <th scope="col">N°Servicio</th>
      <th scope="col">Tipo</th>
      <th scope="col">Precio</th>
      <th scope="col">Categoría</th>
      <th scope="col">Cuota</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>


  <tbody>
    @forelse($servicio as $Servicio)
    <tr class="table">
        <th scope="row">{{$Servicio-> id}}</th>
        <td>{{$Servicio->tipo}}</td>
        <td>{{$Servicio->precio}}</td>
        <td>{{$Servicio->categoria}}</td>
        <td>{{$Servicio->cuota}}</td>
        <td>
         <a class="btn btn-info" href="{{route('Servicio.ver', ['id'=>$Servicio->id])}}"><i class="bi bi-eye"></i>Detalles</a>
         <a class="btn btn-success" href="{{route('Servicio.editar', ['id'=>$Servicio->id])}}"> <i class="bi bi-pencil-square"></i>Editar </a>
         <a class="btn btn-warning" ><i class="bi bi-currency-dollar"></i>Vender </a>  </td>
    <!--formulario de borrado que se crea por cada elemnto borrado -->

    </tr>
    @empty
    <tr>
      <td colspan="3">
          No hay servicios
      </td>
    </tr>

    @endforelse

   </tbody>
   </table>
   <!--paginación de la tabla-->
   {{  $servicio->links() }}
</div>
<br><br>
<!--estilos-->
<style>

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

   .busqueda{
    position: absolute;
    top: 18%;
    right: 20px;
   }
</style>
@endsection
