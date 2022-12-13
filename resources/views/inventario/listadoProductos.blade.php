@extends('madre')
@section ('title' , 'Productos en inventario')

@section('content')
<div class="formato">
    <div>
        <h3>Listado de cantidades en inventario</h3>
    </div>
    <br>

    <div class="w-100 d-inline-flex">
        <div class="col-sm-5 d-inline-flex">
            @can('Listado_inventario')
                <a class="btn btn-primary btn block" href="{{route('historialinventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
            @endcan
        </div>
    </div>
</div>

<!--Creación de tabla-->
 <br>
 <div class="formato">
    <table class="table ">
        <thead>
        <tr class="table-info"  style="width: 1020px;">
          <th scope="col">N° Producto</th>
          <th scope="col"style=" width: 175px;">Tipo</th>
          <th scope="col"style="text-align: center;  width: 300px;">Categoría</th>
          <th scope="col" style="text-align: center; width: 100px;">Precio</th>
          <th scope="col" style="text-align: right; width: 140px;">Cantidad </th>
          <th scope="col" style="text-align: right; width: 140px;">Costo Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inventario as $producto)
        <tr class="table-primary">
          <td>{{$producto->servicio_id}}</td>
          <td style="">{{$producto->tipo}}</td>
          <td style="text-align: center">{{$producto->categoria}}</td>
          <td style="text-align: right">{{number_format($producto->precio,2)}}</td>
          <td style="color:#0489B1; text-align: right;">{{$producto->cantidad}}</td>
          <td style="color:#2d812f; text-align: right"> {{number_format($producto->precio*$producto->cantidad,2)}}</td>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
