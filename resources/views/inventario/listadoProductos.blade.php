@extends('madre')

@section ('title' , 'Productos en inventario')

@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de cantidades en inventario</h3>
            <br>
            @can('Listado_inventario')
            <a class="btn btn-primary btn block" href="{{route('historialinventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
            @endcan            
        </div>
<hr>
</div>
</div>    
<!--Creación de tabla-->

 <br>
 
 <div class="invent">
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

    <style>

    .invent {
    border-top: 1px solid #E6E6E6 ;
    border-left: 1px solid #E6E6E6 ;
    border-right: 1px solid #E6E6E6;
    border-bottom: 1px solid #E6E6E6 ;
    padding: 20px;
    background-color: #E0F8F7;
    position:relative;
    }
    
    .invent{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .padre{
        padding-left: 470px
    }

    .hijo{
        padding-left: 20px;
    }

    .x{
    width:50%;
    float:right
    padding: 20px;
    position: absolute;
    top: 9%;
    right: 20px;}
    

    </style>
    
@endsection