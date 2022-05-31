@extends('madre')

@section ('title' , 'Pantalla principal de ventas')

@section('content')

   <div class="formato">
       <div class="form-group row">
           <div class="col-lg-6">
               <h3 class="ml-3">Ventas</h3>
           </div>
           <div class="col-lg-3">
               <a class="btn btn-info btn block" href="{{route('VentaContado.nueva')}}">
                   <i class="fas fa-donate"></i>Nueva venta al contado
               </a>
           </div>
           <div class="col-lg-3">
               <a class="btn btn-info btn block" href="{{route('ventaCredito.nueva')}}">
                   <i class="fas fa-file-invoice-dollar"></i>Nueva venta al crédito
               </a>
           </div>
       </div>

       <div class="container">
           <div class="card-deck mt-4">

               <div class="card text-center border-info">
                   <div class="card-body">
                       <img src="/assets/ventas.png" alt="Ventas totales" width="100%">
                       <h4 class="card-title">Todas las ventas</h4>
                       <p class="card-text">En esta sección puede ver las ventas al contado
                           y al crédito que se han realizado.</p>
                       <a href="{{route('listadotodaslas.ventas')}}" class="btn btn-primary">Ver</a>
                   </div>
               </div>

               <div class="card text-center border-info">
                   <div class="card-body">
                       <img src="/assets/ventasContado.png" alt="Ventas al contado" width="100%">
                       <h4 class="card-title">Ventas al contado</h4>
                       <p class="card-text">En esta sección puede ver el listado de las ventas al contado.</p>
                       <a href="{{route('listadoVentas.index')}}" class="btn btn-primary">Ver</a>
                   </div>
               </div>

               <div class="card text-center border-info">
                   <div class="card-body">
                       <img src="/assets/ventasCredito.png" alt="Ventas al crédito" width="100%">
                       <h4 class="card-title">Ventas al crédito</h4>
                       <p class="card-text">En esta sección puede ver el listado de las ventas al crédito.</p>
                       <a href="{{route('ventasCredito.index')}}" class="btn btn-primary">Ver</a>
                   </div>
               </div>
           </div>
       </div>
   </div>

    <style>
        .formato {
            border-top: 1px solid #E6E6E6 ;
            border-left: 1px solid #E6E6E6 ;
            border-right: 1px solid #E6E6E6;
            border-bottom: 1px solid #E6E6E6 ;
            padding: 20px;
            background-color: #E0F8F7;
            position:relative;
            font-style: bold;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
@endsection
