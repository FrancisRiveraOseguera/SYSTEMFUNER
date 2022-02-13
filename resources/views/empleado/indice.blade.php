@extends("madre")

@section ('title' , 'Lista de Empleados');

@section('content')

<!--Mensajes de alerta -->
@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif



<div class="emple">

    <div class="row">
        <div class="col-lg-7">
            <h3> Lista de Empleados</h3> 
        </div>
        
        <div class="col-lg-2.5">
            <a class="btn btn-primary btn block" href="{{route('empleado.nuevo')}}"><i class="bi bi-plus-circle"></i>Nuevo Empleado</a>
        </div>
        <div class="col-lg-3">
            <a class="btn btn-info btn block" href="">Empleado Desactivado</a>
        </div>
    </div>


<!--Barra de búsqueda-->
<br>
<form action="{{route('empleado.index')}}" method="GET">
    <div class="input-group input-group-sm">
        <a type="button" href='empleado' class="btn btn-info btn-sm"><i class="bi bi-arrow-left-circle"></i></a>

        <input type="search" class="form-control" name="busqueda"
            placeholder="Ingrese el nombre o identidad del empleado, para realizar la busqueda" value="{{$busqueda}}">

        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                Buscar
            </button>
        </div>
    </div>
</form>
<br>
<!--Creación de tabla-->

<table class="table table-bordered table-hover table-striped" id="tabla-data">
    <thead>
    <tr>
        
        <th scope="col">Identidad</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Dirección</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Detalles</th>
        <th scope="col">Editar</th>
        <th scope="col">Desactivar</th>
    </tr>
    </thead>
    <tbody>
    @forelse($empleado as $emple)
    <tr>    
        <td>{{$emple->DNI_empleado}}</td>
        <td>{{$emple->nombres}}</td>
        <td>{{$emple->apellidos}}</td>
        <td>{{$emple->direccion}}</td>
        <td>{{$emple->telefono}}</td>


        <td>
            <a class="btn btn-info" 
            href=""><i class="bi bi-eye"></i>Detalles</a>
        </td>

        <td>
            <a class="btn btn-success" 
                href=""><i class="bi bi-pencil-square"></i>Editar</a>
        </td>
        <td>
            <a class="btn btn-danger" 
                        href=""><i class="bi bi-dash-circle"></i>Desactivar</a>
        </td>
    </tr>
    @empty
    <tr>
    <th scope="row" colspan="5"> No hay empleados</th>
    </tr>
    @endforelse
    </tbody>
    </table>
    {{ $empleado->links()}}


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