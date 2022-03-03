@extends('madre')

@section ('title' , 'Productos en inventario')

@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de productos en inventario.</h3>
            <br>
            <div class="col-lg-3 hijo">
                 <a class="btn btn-primary btn block" href="{{route('historialinventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
            </div>
    </div>

<!--Barra de búsqueda-->

<hr>
</div>
     
<!--Creación de tabla-->

 <br>
 <table class="table ">
  <thead>
    <tr class="table-success"  style="width: 1020px;">
      <th scope="col">Código</th>
      <th scope="col"style=" width: 175px;">Tipo</th>
      <th scope="col"style="text-align: center;  width: 300px;">Categoría</th>
      <th scope="col" style="text-align: right; width: 120px;">Precio</th>
      <th scope="col" style="text-align: right; width: 120px;">Cantidad </th>
      <th scope="col" style="text-align: right; width: 160px;">Costo Total</th>
      
      
    </tr>
  </thead>
  <tbody>     
  @foreach($inventario as $producto)
    
    <tr class="table-info"> 
      <td>{{$producto->servicio_id}}</td>
      <td style="">{{$producto->tipo}}</td>
      <td style="text-align: center">{{$producto->categoria}}</td>
      <td style="text-align: right">{{$producto->precio}}</td>
      <td style="color:#d94d2f; text-align: right">{{$producto->cantidad}}</td>
      <td style="color:#2d812f; text-align: right">{{$producto->precio*$producto->cantidad}}</td>
      
 @endforeach 
      
  </tbody>
</table>


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