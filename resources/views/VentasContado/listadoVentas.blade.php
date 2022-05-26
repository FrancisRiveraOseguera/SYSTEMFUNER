@extends('madre')

@section ('title' , 'Ventas del mes')

@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de Todas las ventas del Mes Actual</h3>
            <br>
             <a class="btn btn-primary btn block" href="{{route('historialinventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
             <a class="btn btn-danger btn block" href=""><i class="bi bi-file-earmark-pdf"></i>Previsualizar e Imprimir Reporte</a>
            
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
    
      <th scope="col" style="text-align: left; width: 300px;">Fecha y hora de venta</th>
      <th scope="col"style="text-align: left;  width: 400px;">Responsable</th>
      <th scope="col"style=" width: 300px;">Servicio</th>
      <th scope="col"style=" width: 300px;">Categoría</th>
      <th scope="col" style="text-align: left; width: 300px;">Precio</th>

    </tr>
  </thead>
  <tbody>     
  @foreach($ContadoVenta as $ventas) 
    <tr class="table-primary"> 
    <td>{{$ventas->created_at}}</td>
     <td>{{$ventas->responsable}}</td> 
    <td>{{$ventas->TipoServicio}}</td>
    <td>{{$ventas->categoria}}</td>
    <td>{{$ventas->Precio}}.00</td>     
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