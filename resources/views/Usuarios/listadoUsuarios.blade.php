@extends('madre')

@section ('title' , 'Listado de usuarios')

@section('content')

<div class="vent">
    
        <h3> Listado de usuarios</h3> 
    
    <div>
    <br>
    <a class="btn btn-info btn block"  href="{{route('usuarios.create')}}"><i class="bi bi-plus-circle"></i>Nuevo usuario</a>
    <br>
</div><br>

    <!--Mensaje de alerta para validacón-->
    @if(session('mensaje'))
    <div class= "alert alert-success">
        {{session('mensaje')}}
    </div>
    @endif
</div>
<br>


<!--Creación de tabla-->
<div class="vent !important">
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Nombre de usuario</th>
            <th scope="col">Correo electrónico</th>
            <th scope="col" class="text-center" >Editar</th>
            <th scope="col" class="text-center" >Eliminar</th>
            
        </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr class="table-primary">
            <td>{{$usuario->nameUser}}</td>
            <td>{{$usuario->correo}}</td>
                
            <td class="text-center">
                <a class="btn btn-success"
                    href=""><i class="bi bi-pencil-square"></i>Editar</a>
            </td>

            <td class="text-center">
                    <a class="redondo btn btn-danger" href="" >
                        <i class="fas fa-minus-circle"></i>Eliminar
                    </a>
                </td>
                   
            @empty
            <tr>
            <th scope="row" colspan="5"> No hay resultados</th>
            </tr>
            @endforelse
            
        </tbody>
    </table>
    
</div>

  
</div>

<style>
    .vent {
        border-top: 1px solid #E6E6E6 ;
        border-left: 1px solid #E6E6E6 ;
        border-right: 1px solid #E6E6E6;
        border-bottom: 1px solid #E6E6E6 ;
        padding: 20px;
        background-color: #E0F8F7;
        position:relative;
    }

    .vent{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }



</style>
@endsection
