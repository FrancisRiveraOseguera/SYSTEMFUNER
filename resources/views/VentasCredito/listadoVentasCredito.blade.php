@extends('madre')

@section ('title' , 'Listado de ventas al crédito')

@section('content')

<div class="vent">
    <div class="row">
        <h3 class="col-lg-7">Listado de ventas al crédito</h3>

        <div class="col-lg-5">
            <a class="btn btn-info btn block" target="_blank" href="{{route('ventaCredito.nueva')}}"><i class="bi bi-plus-circle"></i>Nueva venta al crédito</a>
            <a class="btn btn-info btn block"  href="{{route('pagos.historialPagos')}}"><i class="fas fa-clipboard-list"></i>Historial de pagos</a>
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
            <tr class="table-primary">
                <td>{{date_format($venta->created_at,"d-m-Y")}}</td>
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
                    <a class="btn btn-success" target="_blank" href="{{route('nuevoPagos.nuevo',['id'=>$venta->id])}}">
                        <i class="fas fa-hand-holding-usd"></i>Nuevo Pago
                    </a>
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
