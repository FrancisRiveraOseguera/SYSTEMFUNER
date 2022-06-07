@extends('madre')

@section ('title' , 'Ventas del mes')

@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de todas las ventas del mes actual</h3>
            <br>
             <a class="btn btn-primary btn block" href="{{route('ventas.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
             <td>
                    <!-- Button trigger modal-->
                    <a class="btn btn-danger" target="_blank" href="{{route('todaslasventas.pdf')}}" data-toggle="modal" data-target="#modalPush"><i class="fas fa-file-pdf"></i>Previsualizar e imprimir reporte de ventas</a>
               
                    <!--Modal: modalPush-->
                    <div class="modal fade" tabindex="1" id="modalPush" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-notify modal-info" role="document">
                            <!--Content-->
                            <div class="modal-content text-center">
                            <!--Header-->
                            <div class="modal-header d-flex justify-content-center">
                                <p class="heading">Un momento...</p>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <i class="pdf fas fa-file-pdf fa-4x mb-4"></i>
                                <p>Para exportar el reporte de ventas a PDF y poder imprimirlo, haz clíc en el logo de la funeraria ubicado en la parte superior izquierda.</p>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer flex-center">
                                <a href="{{route('todaslasventas.pdf')}}" target="_blank" class="modal-footer btn-info">¡Entendido!</a>
                            </div>
                        </div>
                        </div>
                    </div>
                
                </td>
            
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
      <th scope="col"style="text-align: left;  width: 300px;">Responsable</th>
      <th scope="col"style=" width: 300px;">Servicio</th>
      <th scope="col"style=" width: 300px;">Categoría</th>
      <th scope="col"style=" width: 300px; ">Contrato tipo:</th>
      <th scope="col" style="text-align: left; width: 300px;">Precio</th>
     
    </tr>
  </thead>
  <tbody>     
  @foreach($ContadoVenta as $ventas) 
    <tr class="table-primary"> 
    <td>{{$ventas->created_at}}</td>
    <td>{{$ventas->nombres}} {{$ventas->apellidos}} </td> 
    <td>{{$ventas->TipoServicio}}</td>
    <td>{{$ventas->categoria}}</td>
    <td style=" color: #0B614B;">{{$ventas->contratotipo}}</td> 
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