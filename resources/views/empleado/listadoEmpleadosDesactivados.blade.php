@extends('madre')
@section ('title' , 'Lista de Empleados Desactivados')

@section('content')


<div class="formato">

    <div class="row col-lg-12">
        <h3 class="mt-3">Listado de empleados desactivados</h3>

        <!--Barra de búsqueda-->
        <div class="ml-3 col-lg-7">
            <br>
            <form  action="{{route('listado.empleados.desactivados')}}" method="GET" autocomplete="off">
                <div   class="input-group input-group-sm">
                    <a type="button" href="{{route('listado.empleados.desactivados')}}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left-circle"></i>
                    </a>

                    <input type="search" class="col-sm-9" name="busqueda"
                        placeholder="Ingrese el nombre o identidad para realizar la búsqueda." value="{{$busqueda}}">

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
        <a class="btn btn-primary" href="{{route('empleado.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
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
                <th scope="col" class="text-center">Habilitar</th>
            </tr>
            </thead>
            <tbody>
                @forelse($empleados as $empleado)
                    @if($empleado->estado == 0)
                    <tr class="table-primary">
                        <td>{{$empleado->identidad}}</td>
                        <td>{{$empleado->nombres}}</td>
                        <td>{{$empleado->apellidos}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td class="text-center">
                            @can('Detalles_empleados_desactivados')
                            <a class="btn btn-info"
                            href="{{route('empleado.desactivado', ['id'=>$empleado->id])}}"><i class="bi bi-eye"></i>Detalles</a>
                            @endcan
                        </td>
                        <td class="text-center">
                            <form method="post" action="{{route('empleado.habilitar', ['id'=>$empleado->id])}}">
                                @can('Habilitar_empleados')
                                <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush{{$empleado->id}}">
                                    <i class="fas fa-plus-circle"></i> Habilitar
                                </a>
                                @endcan

                                <!--Modal: modalPush-->
                                <div class="modal fade" tabindex="1" id="modalPush{{$empleado->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content text-center">
                                            <!--Header-->
                                            <div class="modal-header d-flex justify-content-center">
                                                <p class="heading">Habilitar empleado</p>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <p>¿Seguro que deseas habilitar a este empleado?</p>
                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer flex-center">
                                                <a type="submit" class="modal-footer btn btn-info" href="{{route('empleado.habilitar', ['id'=>$empleado->id])}}">Aceptar</a>
                                                <a class="modal-footer btn btn-danger" href="{{route('listado.empleados.desactivados')}}">Cancelar</a>
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
                        <th scope="row" colspan="5"> No hay empleados desactivados</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$empleados->links()}}
    </div>
@endsection
