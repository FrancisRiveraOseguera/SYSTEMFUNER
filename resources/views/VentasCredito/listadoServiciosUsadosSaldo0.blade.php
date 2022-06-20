@extends('madre')

@section ('title' , 'Listado de servicios usados saldo L.0.00')

@section('content')

<div class="formato">
    <h3 class="col-lg-9">Listado de las ventas al crédito que han usado el servicio</h3><br>
    <div class="row">
        <a class="btn btn-primary btn block ml-3" href="{{route('ventasCredito.index')}}">
            <i class="bi bi-box-arrow-left"></i>Regresar
        </a>
        <a class="btn btn-info btn block ml-3" href="{{route('creditoVenta.serviciosUsados')}}">
            <i class="bi bi-cash-coin"></i>Ver todas las ventas
        </a>
    </div>
    <hr>
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
                <th scope="col">Valor del servicio</th>
                <th scope="col">Valor de la prima</th>
                <th scope="col">Saldo pagado</th>
                <th scope="col">Saldo pendiente</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                @if (($venta->servicios->precio - $venta->servicios->prima - $venta->cuota)==0)
                <tr class="table-primary">
                    <td>{{date_format($venta->created_at,"d/m/Y")}}</td>
                    <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                    <td>{{$venta->servicios->tipo}}</td>
                    <td>L.{{number_format($venta->servicios->precio,2)}}</td>
                    <td>L.{{number_format($venta->servicios->prima,2)}}</td>
                    <td class="text-success">L.{{number_format($venta->servicios->prima + $venta->cuota,2)}}</td>
                    <td class="text-danger">L.{{number_format($venta->servicios->precio - $venta->servicios->prima - $venta->cuota,2)}}</td>
                </tr>
                @endif
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay resultados</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$ventas->links()}}
</div>
@endsection
