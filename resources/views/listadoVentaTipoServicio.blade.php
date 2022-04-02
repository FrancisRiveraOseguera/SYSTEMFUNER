@extends('madre')


@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de ventas del servicio </h3>
            <br>
             <a class="btn btn-primary btn block" href="{{route('Servicio.lista')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
            
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
        <th scope="row" colspan="5"> No se encontraron resultados</th>
    </tr>
    @endforelse
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