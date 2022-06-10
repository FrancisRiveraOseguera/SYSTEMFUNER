@extends('madre')

@section ('title' , 'Listado de Gastos')

@section('content')


<div class="formato">

    <div class="xd">
        <h3>Listado de gastos</h3>

        <div>
            <br>
            <a class="btn btn-info btn block" href="nuevoGasto">
                <i class="bi bi-plus-circle"></i>Nuevo gasto
            </a>
        </div>
    </div>
    <hr>

    <!--Barra de búsqueda-->
    <form  action="{{route('listadoGastos.index')}}" method="GET" autocomplete="off" class="x">
        <div  class="input-group input-group-sm">
            <a type="button" href="{{route('listadoGastos.index')}}" class="btn btn-secondary btn-sm"><i class="bi bi-backspace" <acronym title="Borrar la búsqueda."></i></a>

            <input type="search" class="col-sm-9" name="busqueda"
                placeholder="Ingrese la fecha o el tipo de gasto para realizar la búsqueda." value="{{$busqueda}}">

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
</div>
<br>

<!--Creación de tabla-->
<div class="formato !important">
    <table class="table">
        <thead>
        <tr>
            <tr class="table-info ">
            <th scope="col">Fecha</th>
            <th scope="col">Tipo de gasto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Responsable</th>
            <th scope="col">Detalles</th>
        </tr>
        </thead>
        <tbody>
            @forelse($gasto as $gast)
            <tr class="table-primary">
                <td >{{$gast->fecha}}</td>
                <td>{{$gast->tipo_gasto}}</td>
                <td>L.{{number_format($gast->cantidad,2)}}</td>
                <td>{{$gast->empleados->nombres}} {{$gast->empleados->apellidos}}</td>
                <td>
                    <a class="btn btn-info"
                    href=""><i class="bi bi-eye"></i>Detalles
                    </a>
                </td>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay gastos</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$gasto->links()}}
</div>

@endsection
