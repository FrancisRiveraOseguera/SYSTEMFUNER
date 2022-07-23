@extends('madre')

@section ('title' , 'Listado de ventas al crédito')

@section('content')

<div class="formato">
    <div class="row">
        <h3 class="col-lg-7">Listado de ventas al crédito</h3>

        <div class="col-lg-5 row">
            @can('Nueva_venta_crédito')
            <a class="btn btn-info btn block" target="_blank" href="{{route('ventaCredito.nueva')}}"><i class="bi bi-plus-circle"></i>Nueva venta al crédito</a>
            @endcan
            <div class="dropdown show ml-2">
                <a class="btn btn-secondary dropdown-toggle pt-2 pb-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Más opciones <i class="bi bi-caret-down"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('pagos.historialPagos')}}"><i class="fas fa-clipboard-list"></i>Historial de pagos</a>
                    <a class="dropdown-item" href="{{route('creditoVenta.serviciosUsados')}}"><i class="bi bi-clipboard2-check-fill"></i>Listado de servicios usados</a>
                    <a class="dropdown-item" href="{{route('cliente.deudor')}}"><i class="bi bi-clipboard2-check-fill"></i> listado de clientes deudores</a>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!--Barra de búsqueda-->
    <div>
        <form  action="{{route('ventasCredito.index')}}" method="GET" autocomplete="off" class="">
            <div  class="input-group input-group-sm">
                <a type="button" href="{{route('ventasCredito.index')}}" class="btn btn-secondary btn-sm">
                    Limpiar
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

    <div class="row ml-2">
        <div class="cuadro mr-2">1</div>
        <p class="fuente">Ventas cuyo servicio ha sido marcado como usado</p>
    </div>

    <!--Mensajes de alerta -->
    @if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif
</div>
<br>


<!--Creación de tabla-->
<div class="formato !important">
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" class="text-center">Saldo pendiente</th>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Nuevo Pago</th>
            <th scope="col" class="text-center">Detalles de las cuotas</th>

        </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                @if($venta->estado==1)
                    <tr class="table-primary">
                @elseif($venta->estado==0)
                    <tr class="table-danger">
                @endif
                    <td>{{date_format($venta->created_at,"d/m/Y")}}</td>
                    <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                    <td>{{$venta->servicios->tipo}}</td>
                    <td>L.{{number_format($venta->servicios->precio - $venta->servicios->prima - $venta->cuota,2)}}</td>

                    <td class="text-center">
                        @can('Detalles_ventas_crédito')
                        <a class="btn btn-info" href="{{route('ventaCredito.ver', ['id'=>$venta->id])}}">
                            <i class="bi bi-eye"></i>Detalles
                        </a>
                        @endcan
                    </td>

                    <!-- Botón de nuevo pago, con función de desaparecer cuando el saldo pendiente este en cero -->
                    <td>
                        @if (($venta->servicios->precio - $venta->servicios->prima - $venta->cuota)>0)
                        <a class="btn btn-success" target="_blank" href="{{route('nuevoPagos.nuevo',['id'=>$venta->id])}}">
                            <i class="fas fa-hand-holding-usd"></i>Nuevo Pago
                        </a>
                        @else
                        <!-- Button trigger modal-->
                        <a class="btn btn-secondary text-white" data-toggle="modal" data-target="#modalPush">
                            <i class="fas fa-hand-holding-usd"></i>Nuevo Pago
                        </a>

                        <!--Modal: modalPush-->
                        <div class="modal fade" tabindex="1" id="modalPush" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-notify modal-info" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <p class="heading"><i class="fas fa-hand-holding-usd"></i>Nuevo Pago</p>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">
                                        <p>Este cliente no puede realizar un nuevo pago, ya que el saldo pendiente es L0.00 </p>
                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <a href="{{route('ventasCredito.index')}}" class="modal-footer btn-primary">¡Entendido!</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>

                    <td class="text-center">
                        <a class="btn btnAqua"  href="{{route('pagos.pagoDetalles', ['id'=>$venta->id])}}">
                            <i class="fas fa-money-bill-wave"></i>Cuotas pagadas
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay resultados</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$ventas->links()}}
</div>
<style>
    .btnAqua{
        background: darkturquoise;
        color: white;
    }

    .btnAqua:hover{
        color: white;
        background: lightseagreen;
    }
</style>
@endsection
