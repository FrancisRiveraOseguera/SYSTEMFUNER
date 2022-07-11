@extends('madre')
@section ('title' , 'Servicios Funerarios')

@section('content')

<div class="formato">

  <div class="xd">
    <h3> Listado de servicios funerarios</h3>

    <div>
      <br>
    @can('Nuevo_servicio')
    <a class="btn btn-info btn block  "  href="{{route('Servicio.nuevo')}}"><i class="bi bi-plus-circle"></i>Nuevo servicio</a>
    @endcan
    </div>
  </div>
    <hr>

    <!--Barra de búsqueda-->
    <form action="{{route('Servicio.lista')}}" method="GET" class="x"  autocomplete="off" >
     <div class="input-group input-group-sm">
          <a type="button" href="{{route('Servicio.lista')}}" class="btn btn-secondary btn-sm">Limpiar</a>
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
<div class="formato !important">
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
        <td>{{number_format($Servicio->cuota,2)}}</td>
        <td>{{number_format($Servicio->precio,2)}}</td>
        <td style="text-align: center;">
         @can('Detalles_servicios')
         <a class="btn btn-info" href="{{route('Servicio.ver', ['id'=>$Servicio->id])}}"><i class="bi bi-eye"></i>Detalles</a>
         @endcan
        <td style="text-align: center;">
          @can('Editar_servicio')
          <a class="btn btn-success" href="{{route('Servicio.editar', ['id'=>$Servicio->id])}}"> <i class="bi bi-pencil-square"></i>Editar </a>
          @endcan
        </td>
        <td style="text-align: center;">
            <!-- Button trigger modal-->
            <a class="btn btn-warning" data-toggle="modal" data-target="#modalPush{{$Servicio->id}}">
                <i class="fas fa-donate"></i>Ventas del servicio
            </a>

            <!--Modal: modalPush-->
            <div class="modal fade" tabindex="1" id="modalPush{{$Servicio->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-notify modal-info" role="document">
                    <!--Content-->
                    <div class="modal-content text-center">
                        <!--Header-->
                        <div class="modal-header d-flex justify-content-center">
                            <p class="heading"><i class="fas fa-hand-holding-usd"></i>Ventas del servicio</p>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <p>Seleccione el tipo de venta que desea ver para este servicio</p>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer flex-center">
                            <a href="{{route('tipoServicio.index', ['id'=>$Servicio->id])}}" class="modal-footer btn-primary">Ventas al contado</a>
                            <a href="{{route('ventasCreditoDelServicio', ['id'=>$Servicio->id])}}" class="modal-footer btn-primary">Ventas al crédito</a>
                            <a href="{{route('Servicio.lista')}}" class="modal-footer btn-danger ml-5">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
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
@endsection