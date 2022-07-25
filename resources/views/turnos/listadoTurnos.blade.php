@extends('madre')
@section ('title' , 'Listado de turnos')
@section('content')

<div class="emple">
    <div class="xd">
        <h3>Listado de turnos</h3>
        <div>
            <br>
            @can('Nuevo_turno')
            <a class="btn btn-info btn block" href="{{route('turnos.create')}}">
                <i class="bi bi-plus-circle"></i>Nuevo turno
            </a>
            @endcan
        </div>
    </div><hr>

<!--Mensajes de alerta -->
@if(session('mensaje'))
    <div class="alert alert-success">
        {{session('mensaje')}}
    </div>
@endif

@if(session('errors'))
    <div class="alert alert-danger alert-dismissible">
        {{session('errors')}}
    </div>
@endif
</div><br>

    <!--Creación de tabla-->
    <div class="formato !important">
        <table class="table">
            <thead>
            <tr>
                <tr class="table-info ">
                <th scope="col">Tipo de turno</th>
                <th scope="col">Horario de entrada</th>
                <th scope="col">Horario de salida</th>
                <th scope="col">Horas de trabajo</th>
                <th scope="col">Eliminar</th>
                <th scope="col" class="text-center">Editar</th>
            </tr>
            </thead>
            <tbody>
                @forelse($turnos as $turno)
                    <tr class="table-primary">
                        <td>{{$turno->name}}</td>
                        <td>{{date('h:i A',strtotime($turno->horario_entrada))}}</td>
                        <td>{{date('h:i A',strtotime($turno->horario_salida))}}</td>

                        <?php
                            $entrada = $turno->horario_entrada;
                            $salida = $turno->horario_salida;
                            $DateDiff = date('H:i');

                            //Horarios normales
                            $start_hour = strtotime($entrada);
                            $end_hour = strtotime($salida);                          
                            $total_time = ($end_hour - $start_hour) / 60 / 60;
                            $total_time = number_format((float)$total_time, 2);
                            $DateDiff = $total_time;

                            //Horario que sobrepasa al dia siguiente
                            if($DateDiff < 0){
                                $DateDiff = number_format((float)$DateDiff, 2);
                                $DateDiff = ($total_time + 24);
                            }
                            
                            //Horario de 24 horas (misma hora de entrada y salida)
                            if($entrada == $salida){
                                $DateDiff = '24';
                            }
                        ?>

                        <td>{{$DateDiff}} horas</td>
                        <td><form method="post" action="{{route('turno.eliminar', ['id'=> $turno->id])}}">

                            @can('Eliminar_turno')
                            <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush{{$turno->id}}">
                                <i class="fas fa-minus-circle"></i>Eliminar
                            </a>
                            @endcan

                            <!--Modal: modalPush-->
                            <div class="modal fade" tabindex="1" id="modalPush{{$turno->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-info" role="document">
                                    <!--Content-->
                                    <div class="modal-content text-center">
                                        <!--Header-->
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading"><i class="bi bi-person-badge"></i>Eliminar turno</p>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body">
                                            <p>¿Estás seguro que deseas eliminar el turno?</p>
                                        </div>

                                        <!--Footer-->
                                        @csrf
                                        @method('delete')
                                        <div class="modal-footer flex-center">
                                            <button type="submit" class="modal-footer btn btn-info">Aceptar</button>
                                            <a class="modal-footer btn btn-danger" href="{{route('turnos.index')}}">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <td class="text-center">
                        @can('Editar_turno')
                            <a class="btn btn-success"
                            href="{{route('turno.editar', ['id'=> $turno->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
                        @endcan
                    </td>
                </form>
            </td>
        </tr>
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay turnos</th>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $turnos->links()}}
    </div>
@endsection
