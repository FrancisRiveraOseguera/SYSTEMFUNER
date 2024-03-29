@extends('madre')

@section ('title' , 'Listado de permisos')

@section('content')


<div class="formato">
    <div>
        <h3>Listado de permisos</h3>
    </div>
    <br>

    <div class="w-100 d-inline-flex">
        <div class="col-sm-5">
            @can('Nuevo_permiso')
                <a class="btn btn-info btn block" href="{{route('permisos.create')}}">
                    <i class="bi bi-plus-circle"></i>Nuevo permiso
                </a>
            @endcan
        </div>

        <div class="col-sm-7">
            <!--Barra de búsqueda-->
            <form  action="{{route('permisos.lista')}}" method="GET" autocomplete="off">
                <div  class="input-group input-group-sm-7">
                    <a type="button" href="{{route('permisos.lista')}}" class="btn btn-secondary btn-sm"></i>Limpiar</a>

                    <input type="search" class="col-sm-9" name="busqueda"
                           placeholder="Ingrese el nombre del permiso para buscar." value="{{$busqueda}}">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            Buscar
                        </button>
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
                    @can('Editar_permisos')
                    <a class="btn btn-success"
                        href="{{route('permiso.editar', ['id'=> $perm->id])}}"><i class="bi bi-pencil-square"></i>Editar
                    </a>
                    @endcan
                </td>

                <td>
                    <form method="post" action="{{route('permiso.eliminar',['id'=> $perm->id])}}">

                        @can('Eliminar_permisos')
                        <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush{{$perm->id}}">
                            <i class="fas fa-minus-circle"></i>Eliminar
                        </a>
                        @endcan

                        <!--Modal: modalPush-->
                        <div class="modal fade" tabindex="1" id="modalPush{{$perm->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-info" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <p class="heading"><i class="bi bi-person-rolodex"></i>Eliminar permiso</p>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <p>Si eliminas este permiso se borrará del listado de permisos de cada rol en caso de que lo estén
                                            utilizando.</p>
                                        <p> <b>¿Deseas continuar?</b> </p>
                                    </div>

                                    <!--Footer-->
                                    @csrf
                                    @method('delete')

                                    <div class="modal-footer flex-center">
                                        <button type="submit" class="modal-footer btn btn-info">Aceptar</button>
                                        <a class="modal-footer btn btn-danger" href="{{route('permisos.lista')}}">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
