@extends('madre')

@section ('title' , 'Listado de servicios usados')

@section('content')

<div class="formato">
    <div class="row">
        <h3 class="col-lg-9">Listado de las ventas al crédito que han usado el servicio</h3>
        <a class="btn btn-primary btn block ml-3" href="{{route('ventasCredito.index')}}">
            <i class="bi bi-box-arrow-left"></i>Regresar
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
                <th scope="col">Cliente</th>
                <th scope="col">Tipo de servicio</th>
                <th scope="col">Valor del servicio</th>
                <th scope="col">Valor de la prima</th>
                <th scope="col">Saldo pagado</th>
                <th scope="col">Saldo pendiente</th>
                <th scope="col" class="text-center">Cuotas pagadas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                <tr class="table-primary">
                    <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                    <td>{{$venta->servicios->tipo}}</td>
                    <td>L.{{number_format($venta->servicios->precio,2)}}</td>
                    <td>L.{{number_format($venta->servicios->prima,2)}}</td>
                    <td class="text-success">L.{{number_format($venta->servicios->prima + $venta->cuota,2)}}</td>
                    <td class="text-danger">L.{{number_format($venta->servicios->precio - $venta->servicios->prima - $venta->cuota,2)}}</td>
                    <td class="text-center">{{count([$venta->couta])}}</td>
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
@endsection
