@extends('madre')
@section ('title' , 'Historial de pagos')
@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Historial de pago de cuotas de ventas al crédito</h3>
            <br>
                <a class="btn btn-primary btn block" href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
        </div><hr>
</div>
</div><br>

<div class="invent">
    <table class="table ">
        <thead>
            <tr class="table-info"  style=" width: 1020px;">
                <th scope="col">Nº Pago</th>     
                <th scope="col">Fecha del pago</th>
                <th scope="col">Servicio</th>
                <th scope="col">Cuota</th>
                <th scope="col">Cliente</th>
            </tr>
        </thead>
        
        <tbody>     
        @foreach($cuotas as $cuo) 
        <tr class="table-primary">
        <td>{{$cuo->id}}</td>
        <td>{{date_format(new \DateTime($cuo->created_at), 'd/m/Y' )}}</td>
        <td>{{$cuo->ventas->servicios->tipo}}</td>
        <td style="color:#2d812f;">{{$cuo->cuota}}</td>
        <td>{{$cuo->ventas->clientes->nombres}} {{$cuo->ventas->clientes->apellidos}}</td>
        </td>
        @endforeach
        </tbody>
    </table>
    <!--paginación de la tabla-->
   {{$cuotas->links() }}
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