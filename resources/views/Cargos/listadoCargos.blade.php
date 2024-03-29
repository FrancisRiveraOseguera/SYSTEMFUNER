@extends('madre')
@section ('title' , 'Listado de Cargos')

@section('content')
<div class="formato">

    <div>
        <h3>Listado de Cargos</h3>
    </div>
    <br>

    <div class="w-100 d-inline-flex">
        @can('Nuevo_cargo')
        <a class="btn btn-info btn block" href="nuevoCargo">
            <i class="bi bi-plus-circle"></i>Nuevo cargo
        </a>
        @endcan
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
            <th scope="col">Tipo de cargo</th>
            <th scope="col">Sueldo</th>
            <th scope="col">Detalles</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
            @forelse($cargo as $carg)
            <tr class="table-primary">
                <td>{{$carg->cargo}}</td>
                <td>L.{{number_format($carg->sueldo,2)}}</td>
                <td>
                    @can('Detalles_cargos')
                    <a class="btn btn-info"
                    href="{{route('cargo.ver', ['id'=>$carg->id])}}"><i class="bi bi-eye"></i>Detalles
                    </a>
                    @endcan
                </td>
                <td>
                    @can('Editar_cargo')
                    <a class="btn btn-success"
                        href="{{route('Cargo.editar', ['id'=>$carg->id])}}"><i class="bi bi-pencil-square"></i>Editar
                    </a>
                    @endcan
                </td>

            @empty
            <tr>
                <th scope="row" colspan="5"> No hay cargos.</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $cargo->links()}}
</div>

@endsection
