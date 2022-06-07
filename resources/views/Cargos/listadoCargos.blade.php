@extends('madre')

@section ('title' , 'Listado de Cargos')

@section('content')


<div class="formato">

    <div>
        <h3>Listado de Cargos</h3>
        <br>
        <a class="btn btn-info btn block" href="nuevoCargo">
            <i class="bi bi-plus-circle"></i>Nuevo cargo
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
                    <a class="btn btn-info"
                    href="{{route('cargo.ver', ['id'=>$carg->id])}}"><i class="bi bi-eye"></i>Detalles
                    </a>
                </td>
                <td>
                    <a class="btn btn-success"
                        href="{{route('Cargo.editar', ['id'=>$carg->id])}}"><i class="bi bi-pencil-square"></i>Editar
                    </a>
                </td>

            @empty
            <tr>
                <th scope="row" colspan="5"> No hay cargos</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $cargo->links()}}
</div>

@endsection
