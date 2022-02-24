@extends('madre')

@section ('title' , 'Productos en inventario')

@section('content')


<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de productos de inventario</h3>
        </div>

        <div class="col-lg-2.5 hijo">
            <a class="btn btn-info btn block" href="{{route('inventario.create')}}"><i class="bi bi-plus-circle"></i>Agregar a inventario</a>
        </div>
    <div class="col-lg-2.5 hijo">
            <a class="btn btn-secondary btn block" href=""><i class="bi bi-card-checklist"></i>Ver todos los registros</a>
        </div>
    </div>


<!--Barra de búsqueda-->
<div>
    <br>
    <form  action="{{route('inventario.index')}}" method="GET" autocomplete="off">
        <div   class="input-group input-group-sm">
            <a type="button" href="{{route('inventario.index')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i></a>

            <input type="search" class="col-sm-6" name="busqueda"
                placeholder="Ingrese el tipo o categoria del producto para realizar la búsqueda" value="{{$busqueda}}">

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
<div class="invent !important">
<table class="table">
    <thead>
    <tr>
        <tr class="table-info">
        <th scope="col">Tipo</th>
        <th scope="col">Categoría</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Responsable</th>
        <th scope="col">Detalles del producto</th>
        <th scope="col">Agregar más productos</th>
    </tr>
    </thead>
    <tbody>
    @forelse($producto as $prod)
    <tr>    
        <td>{{$prod->tipo}}</td>
        <td>{{$prod->categoria}}</td>
        <td>{{$prod->cantidad}}</td>
        <td>{{$prod->responsable}}</td>

        <td>
            <a class="btn btn-info" 
            href="{{route('producto.ver', ['id'=>$prod->id])}}"><i class="bi bi-eye"></i>Detalles</a>
        </td>

        <td>
            <a class="btn btn-success" 
            href="{{route('producto.edit', ['id'=>$prod->id])}} "><i class="bi bi-plus-circle"></i>Agregar productos</a>
        </td>

    @empty
    <tr>
    <th scope="row" colspan="5"> No hay productos</th>
    </tr>
    @endforelse
    </tbody>
    </table>
    {{ $producto->links()}}



    <style>

    .invent {
    border-top: 1px solid #E6E6E6 ;
    border-left: 1px solid #E6E6E6 ;
    border-right: 1px solid #E6E6E6;
    border-bottom: 1px solid #E6E6E6 ;
    padding: 20px;
    background-color: #E0F8F7;
    position:relative;
    }
    
    .invent{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .padre{
        padding-left: 470px
    }

    .hijo{
        padding-left: 20px;
    }

    </style>
    
@endsection