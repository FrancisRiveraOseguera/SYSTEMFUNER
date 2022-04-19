@extends('madre')

@section ('title' , 'Listado de usuarios')

@section('content')

<div class="vent">
    
        <h3> Listado de usuarios</h3> 
    
    <div>
    <br>
    <a class="btn btn-info btn block"  href="{{route('usuarios.create')}}"><i class="bi bi-plus-circle"></i>Nuevo usuario</a>
    
</div>
<hr>
<br>
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
            <th scope="col">Cargo</th>
            <th scope="col" class="text-center" >Editar</th>
            <th scope="col" class="text-center" >Eliminar</th>
            
        </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr class="table-primary">
            <td>{{$usuario->nameUser}}</td>
            <td>{{$usuario->correo}}</td>
            <td>{{$usuario->cargo}}</td>
                
            <td class="text-center">
                <a class="btn btn-success"
                    href="{{route('usuario.edit', ['id'=> $usuario->id])}}"><i class="bi bi-pencil-square"></i>Editar</a>
            </td>

            <td class="text-center">
                <form method="post" action="{{route('usuario.borrar',['id'=>$usuario->id])}}">
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
                                    <p class="heading">Eliminar usuario</p>
                                </div>
    
                                <!--Body-->
                                <div class="modal-body">
                                    <p>¿Seguro que deseas eliminar el usuario?</p>
                                </div>
    
                                <!--Footer-->
                                @csrf
                                @method('delete')
    
                                <div class="modal-footer flex-center">
                                    <button type="submit" class="modal-footer btn btn-info">Aceptar</button>
                                    <a class="modal-footer btn btn-danger" href="{{route('listado.usuario')}}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
                   
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

    .modal-header{
        font-size: 20px;
        background-color: #1CB6E9;
        color: #FFFFFF;
    }
    .modal-body{
        font-size: 15px;
    }
    .modal-footer{
        font-size: 15px;
    }


</style>
@endsection
