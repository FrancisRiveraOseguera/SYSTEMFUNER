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
                <th scope="col" class="text-center">Editar</th>
            </tr>
            </thead>
            <tbody>
                @forelse($turnos as $turno)
                    <tr class="table-primary">
                        <td>{{$turno->name}}</td>
                        <td>{{date('h:i A',strtotime($turno->horario_entrada))}}</td>
                        <td>{{date('h:i A',strtotime($turno->horario_salida))}}</td>
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
