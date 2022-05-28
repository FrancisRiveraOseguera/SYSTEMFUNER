@extends('madre')
@section ('title' , 'Listado de ventas al contado del servicio')
@section('content')

<div class="formato">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de ventas al contado del servicio</h3>
            <br>
             <a class="btn btn-primary btn block" href="{{route('Servicio.lista')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
        </div>
        <hr>
    </div>
</div>
<br>

<!--Creación de tabla-->
 <div class="formato">
 <table class="table">
  <thead>
    <tr class="table-info"  style="width: 1020px;">
        <th scope="col">Fecha</th>
        <th scope="col">Cliente</th>
        <th scope="col">Empleado</th>
        <th scope="col">Tipo de servicio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Costo Total</th>
    </tr>
  </thead>
    <tbody>
      @forelse($ventas as $vent)
      @foreach ($vent->contadoventas as $item)
      <tr class="table-primary">
          <td>{{date_format($item->created_at,"d-m-Y")}}</td>
          <td>{{$item->clientes->nombres}} {{$item->clientes->apellidos}}</td>
          <td>{{$item->responsable}}</td>
          <td>{{$vent->tipo}}</td>
          <td>{{$item->cantidad_v}}</td>
          <td>{{$vent->precio}}</td>
          <td>{{$item->cantidad_v * $item->servicios->precio}}</td>
      </tr>
    @endforeach

    @empty
    <tr>
        <th colspan="5">No se encontraron resultados</th>
    </tr>
    @endforelse
</tbody>
</table>
</div>
@endsection
