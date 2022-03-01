@extends('madre')

@section ('title' , 'Productos en inventario')

@section('content')

<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Listado de productos en inventario</h3>

            <div class="col-lg-3 hijo">
            <a class="btn btn-primary btn block" href="{{route('historialinventario.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar </a>
        </div>
        </div>

<<<<<<< HEAD
         
    </div>

=======
>>>>>>> 52aa7cea7f06f390433cd1643cefff418deae5b1
<!--Barra de búsqueda-->
<div>
    <br>
    <form  action="" method="GET" autocomplete="off">
        <div   class="input-group input-group-sm">
            <a type="button" href="" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i></a>

            <input type="search" class="col-sm-6" name="busqueda"
                placeholder="Ingrese el tipo o categoria del producto para realizar la búsqueda" value="">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>
</div>
<hr>    
<!--Creación de tabla-->

 <br>
 <table class="table ">
  <thead>
    <tr class="table-info">
      <th scope="col">Código</th>
      <th scope="col">Tipo</th>
      <th scope="col">Categoría</th>
      <th scope="col" >Precio</th>
      <th scope="col">Cantidad </th>
      <th scope="col">Costo Total</th>
      
      
    </tr>
  </thead>
  <tbody>     
  @foreach($inventario as $producto)
    
    <tr class="table-primary"> 
      <td>{{$producto->servicio_id}}</td>
      <td>{{$producto->tipo}}</td>
      <td>{{$producto->categoria}}</td>
      <td>{{$producto->precio}}</td>
      <td>{{$producto->cantidad}}</td>
      <td>{{$producto->precio*$producto->cantidad}}</td>
      
 @endforeach 
      
  </tbody>
</table>
 

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