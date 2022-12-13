@extends('madre')

@section ('title' , 'Listado de ventas')

@section('content')

<div class="formato">
    <div>
        <h3>Listado de ventas al contado</h3>
    </div>
    <br>

    <div class="col-12 d-inline-flex">
        <div class="col-sm-4">
            @can('Nueva_ventas_contado')
                <a target="_blank" class="btn btn-info btn block" href="{{route('VentaContado.nueva')}}">
                    <i class="bi bi-plus-circle"></i>Nueva venta al contado
                </a>
            @endcan
        </div>

        <!--Barra de búsqueda-->
        <div class="col-sm-8">
            <form  action="{{route('listadoVentas.index')}}" method="GET" autocomplete="off">
                <div  class="input-group input-group-sm-8">
                    <a type="button" href="{{route('listadoVentas.index')}}" class="btn btn-secondary btn-sm">Limpiar</a>

                    <input type="search" class="col-sm-9" name="busqueda"
                           placeholder="Ingrese el nombre o apellido del cliente o empleado para buscar." value="{{$busqueda}}">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
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
<div class="formato">
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Empleado</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Contratos</th>

        </tr>
        </thead>
        <tbody>
            @forelse($venta as $vent)
            <tr class="table-primary">
                <td>{{date_format($vent->created_at,"d-m-Y")}}</td>
                <td>{{$vent->clientes->nombres}} {{$vent->clientes->apellidos}}</td>
                <td>{{$vent->empleados->nombres}} {{$vent->empleados->apellidos}}</td>
                <td>{{$vent->servicios->tipo}}</td>

                <td class="text-center">
                    @can('Detalles_ventas_contado')
                    <a class="btn btn-info"
                    href="{{route('contadoVenta.ver', ['id'=>$vent->id])}}"><i class="bi bi-eye"></i>Detalles</a>
                    @endcan
                </td>

                <td>
                    <!-- Button trigger modal-->
                    <a class="btn btn-danger" href="{{route('contadoVenta.pdf', ['id'=>$vent->id])}}" data-toggle="modal" data-target="#modalPush{{$vent->id}}"><i class="fas fa-file-pdf"></i>Previsualizar e imprimir contrato</a>

                    <!--Modal: modalPush-->
                    <div class="modal fade" tabindex="1" id="modalPush{{$vent->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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
                                <a href="{{route('contadoVenta.pdf', ['id'=>$vent->id])}}" class="modal-footer btn-info">¡Entendido!</a>
                            </div>
                        </div>
                        </div>
                    </div>

                </td>

                <!--<td class="text-center">
                    <a class="btn btn-danger" href="{{route('contadoVenta.pdf', ['id'=>$vent->id])}}">
                        <i class="fas fa-file-pdf"></i>Previsualizar e imprimir contrato</a>
                </td>-->

                </td>

            </tr>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay resultados</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $venta->links()}}

</div>


    <style>
        .xd{
            width:40%;
        }

        .x{
            width:65%;
            float:right;
            padding: 20px;
            position: absolute;
            top: 25%;
            right: 20px;

        }


    </style>

@endsection
