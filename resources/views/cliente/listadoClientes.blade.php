@extends('madre')
@section ('title' , 'Listado de Clientes')

@section('content')
<div class="formato">
    <div>
        <h3>Listado de clientes</h3>
    <div>
    <br>

    <div class="w-100 d-inline-flex">
        <div class="col-sm-5">
            @can('Nuevo_cliente')
            <a class="btn btn-info btn block" href="{{route('cliente.nuevo',['cliente'=>-2])}}">
                <i class="bi bi-plus-circle"></i>Nuevo cliente
            </a>
            @endcan
        </div>

        <!--Barra de búsqueda-->
        <div class="col-sm-8">
            <form  action="{{route('listado.clientes')}}" method="GET" autocomplete="off">
                <div  class="input-group input-group-sm-8">
                    <a type="button" href="{{route('listado.clientes')}}" class="btn btn-secondary btn-sm">Limpiar</a>

                    <input type="search" class="col-sm-8" name="busqueda"
                           placeholder="Ingrese el nombre o la identidad del cliente para buscar." value="{{$busqueda}}">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div></div>
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
    <table class="table">
        <thead>
        <tr>
            <tr class="table-info ">
            <th scope="col">Identidad</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Editar</th>
        </tr>
        </thead>
        <tbody>
            @forelse($cliente as $client)
            <tr class="table-primary">
                <td>{{$client->identidad}}</td>
                <td>{{$client->nombres}}</td>
                <td>{{$client->apellidos}}</td>
                <td>{{$client->telefono}}</td>

                <td class="text-center">
                    @can('Detalles_clientes')
                    <a class="btn btn-info"
                    href="{{route('cliente.ver', ['id'=>$client->id])}}"><i class="bi bi-eye"></i>Detalles</a>
                    @endcan
                </td>

                <td class="text-center">
                    @can('Editar_clientes')
                    <a class="btn btn-success"
                        href="{{route('cliente.edit', ['id'=> $client->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay clientes.</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $cliente->links()}}
</div>
@endsection
