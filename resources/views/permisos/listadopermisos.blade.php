@extends('madre')

@section ('title' , 'Listado de permisos')

@section('content')


<div class="formato">

    <div>
        <h3>Listado de permisos</h3>
        <br>
        <a class="btn btn-info btn block" href="{{route('permisos.create')}}">
            <i class="bi bi-plus-circle"></i>Nuevo permiso
        </a>
    </div>

    <!--Barra de búsqueda-->
    <form  action="{{route('permisos.lista')}}" method="GET" autocomplete="off" class="x">
        <div  class="input-group input-group-sm">
            <a type="button" href="{{route('permisos.lista')}}" class="btn btn-secondary btn-sm"></i>Limpiar</a>

            <input type="search" class="col-sm-9" name="busqueda"
                placeholder="Ingrese el nombre del permiso para realizar la búsqueda." value="{{$busqueda}}">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>

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
            <th scope="col">Nombre del permiso</th>
            <th scope="col">Descripción</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
            @forelse($permisos as $perm)
            <tr class="table-primary">
                <td>{{$perm->name}}</td>
                <td>{{$perm->descripcion}}</td>
                
                <td>
                    <a class="btn btn-success"
                        href="{{route('permiso.editar', ['id'=> $perm->id])}}"><i class="bi bi-pencil-square"></i>Editar
                    </a>
                </td>

                <td>
                    <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush">
                        <i class="fas fa-minus-circle"></i>Eliminar
                    </a>
                </td>

            @empty
            <tr>
                <th scope="row" colspan="5"> No hay permisos</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $permisos->links()}}
</div>

@endsection
