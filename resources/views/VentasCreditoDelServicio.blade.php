@extends('madre')
@section ('title' , 'Listado de ventas al crédito del servicio')
@section('content')
    <div class="formato">
        <div class="row">
            <div class="col-lg-10">
                <h3>Listado de ventas al crédito del servicio <b>{{$servicio->tipo}}</b></h3>
                <br>
                 <a class="btn btn-primary btn block" href="{{route('Servicio.lista')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
            </div>
            <hr>
        </div>
    </div>
    <br>

    <!--Creación de tabla-->
     <div class="formato">
         <table class="table ">
             <thead>
                <tr class="table-info"  style="width: 1020px;">
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo de servicio</th>
                    <th scope="col">Precio del servicio</th>
                    <th scope="col">Prima</th>
                    <th scope="col">Saldo pagado</th>
                    <th scope="col">Saldo pendiente</th>
                </tr>
             </thead>
             <tbody>
                @forelse($ventas as $venta)
                    <tr>
                        <td>{{date_format($venta->created_at,"d/m/Y")}}</td>
                        <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                        <td>{{$venta->servicios->tipo}}</td>
                        <td>L.{{number_format($venta->servicios->precio,2)}}</td>
                        <td>L.{{number_format($venta->servicios->prima,2)}}</td>
                        <td class="text-success">L.{{number_format($venta->cuota,2)}}</td>
                        <td class="text-danger">L.{{number_format($venta->servicios->precio - $venta->servicios->prima - $venta->cuota,2)}}</td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="5">No se encontraron resultados</th>
                    </tr>
                @endforelse
            </tbody>
         </table>
         {{$ventas->links()}}
    </div>
@endsection
