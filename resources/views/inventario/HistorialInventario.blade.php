@extends('madre')

@section ('title' , 'Productos en inventario')

@section('content')

<div class="formato">
    <div class="row">
        <div class="col-lg-7">
            <h3>Historial de inventario</h3>
        </div>

        <div class="col-lg-2.5 hijo">
            @can('Nuevo_inventario')
            <a class="btn btn-info btn block" href="{{route('inventario.create')}}"><i class="bi bi-plus-circle"></i>Agregar a inventario</a>
            @endcan
        </div>
        <div class="col-lg-2.5 pl-4">
            @can('Cantidad_inventario')
            <a class="btn btn-success btn block" href="{{route('inventario.verProductos')}}"><i class="bi bi-clipboard-check"></i>Cantidades en inventario</a>
            @endcan
        </div>
    </div>

    <!--Barra de búsqueda-->
    <div>
        <br>
        <form  action="{{route('historialinventario.index')}}" method="GET" autocomplete="off">
            <div   class="input-group input-group-sm">
                <a type="button" href="{{route('historialinventario.index')}}" class="btn btn-secondary btn-sm">Limpiar</a>

                <input type="search" class="col-sm-7" name="busqueda"
                    placeholder="Ingrese el número de producto o nombre del responsable para realizar la búsqueda." value="{{$busqueda}}">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        Buscar
                    </button>
                </div>
            </div>
        </form>
    </div><hr>

    <!--Mensajes de alerta -->
    @if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif
</div><br>

<!--Creación de tabla-->
<div class="formato !important">
    <table class="table" style="width: 1020px;">
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">N° Producto</th>
            <th scope="col">Responsable</th>
            <th scope="col">Fecha de ingreso</th>
            <th scope="col" style="width: 50px;">Cantidad </th>
            <th scope="col" style="width: 120px;"> </th>
        </tr>
        </thead>
        <tbody>
        @forelse($producto as $prod)
        <tr class="table-primary">
            <td >{{$prod->servicio_id}}</td>
            <td>{{$prod->nombres}} {{$prod->apellidos}}</td>
            <td >{{$prod->fecha_ingreso}}</td>
            <td style="text-align:right">{{$prod->cantidad_aIngresar}}</td>
            <td></td>

         @empty
        <tr>
        <th scope="row" colspan="5"> No hay productos</th>
        </tr>
        @endforelse
        </tbody>
    </table>
    {{ $producto->links()}}
</div>
@endsection
