@extends('madre')

@section ('title' , 'Listado de roles')

@section('content')


<div class="formato">

    <div>
        <h3>Listado de roles</h3>
        <br>
        <a class="btn btn-info btn block" href="{{route('roles.create')}}">
            <i class="bi bi-plus-circle"></i>Nuevo rol
        </a>
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
            <th scope="col">Nombre del rol</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
            @forelse($Roles as $rol)
            <tr class="table-primary">
                <td>{{$rol->name}}</td>
                <td>{{$rol->descripcion}}</td>

                <td>
                    <a class="btn btn-success"
                        href="{{route('rol.editar', ['id'=> $rol->id])}}"><i class="bi bi-pencil-square"></i>Editar
                    </a>
                </td>

                <td>
                    <form method="post" action="{{route('rol.eliminar',['id'=> $rol->id])}}">

                        <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush{{$rol->id}}">
                            <i class="fas fa-minus-circle"></i>Eliminar
                        </a>

                        <!--Modal: modalPush-->
                        <div class="modal fade" tabindex="1" id="modalPush{{$rol->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-info" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <p class="heading">Eliminar rol</p><i class="bi bi-person-rolodex"></i>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">
                                        <p>¿Seguro que deseas eliminar el rol?</p>
                                    </div>

                                    <!--Footer-->
                                    @csrf
                                    @method('delete')

                                    <div class="modal-footer flex-center">
                                        <button type="submit" class="modal-footer btn btn-info">Aceptar</button>
                                        <a class="modal-footer btn btn-danger" href="{{route('roles.index')}}">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>

            @empty
            <tr>
                <th scope="row" colspan="5"> No hay roles</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $Roles->links()}}
</div>

@endsection
