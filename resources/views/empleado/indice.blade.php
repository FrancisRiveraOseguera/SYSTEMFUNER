@extends('madre')
@section ('title' , 'Lista de Empleados')

@section('content')

    <div class="formato">
        <div class="row">
            <div class="col-lg-7">
                <h3>Listado de empleados</h3>
            </div>

            <div class="col-lg-2.5">
                <a class="btn btn-info btn block" href="{{route('empleado.nuevo')}}"><i class="bi bi-plus-circle"></i>Nuevo empleado</a>
            </div>
            <div class="col-lg-3">
                <a class="btn btn-secondary btn block" href="{{route('listado.empleados.desactivados')}}"><i class="bi bi-dash-circle"></i>Empleados desactivados</a>
            </div>
        </div>

        <!--Barra de búsqueda-->
        <div>
            <br>
            <form  action="{{route('empleado.index')}}" method="GET" autocomplete="off">
                <div   class="input-group input-group-sm">
                    <a type="button" href="{{route('empleado.index')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i></a>

                    <input type="search" class="col-sm-6" name="busqueda"
                        placeholder="Ingrese el nombre o identidad del empleado para realizar la búsqueda" value="{{$busqueda}}">

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
                <th scope="col" class="text-center">Desactivar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($empleado as $emple)
                @if($emple->estado == 1)
                <tr class="table-primary">
                    <td>{{$emple->identidad}}</td>
                    <td>{{$emple->nombres}}</td>
                    <td>{{$emple->apellidos}}</td>
                    <td>{{$emple->telefono}}</td>

                    <td class="text-center">
                        <a class="btn btn-info"
                        href="{{route('empleado.ver', ['id'=>$emple->id])}}"><i class="bi bi-eye"></i>Detalles</a>
                    </td>

                    <td class="text-center">
                        <a class="btn btn-success"
                            href="{{route('empleado.edit', ['id'=> $emple->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
                    </td>
                    <td class="text-center">
                        <form method="post" action="{{route('empleado.desactivar', ['id'=>$emple->id])}}">
                            <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush{{$emple->id}}">
                                <i class="fas fa-minus-circle"></i>Desactivar
                            </a>

                            <!--Modal: modalPush-->
                            <div class="modal fade" tabindex="1" id="modalPush{{$emple->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-info" role="document">
                                    <!--Content-->
                                    <div class="modal-content text-center">
                                        <!--Header-->
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading">Desactivar empleado</p>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body">
                                            <p>¿Seguro que deseas desactivar a este empleado?</p>
                                        </div>

                                        <!--Footer-->
                                        <div class="modal-footer flex-center">
                                            <a class="modal-footer btn btn-info" href="{{route('empleado.desactivar', ['id'=>$emple->id])}}">Aceptar</a>
                                            <a class="modal-footer btn btn-danger" href="{{route('empleado.index')}}">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endif
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay empleados</th>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $empleado->links()}}
    </div>
@endsection
