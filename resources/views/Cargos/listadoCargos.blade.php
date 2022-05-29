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
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
            @forelse($cargo as $carg)
            <tr class="table-primary">
                <td>{{$carg->cargo}}</td>
                <td>Lps. {{$carg->sueldo}}</td>

                <td>
                    <a class="btn btn-success"
                        href="{{route('Cargo.editar', ['id'=>$carg->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('cargo.borrar',['id'=>$carg->id])}}">
        
                            <a class="redondo btn btn-danger" href="" data-toggle="modal" data-target="#modalPush">
                                <i class="fas fa-minus-circle"></i>Eliminar
                            </a>
                            
                            <!--Modal: modalPush-->
                            <div class="modal fade" tabindex="1" id="modalPush"role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-info" role="document">
                                    <!--Content-->
                                    <div class="modal-content text-center">
                                        <!--Header-->
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading">Eliminar cargo</p>
                                        </div>
            
                                        <!--Body-->
                                        <div class="modal-body">
                                            <p>¿Seguro que deseas eliminar el cargo?</p>
                                        </div>
            
                                        <!--Footer-->
                                        @csrf
                                        @method('delete')
            
                                        <div class="modal-footer flex-center">
                                            <button type="submit" class="modal-footer btn btn-info">Aceptar</button>
                                            <a class="modal-footer btn btn-danger" href="{{route('listadoCargos.index')}}">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
