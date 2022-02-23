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
    <div class="container">
        <div class="container">
            <div class="padre">
                <a href="{{route('Servicio.lista')}}"> 
                    <img src="/assets/producto.png" class="rounded-circle" width="120" height="120">
                </a>
            </div>
        </div><br>

        <div class="text-center hijo">
            <h5 class="section-heading text-uppercase">Servicios</h5>
            <p class="section-subheading text-muted">Ingresa al listado de servicios de la funeraria.</p>
        </div>
    </div>

</div>

<br><div class="invent !important">

    <div class="container">
            <div class="container">
                <div class="padre">
                    <a href="{{route('inventario.index')}}"> 
                        <img src="/assets/inventario.png" class="rounded-circle" width="120" height="120">
                    </a>
            </div>
    </div><br>

    <div class="text-center hijo">
        <h5 class="section-heading text-uppercase">Productos en inventario</h5>
        <p class="section-subheading text-muted">Ingresa al listado de productos en inventario de la funeraria.</p>
    </div>
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
    
    .invent{
        font-style: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .padre{
        padding-left: 470px
    }
    
    .hijo{
        font-size: 18px;
    }

    </style>
    
@endsection