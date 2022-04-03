@extends('madre')

@section ('title' , 'Listado de ventas al crédito')

@section('content')

<div class="vent">
    <div class="row">
        <h3 class="col-lg-7">Listado de ventas al crédito</h3>

        <div class="col-lg-5">
            <a class="btn btn-info btn block" href="{{route('ventaCredito.nueva')}}"><i class="bi bi-plus-circle"></i>Nueva venta al crédito</a>
            <a class="btn btn-info btn block" href="{{route('pagos.historialPagos')}}"><i class="fas fa-clipboard-list"></i>Historial de pagos</a>
        </div>
    </div>
    <br>

    <!--Barra de búsqueda-->
    <div>
        <form  action="{{route('ventasCredito.index')}}" method="GET" autocomplete="off" class="">
            <div  class="input-group input-group-sm">
                <a type="button" href="{{route('ventasCredito.index')}}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left-circle"></i>
                </a>

                <input type="search" class="col-sm-5" name="busqueda"
                       placeholder="Ingrese el nombre del cliente para realizar la búsqueda." value="{{$busqueda}}">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <hr>

    <!--Mensajes de alerta -->
    @if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif
</div>
<br>


<!--Creación de tabla-->
<div class="vent !important">
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Cliente</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" class="text-center">Saldo pendiente</th>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Nuevo Pago</th>
            <th scope="col" class="text-center">Detalles de las cuotas</th>
            <th scope="col" class="text-center">Contratos</th>
        </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
            <tr class="table-primary">
                <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                <td>{{$venta->servicios->tipo}}</td>
                <td>L.{{number_format($venta->servicios->precio - $venta->servicios->prima - $venta->cuota,2)}}</td>

                <td class="text-center">
                    <a class="btn btn-info" href="{{route('ventaCredito.ver', ['id'=>$venta->id])}}">
                        <i class="bi bi-eye"></i>Detalles
                    </a>
                </td>

                <!-- Botón de nuevo pago, con función de desaparecer cuando el saldo pendiente este en cero -->
                <td>
                    @if (($venta->servicios->precio - $venta->servicios->prima - $venta->cuota)>0)
                    <a class="btn btn-success" href="{{route('nuevoPagos.nuevo',['id'=>$venta->id])}}">
                        <i class="fas fa-hand-holding-usd"></i>Nuevo Pago
                    </a>
                    @endif
                </td>

                <td class="text-center">
                    <a class="btn btn-secondary" href="{{route('pagos.pagoDetalles', ['id'=>$venta->id])}}">
                        <i class="fas fa-money-bill-wave"></i>Cuotas pagadas
                    </a>
                </td>

                <td>
                    <!-- Button trigger modal-->
                    <a class="btn btn-danger" href="{{route('creditoVenta.pdf', ['id'=>$venta->id])}}" data-toggle="modal" data-target="#modalPush{{$venta->id}}"><i class="fas fa-file-pdf"></i>Imprimir contrato</a>

                    <!--Modal: modalPush-->
                    <div class="modal fade" tabindex="1" id="modalPush{{$venta->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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
                                <p>Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria ubicado en la parte superior izquierda.</p>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer flex-center">
                                <a href="{{route('creditoVenta.pdf', ['id'=>$venta->id])}}" class="modal-footer btn-primary">¡Entendido!</a>
                            </div>
                        </div>
                        </div>
                    </div>

                </td>

            </tr>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay resultados</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$ventas->links()}}
</div>

<style>
    .vent {
        border-top: 1px solid #E6E6E6 ;
        border-left: 1px solid #E6E6E6 ;
        border-right: 1px solid #E6E6E6;
        border-bottom: 1px solid #E6E6E6 ;
        padding: 20px;
        background-color: #E0F8F7;
        position:relative;
    }

    .vent{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }
    .modal-header{
            font-size: 20px;
            background-color: #1CB6E9;
            color: #FFFFFF;
        }
        .modal-body{
            font-size: 15px;
        }
        .modal-footer{
            font-size: 15px;}

    
</style>
@endsection
