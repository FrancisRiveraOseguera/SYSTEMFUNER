@extends('madre')
@section ('title' , 'Listado de ventas al contado del servicio')
@section('content')

<div class="formato">
    <div class="row">
        <div class="col-lg-10">
            <h3>Listado de ventas al contado del servicio <b>{{$servicio->tipo}}</b></h3>
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
        <th scope="col">Precio unitario</th>
        <th scope="col">Costo Total</th>
    </tr>
    </thead>
    <tbody>
    @forelse($ventas as $vent)
    
    <tr class="table-primary">
        <td>{{date_format($vent->created_at,"d-m-Y")}}</td>
        <td>{{$vent->clientes->nombres}} {{$vent->clientes->apellidos}}</td>
        <td>{{$vent->empleados->nombres}} {{$vent->empleados->apellidos}}</td>
        <td>{{$vent->servicios->tipo}}</td>
        <td>{{$vent->cantidad_v}}</td>
        <td>{{number_format($vent->servicios->precio,2)}}</td>
          <td class="text-success">{{number_format($vent->cantidad_v * $vent->servicios->precio,2)}}</td>
    </tr>

    @empty
    <tr>
        <th colspan="5">No se encontraron resultados</th>
    </tr>
    @endforelse
</tbody>
</table>
{{$ventas->links()}}
</div>
@endsection
