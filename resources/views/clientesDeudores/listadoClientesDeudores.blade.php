@extends('madre')

@section ('title' , 'Listado de clientes deudores')

@section('content')

<div class="formato">
    <div class="row col-lg-12">
        <h3 class="mt-3">Listado de clientes deudores</h3>

    <!--Barra de búsqueda-->
    <div class="ml-3 col-lg-7">
        <br>
    <form  action="{{route('cliente.deudor')}}" method="GET" autocomplete="off" >
        <div  class="input-group input-group-sm">
            <a type="button" href="{{route('cliente.deudor')}}" class="btn btn-secondary btn-sm">Limpiar</a>

            <input type="search" class="col-sm-9" name="busqueda"
                placeholder="Ingrese el nombre del cliente para realizar la búsqueda." value="{{$busqueda}}">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>
    </div>
    </div><br>
    <div class="col-lg-2">
            <a class="btn btn-primary"  href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
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
<div class="formato !important">
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Fecha</th>
            <th scope="col">Nombre del cliente</th>
            <th scope="col">Telefono del cliente</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" >Saldo pendiente</th>
            <th scope="col" >Ultimo pago</th>

        </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                @if($venta->pagar > 0)
                    @if($venta->estado==1)
                        <tr class="table-primary">
                    @elseif($venta->estado==0)
                        <tr class="table-danger">
                    @endif
                        <td>{{$venta->ultimo}}</td>
                        <td>{{$venta->nombres}} {{$venta->apellidos}}</td>
                        <td>{{$venta->telefono}}</td>
                        <td>{{$venta->tipo}}</td>
                        <td>L.{{number_format($venta->pagar,2)}}</td>
                        <td class="text-danger">{{$venta->ultimo}}</td>
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
