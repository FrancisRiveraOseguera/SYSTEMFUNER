@extends('madre')

@section ('title' , 'Listado de ventas al crédito')

@section('content')

<div class="vent">
    <div class="row">
        <h3 class="col-lg-7">Listado de ventas al crédito</h3>

        <div class="col-lg-5">
            <a class="btn btn-info btn block" href="{{route('ventaCredito.nueva')}}"><i class="bi bi-plus-circle"></i>Nueva venta al crédito</a>
            <a class="btn btn-info btn block" href=""><i class="fas fa-clipboard-list"></i>Historial de pagos</a>
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

                <input type="search" class="col-sm-6" name="busqueda"
                       placeholder="Ingrese el nombre del cliente o empleado para realizar la búsqueda." value="{{$busqueda}}">

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
            <th scope="col">Empleado</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Nuevo Pago</th>
            <th scope="col" class="text-center">Estado de la venta</th>
        </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
            <tr class="table">
                <td>{{date_format($venta->created_at,"d-m-Y")}}</td>
                <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                <td>{{$venta->responsable}}</td>
                <td>{{$venta->servicios->tipo}}</td>

                <td class="text-center">
                    <a class="btn btn-info" href="{{route('ventaCredito.ver', ['id'=>$venta->id])}}">
                        <i class="bi bi-eye"></i>Detalles
                    </a>
                </td>

                <td>
                    <a class="btn btn-success" href=""><i class="fas fa-hand-holding-usd"></i>Nuevo Pago</a>
                </td>
                <td>
                    <a class="btn btn-danger" href=""><i class="fas fa-file-pdf"></i>PDF del estado de venta</a>
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
</style>
@endsection
