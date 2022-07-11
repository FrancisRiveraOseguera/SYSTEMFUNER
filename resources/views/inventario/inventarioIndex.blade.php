@extends('madre')

@section ('title' , 'Inventario')

@section('content')


<div class="invent">
    <div class="row">
        <div class="col-lg-7">
            <h3>Pantalla principal de inventario</h3> 
        </div>
    </div>

<!--Mensajes de alerta -->
@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif
</div><br>

<div class="invent !important">
    @can('Listado_servicios')
    <a href="{{route('Servicio.lista')}}"><img src="/assets/producto.png" class="rounded-circle bs servicios" width="120" height="120"></a>
    @endcan
    @can('Listado_inventario')
    <a href="{{route('historialinventario.index')}}"><img src="/assets/inventario.png" class="rounded-circle bs inventario" width="120" height="120"></a><br><br>
    @endcan

    <a style="margin-left:12%; font-size: 15px;">INGRESAR A SERVICIOS</a>
    <a style="margin-left:40%; font-size: 15px;">INGRESAR A INVENTARIO</a><br>

    <a style="margin-left:9%; font-size: 14px; color:#808080">Ingresa al listado de servicios de la funeraria.</a>
    <a style="margin-left:28%; font-size: 14px; color:#808080">Ingresa al listado de productos en inventario de la funeraria.</a>

</div>

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

    .inventario{
        margin-left: 45%;
    }

    .servicios{
        margin-left: 15%;
    }
    
    .invent{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .padre{
        -moz-user-select: none;
        user-select: none;
    }
    
    .hijo{
        font-size: 18px;
        -moz-user-select: none;
        user-select: none;
    }

    .bs:active{
        box-shadow: 0px 8px 0px #99d6ff;
        position:relative;
        top:10px;
        cursor: pointer;
    }

    </style>
    
@endsection