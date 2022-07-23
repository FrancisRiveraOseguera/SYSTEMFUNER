@extends('madre')
@section ('title' , 'Listado jornada laboral')
@section('content')

<div class="emple">
    <div class="xd">
        <h3>Listado jornada laboral</h3>
        <div>
            <br>

            <a class="btn btn-info btn block" href="{{route('jornadalaboral.create')}}">
                <i class="bi bi-plus-circle"></i>Nueva jornada laboral
            </a>

        </div>
    </div><hr>

    <!--Barra de búsqueda-->
    <form  action="{{route('ListadoJornadaLaboral.index')}}" method="GET" autocomplete="off" class="x">
        <div  class="input-group input-group-sm">
            <a type="button" href="{{route('ListadoJornadaLaboral.index')}}" class="btn btn-secondary btn-sm">Limpiar</a>

            <input type="search" class="col-sm-8" name="busqueda"
                placeholder="Ingrese el turno o empleado  para realizar la búsqueda." value="{{$busqueda}}">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>


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
                <th scope="col">Turno</th>
                <th scope="col">Empleado</th>
                <th scope="col">Fecha inico</th>
                <th scope="col">Fecha finalización</th>
                <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Eliminar</th>

            </tr>
            </thead>
            <tbody>
                @forelse($jornada as $jorna)
                    <tr class="table-primary">
                        <td>{{$jorna->turnos->name}}</td>
                        <td>{{$jorna->empleados->nombres}} {{$jorna->empleados->apellidos}}</td>
                        <td>{{date('d-m-Y',strtotime($jorna->fecha_inicio))}}
                        <td>{{date('d-m-Y',strtotime($jorna->fecha_fin))}}
                        <td class="text-center">
                            @can('Editar_jornadaLaboral')
                            <a class="btn btn-success"
                            href="{{route('jornada.editar', ['id'=> $jorna->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
                            @endcan
                        </td>

                        <td class="text-center">
                            <form method="post" action="{{route('jornadaLaboral.eliminar',['id'=> $jorna->id])}}">
                                @can('Eliminar_jornadaLaboral')
                                <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush{{$jorna->id}}">
                                    <i class="fas fa-minus-circle"></i>Eliminar
                                </a>
                                @endcan

                                <!--Modal: modalPush-->
                                <div class="modal fade" tabindex="1" id="modalPush{{$jorna->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content text-center">
                                            <!--Header-->
                                            <div class="modal-header d-flex justify-content-center">
                                                <p class="heading">Eliminar jornada laboral</p>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">
                                                <p>¿Seguro que deseas eliminar la jornada laboral?</p>
                                            </div>

                                            <!--Footer-->
                                            @csrf
                                            @method('delete')

                                            <div class="modal-footer flex-center">
                                                <button type="submit" class="modal-footer btn btn-info">Aceptar</button>
                                                <a class="modal-footer btn btn-danger" href="{{route('ListadoJornadaLaboral.index')}}">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay resultados</th>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $jornada->links()}}
    </div>
@endsection
