@extends('madre')

@section ('title' , 'Listado de clientes deudores')

@section('content')

<div class="formato">
    <div class="row col-lg-12">
        <h3 class="col-lg-7">Listado de clientes deudores</h3>

        <a class="btn btn-primary"  href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>

        <!-- Button trigger modal-->
        @can('PDF_deudores')
        <a class="ml-3 btn btn-danger" target="_blank" href="{{route('clientesDeudores.PDF')}}" data-toggle="modal" data-target="#modalPushG">
            <i class="fas fa-file-pdf"></i>Imprimir reporte de clientes deudores
        </a>
        @endcan

        <!--Modal: modalPush-->
        <div class="modal fade" tabindex="1" id="modalPushG" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading">Un momento...</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <i class="pdf fas fa-file-pdf fa-4x mb-4"></i>
                        <p>Para exportar el reporte de clientes deudores a PDF y poder imprimirlo, haz clic en el logo de la funeraria ubicado en la parte superior izquierda.</p>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <a href="{{route('clientesDeudores.PDF')}}" target="_blank" class="modal-footer btn-info">Imprimir reporte</a>
                        <a href="{{route('cliente.deudor')}}" target="_blank" class="modal-footer btn" style="background: rgba(255, 172, 149, 0.45); foreground: white; font-size: 14px;" onclick="printDiv('printableArea')">Imprimir búsqueda de clientes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Barra de búsqueda-->
    <div class="col-lg-7">
        <br>
        <form  action="{{route('cliente.deudor')}}" method="GET" autocomplete="off" >
            <div  class="input-group input-group-sm">
                <a type="button" href="{{route('cliente.deudor')}}" class="btn btn-secondary btn-sm">Limpiar</a>

                <input type="search" class="col-sm-9" name="busqueda"
                       placeholder="Ingrese el nombre del cliente para realizar la búsqueda." value="{{$busqueda}}">

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
</div>
<br>


<!--Creación de tabla-->
<div class="formato !important" id="printableArea">
    <img src="/assets/logo.png" class="rounded-circle" style="width: 50px; height: 50px; margin-left: 31%; position: absolute" alt="Logo">
    <div class="ml-4" style="text-align: center; font-weight: bold;">
        REPORTE DE CLIENTES DEUDORES<br>
        FUNERALES LA BENDICIÓN
    </div><br>
    <table class="table" >
        <thead>
        <tr>
            <tr class="table-info">
            <th scope="col">Fecha de venta</th>
            <th scope="col">Nombre del cliente</th>
            <th scope="col">Teléfono del cliente</th>
            <th scope="col">Tipo de servicio</th>
            <th scope="col" >Saldo pendiente</th>
            <th scope="col" >Último pago</th>

        </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                @if($venta->pagar > 0)
                    @if($venta->estado==1)
                        <tr class="table-primary">
                    @elseif($venta->estado==0)
                        <tr class="table-danger">
                    @endif
                        <td>{{$venta->created_at}}</td>
                        <td>{{$venta->nombres}} {{$venta->apellidos}}</td>
                        <td>{{$venta->telefono}}</td>
                        <td>{{$venta->tipo}}</td>
                        <td>L.{{number_format($venta->pagar,2)}}</td>
                        <td class="text-danger">{{$venta->ultimo}}</td>
                    </tr>
                @endif
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay resultados</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$ventas->links()}}
</div>
<script>
    function printDiv(divName) {
        var originalContents = document.body.innerHTML;
        var printContents = document.getElementById(divName).innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.reload(true)
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
