@extends('madre')
@section ('title' , 'Servicios Funerarios')

@section('content')

<div class="serv">

  <div class="xd">
    <h3> Listado de servicios funerarios</h3> 
    
    <div>
      <br>
    <a class="btn btn-info btn block  "  href="{{route('Servicio.nuevo')}}"><i class="bi bi-plus-circle"></i>Nuevo servicio</a>
    </div>
  </div>

  
              <hr>
               <form action="{{route('Servicio.lista')}}" method="GET" class="x"  autocomplete="off" >
                 <div class="input-group input-group-sm">
                      <a type="button" href="{{route('Servicio.lista')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i></a>
                      <input type="search" class="col-sm-9" name="busqueda"
                       placeholder="Ingrese la categoría o el tipo  para realizar la búsqueda." value="{{$busqueda}}">

                          <div class="input-group-append">
                             <button type="submit" class="btn btn-primary">Buscar</button>    
                          </div>
                          
                   </div>
               </form> 

               
                


    
     <!--Mensaje de alerta para validacón-->
    @if(session('mensaje'))
    <div class= "alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif
</div>
<br>

    <!--Creación de tabla de servicios funerarios-->
<div class="servfun !important">
  <table class="table ">
  <thead>
     <tr class="table-info ">
      <th scope="col">N° Servicio</th>
      <th scope="col">Tipo de servicio</th>
      <th scope="col">Categoría</th>
      <th scope="col">Cuota</th>
      <th scope="col" >Precio</th>
      <th scope="col" style="text-align: center;">Detalles</th>
      <th scope="col" style="text-align: center;">Editar</th>
      <th scope="col" style="text-align: center;">Ventas</th>
    </tr>
  </thead>


  <tbody>
    @forelse($servicio as $Servicio)
    <tr class="table-primary">
        <th scope="row">{{$Servicio-> id}}</th>
        <td>{{$Servicio->tipo}}</td>
        <td>{{$Servicio->categoria}}</td>
        <td>{{$Servicio->cuota}}</td>
        <td>{{$Servicio->precio}}</td>
        <td style="text-align: center;">
         <a class="btn btn-info" href="{{route('Servicio.ver', ['id'=>$Servicio->id])}}"><i class="bi bi-eye"></i>Detalles</a>
        <td style="text-align: center;">
          <a class="btn btn-success" href="{{route('Servicio.editar', ['id'=>$Servicio->id])}}"> <i class="bi bi-pencil-square"></i>Editar </a></td> 
        <td style="text-align: center;">
          <a class="btn btn-warning " href="{{route('tipoServicio.index', ['id'=>$Servicio->id])}}"> <i class="fas fa-donate"></i>Ventas del servicio</a>
    <!--formulario de borrado que se crea por cada elemnto borrado -->

    </tr>
    @empty
    <tr>
      <td colspan="3">
          No hay servicios agregados
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

  .xd{
    width:50%;
  }
  .x{
    width:50%;
    float:right
    padding: 20px;
    position: absolute;
    top: 20%;
    right: 20px;
    
  }

    .serv {
  
  border-top: 1px solid #E6E6E6 ;
  border-left: 1px solid #E6E6E6 ;
  border-right: 1px solid #E6E6E6;
  border-bottom: 1px solid #E6E6E6 ;
  padding: 20px;
  background-color: #E0F8F7;
  position:relative;
   }

   .serv{
       font-style: bold;
       font-family: 'Times New Roman', Times, serif;
   }

</style>
@endsection
