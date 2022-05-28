@extends('madre')

@section ('title' , 'Listado de Cargos')

@section('content')


<div class="emple">

    <div class="title">
        <h3>Listado de Cargos</h3>
    <div>
            <br>
            <a class="btn btn-info btn block" href="nuevoCargo">
                <i class="bi bi-plus-circle"></i>Nuevo cargo
            </a>
        </div>
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
<div class="emple !important">
    <table class="table">
        <thead>
        <tr>
            <tr class="table-info ">
            <th scope="col">Cargo</th>
            <th scope="col">Sueldo</th>
        </tr>
        </thead>
        <tbody>
            @forelse($cargo as $carg)
            <tr class="table-primary">
                <td>{{$carg->cargo}}</td>
                <td>Lps. {{$carg->sueldo}}</td>

            </tr>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay cargos</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $cargo->links()}}


    <style>
        .title{
            width:40%;
        }

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
