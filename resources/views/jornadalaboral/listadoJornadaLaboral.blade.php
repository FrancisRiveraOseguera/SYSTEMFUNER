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
                placeholder="Ingrese el turno o cargo para realizar la búsqueda." value="{{$busqueda}}">

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
                <th scope="col">Cargo</th>
                <th scope="col">Duración</th>
                <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Eliminar</th>
                
            </tr>
            </thead>
            <tbody>
                @forelse($jornada as $jorna)
                    <tr class="table-primary">
                        <td>{{$jorna->turnos->name}}</td>
                        <td>{{$jorna->cargos->cargo}}</td>
                        <td>{{$jorna->duracion}}</td>
                        <td class="text-center">
                       
                            <a class="btn btn-success"
                            href="{{route('jornada.editar', ['id'=> $jorna->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
                       
                    </td>

                    <td class="text-center">
                    <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush">
                        <i class="fas fa-minus-circle"></i>Eliminar
                    </a>
                </td>

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