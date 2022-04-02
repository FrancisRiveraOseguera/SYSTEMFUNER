@extends('madre')
@section ('title' , 'Detalles de cuotas')
@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Historial de pago de cuotas de {{$pagos->ventas->clientes->nombres}} {{$pagos->ventas->clientes->apellidos}}</h3>
            <a style="font-size: 20px; font-style:italic;">{{$pagos->ventas->servicios->tipo}}</a>
            <br><br>
                <a class="btn btn-primary btn block" href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
        </div><hr>
</div>
</div><br>
 
<div class="invent">
    <table class="table ">
        <thead>
            <tr class="table-info"  style=" width: 1020px;">
                <th scope="col">Nº Cuota</th>     
                <th scope="col">Fecha del pago</th>
                <th scope="col">Responsable</th>
                <th scope="col">Cuota pagada</th>
                <th scope="col">Saldo pendiente actual</th>
            </tr>
        </thead>
        
        <tbody>     
            @foreach($pagos as $pago) 
                <tr class="table">
                    <td>{{$pagos->ventas->id}}</td>
                    <td>{{date_format(new \DateTime($pagos->created_at), 'd/m/Y' )}}</td>
                    <td>{{$pagos->ventas->responsable}}</td>
                    <td style="color:#2d812f;">L. {{$pagos->cuota}}</td>
                </tr>
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