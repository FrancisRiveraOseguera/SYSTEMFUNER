@extends('madre')

@section ('title' , 'Listado de ventas')

@section('content')


<div class="vent">

    <div class="xd">
        <h3>Listado de ventas al contado</h3>
 
<div>
    <br>
    <a class="btn btn-info btn block" href="{{route('VentaContado.nueva')}}">
        <i class="bi bi-plus-circle"></i>Nueva venta al contado</a>
    </div>
</div>

<!--Barra de búsqueda-->
<hr>
<form  action="{{route('listadoVentas.index')}}" method="GET" autocomplete="off" class="x">
<div  class="input-group input-group-sm">
    <a type="button" href="{{route('listadoVentas.index')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left-circle"></i></a>
    <input type="search" class="col-sm-9" name="busqueda"
        placeholder="Ingrese el nombre del cliente o empleado para realizar la búsqueda." value="{{$busqueda}}">

    <div class="input-group-append">
        <button type="submit" class="btn btn-primary">Buscar</button>
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
<div class="vent !important">
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Empleado</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" class="text-center">Detalles</th>
            <th scope="col" class="text-center">Contratos</th>
            
        </tr>
        </thead>
        <tbody>
            @forelse($venta as $vent)
            <tr class="table">  
                <td>{{date_format($vent->created_at,"d-m-Y")}}</td>
                <td>{{$vent->clientes->nombres}} {{$vent->clientes->apellidos}}</td>
                <td>{{$vent->responsable}}</td>
                <td>{{$vent->servicios->tipo}}</td>
        
                <td class="text-center">
                    <a class="btn btn-info"
                    href="{{route('contadoVenta.ver', ['id'=>$vent->id])}}"><i class="bi bi-eye"></i>Detalles</a>
                </td>

                <td class="text-center">
                    <a class="btn btn-danger" href="{{route('contadoVenta.pdf', ['id'=>$vent->id])}}"><i class="fas fa-file-pdf"></i>Previsualizar e imprimir contrato</a>
                </td>            

            </tr>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay resultados</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    <!--paginación de la tabla-->
    {{ $venta->links()}}

</div>

<!--estilos-->

    <style>
        .xd{
            width:50%;
        }

        .x{
            width:63.5%;
            float:right;
            padding: 20px;
            position: absolute;
            top: 8%;
            right: 0px;

        }

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
