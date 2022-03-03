@extends('madre')

@section ('title' , 'Listado de Clientes')

@section('content')


<div class="emple">

    <div class="row">
        <div class="col-lg-9">
            <h3>Listado de clientes</h3>
        </div>

        <div class="col-lg-3">
            <a class="btn btn-info btn block" href="{{route('cliente.nuevo')}}"><i class="bi bi-plus-circle"></i>Nuevo cliente</a>
        </div>

    </div>


<!--Barra de búsqueda-->
<div>
    <br>
    <form  action="{{route('listado.clientes')}}" method="GET" autocomplete="off">
        <div   class="input-group input-group-sm">
            <a type="button" href="{{route('listado.clientes')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i></a>

            <input type="search" class="col-sm-6" name="busqueda"
                placeholder="Ingrese el nombre o la identidad del cliente para realizar la búsqueda." value="{{$busqueda}}">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
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
</div><br>


<!--Creación de tabla-->
<div class="emple !important">
<table class="table">
    <thead>
    <tr>
        <tr class="table-info ">
        <th scope="col">Identidad</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Detalles</th>
        <th scope="col">Editar</th>
    </tr>
    </thead>
    <tbody>
    @forelse($cliente as $client)
    <tr>
        <td>{{$client->identidad}}</td>
        <td>{{$client->nombres}}</td>
        <td>{{$client->apellidos}}</td>
        <td>{{$client->telefono}}</td>

        <td>
            <a class="btn btn-info"
            href="{{route('cliente.ver', ['id'=>$client->id])}}"><i class="bi bi-eye"></i>Detalles</a>
        </td>

        <td>
            <a class="btn btn-success"
                href="{{route('cliente.edit', ['id'=> $client->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
        </td>

    </tr>
    @empty
    <tr>
    <th scope="row" colspan="5"> No hay clientes</th>
    </tr>
    @endforelse
    </tbody>
    </table>
    {{ $cliente->links()}}


    <style>
        .emple {
            border-top: 1px solid #E6E6E6 ;
            border-left: 1px solid #E6E6E6 ;
            border-right: 1px solid #E6E6E6;
            border-bottom: 1px solid #E6E6E6 ;
            padding: 20px;
            background-color: #E0F8F7;
            position:relative;
        }

        .emple{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
        }
    </style>

@endsection
