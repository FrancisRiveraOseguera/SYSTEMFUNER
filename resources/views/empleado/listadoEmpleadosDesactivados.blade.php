@extends('madre')
@section ('title' , 'Lista de Empleados Desactivados')

@section('content')


<div class="emple">

    <div class="row">
        <div class="col-lg-10">
            <h3>Listado de empleados desactivados</h3>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-success" href="{{route('empleado.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        </div>
    </div>

    <!--Barra de búsqueda-->
    <div>
        <br>
        <form  action="{{route('listado.empleados.desactivados')}}" method="GET" autocomplete="off">
            <div   class="input-group input-group-sm">
                <a type="button" href="{{route('listado.empleados.desactivados')}}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left-circle"></i>
                </a>

                <input type="search" class="col-sm-8" name="busqueda"
                    placeholder="Ingrese el nombre, identidad o fecha de desactivación del empleado para realizar la búsqueda." value="{{$busqueda}}">

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
                <th scope="col" class="date">Fecha de desactivación</th>
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
                <tr>
                    <td>{{$empleado->fecha_desactivacion}}</td>
                    <td>{{$empleado->identidad}}</td>
                    <td>{{$empleado->nombres}}</td>
                    <td>{{$empleado->apellidos}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td class="text-center">
                        <a class="btn btn-info"
                        href="{{route('empleado.desactivado', ['id'=>$empleado->id])}}"><i class="bi bi-eye"></i>Detalles</a>
                    </td>
                    <td class="text-center">
                        <form method="post" action="{{route('empleado.habilitar', ['id'=>$empleado->id])}}"
                              onclick="return confirm('¿Seguro que deseas habilitar a este empleado?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="redondo btn btn-danger">
                                <i class="fas fa-plus-circle"></i> Habilitar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                <th scope="row" colspan="5"> No hay empleados desactivados</th>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$empleados->links()}}
    </div>

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
