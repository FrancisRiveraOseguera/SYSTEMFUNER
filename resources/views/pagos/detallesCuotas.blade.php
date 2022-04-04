@extends('madre')
@section ('title' , 'Detalles de cuotas')
@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
        <h3>Historial de pago de cuotas de <a ><b> {{$pagos->clientes->nombres}} {{$pagos->clientes->apellidos}}</b></a></h3>
           <u> <a style="font-size: 20px; "> Tipo de servicio: <a style="font-size: 20px; "> <b>{{$pagos->servicios->tipo}}</b></a></a></u>
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
                <th scope="col">Prima</th>
                <th scope="col">Saldo pendiente actual</th>
            </tr>
        </thead>
        
        <tbody> 
            <?php 
                $n=1;
                $pagado = 0;
            ?>    
            <tr class="table-primary">
                <td>0</td>
                <td>{{date_format(new \DateTime($pagos->created_at), 'd/m/Y' )}}</td>
                <td>{{$pagos->responsable}}</td>
                <td>L. {{$pagos->servicios->prima}}</td>
                <td>L. {{$pagos->servicios->precio - $pagos->servicios->prima}}</td>
            </tr>
            @foreach($cuotas as $pago) 
                <tr class="table-primary">
                    <td>{{$n}}</td>
                    <td>{{date_format(new \DateTime($pago->created_at), 'd/m/Y' )}}</td>
                    <td>{{$pago->ventas->responsable}}</td>
                    <td style="color:#2d812f;">L. {{$pago->cuota}}</td>

                    <?php 
                        $n++;
                        $pagado += $pago->cuota;
                    ?>   

                    <td>L. {{$pago->ventas->servicios->precio - $pago->ventas->servicios->prima - $pagado}}</td>
                     
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