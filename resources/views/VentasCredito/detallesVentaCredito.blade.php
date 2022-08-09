@extends('madre')
@section('title','Detalles de venta')

@section('content')

<div class="formato">
    <h3>Detalles de la venta al crédito</h3>
    <hr>

    <!--Mensajes de alerta -->
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif


<!--Datos de la venta al crédito-->
<div class="formato">
    <div class="form-group row">
        <label for="nombre" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i id="IcNewEmp" class="bi bi-person-fill"></i> Nombre del cliente:</label>
        <div class="col-sm-8 mt-2 ml-6 detalle">
            {{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}
        </div>
    </div>

    <div class="form-group row">
            <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-person-workspace"></i> Empleado responsable:</label>
        <div class="col-sm-8 mt-2 ml-6">
        {{$venta->empleados->nombres}} {{$venta->empleados->apellidos}}
        </div>
    </div>

    <div class="form-group row">
        <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i id="IcNewEmp" class="bi bi-list-stars"></i>Tipo de servicio comprado:</label>
        <div class="col-sm-8 mt-2 ml-6">
        {{$venta->servicios->tipo}}
        </div>
    </div>

    <div class="form-group row">
        <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i id="IcNewEmp" class="bi bi-wallet2"></i>Valor total del servicio:</label>
        <div class="col-sm-8 mt-2 ml-6">
            L.{{number_format($venta->servicios->precio, 2)}}
        </div>
    </div>

    <div class="form-group row">
        <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i id="IcNewEmp" class="fas fa-hand-holding-usd"></i> Valor pagado de la prima:</label>
        <div class="col-sm-8 mt-2 ml-6">
            L.{{number_format($venta->servicios->prima, 2)}}
        </div>
    </div>

    <div class="form-group row">
        <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i id="IcNewEmp" class="fas fa-money-bill-wave"></i> Valor mínimo de la cuota:</label>
        <div class="col-sm-8 mt-2 ml-6">
            L.{{number_format($venta->servicios->cuota, 2)}}
        </div>
    </div>

    <div class="form-group row">
        <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i id="IcNewEmp" class="bi bi-cash-stack"></i> Cobro:</label>
        <div class="col-sm-8 mt-2 ml-6">
            Mensual
        </div>
    </div>

    <div class="form-group row ">
        <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i  id="IcNewEmp" class="bi bi-calendar-month"></i> Fecha de venta:</label>
        <div class="col-sm-8 mt-2 ml-6">
            {{date_format($venta->created_at,"d/m/Y")}}
        </div>
    </div>

    <div class="form-group row ">
        <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°1:</label>
        <div class="col-sm-8 mt-2 ml-6">
            {{$venta->beneficiario1}}
        </div>
    </div>

    <div class="form-group row ">
        <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
        <div class="col-sm-8 mt-2 ml-6">
            {{$venta->telefono1}}
        </div>
    </div>

    <div class="form-group row ">
        <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°2:</label>
        <div class="col-sm-8 mt-2 ml-6">
            {{$venta->beneficiario2}}
        </div>
    </div>

    <div class="form-group row ">
        <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
            <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
        <div class="col-sm-8 mt-2 ml-6">
            {{$venta->telefono2}}
        </div>
    </div>

    @if($venta->beneficiario3 != "")
        <div id="divBeneficiario3">
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°3:</label>
                <div class="col-sm-8 mt-2 ml-6">{{$venta->beneficiario3}}</div>
            </div>

            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
                <div class="col-sm-8 mt-2 ml-6">{{$venta->telefono3}}</div>
            </div>
        </div>
    @endif

    @if($venta->beneficiario4 != "")
        <div id="divBeneficiario4">
            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-person-check-fill"></i> Beneficiario N°4:</label>
                <div class="col-sm-8 mt-2 ml-6">{{$venta->beneficiario4}}</div>
            </div>

            <div class="form-group row ">
                <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i  id="IcNewEmp" class="bi bi-telephone-forward"></i> Teléfono del beneficiario:</label>
                <div class="col-sm-8 mt-2 ml-6">{{$venta->telefono4}}</div>
            </div>
        </div>
    @endif

    <br>
    <!--botones-->
    <div class="row">
        <a class="btn btn-primary" href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>

        <div class="mr-2 ml-2">
            <!-- Button trigger modal-->
            <a class="btn btn-danger" href="{{route('creditoVenta.pdf', ['id'=>$venta->id])}}" data-toggle="modal" data-target="#modalPush{{$venta->id}}"><i class="fas fa-file-pdf"></i>Imprimir contrato</a>

            <!--Modal: modalPush-->
            <div class="modal fade" tabindex="1" id="modalPush{{$venta->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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
                            <p>Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria ubicado en la parte superior izquierda.</p>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer flex-center">
                            <a href="{{route('creditoVenta.pdf', ['id'=>$venta->id])}}" class="modal-footer btn-primary">¡Entendido!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($venta->estado==1)
        <div>
            <a class="redondo btn btn-secondary" href="" data-toggle="modal" data-target="#modal1{{$venta->id}}">
                <i class="fas fa-minus-circle"></i>Marcar como servicio usado
            </a>

            <!--Modal: modalPush-->
            <div class="modal fade" tabindex="1" id="modal1{{$venta->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-info" role="document">
                    <!--Content-->
                    <div class="modal-content text-center">
                        <!--Header-->
                        <div class="modal-header d-flex justify-content-center">
                            <p class="heading">Marcar como servicio usado</p>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                        @if( $servicio != null)
                            @if($servicio->cantidad > 0)
                                <p>Seleccione el servicio para marcar como servicio usado</p>

                                <a class="btn btn-info" href="{{route('creditoVenta.marcarServicio', ['id'=>$venta->id, 'idServicio'=>$venta->servicio_id])}}">
                                    {{$servicioTipo->tipo}}
                                </a>

                            @elseif ($servicio->cantidad == 0)
                                <p>Actualmente no hay existencias en inventario de este servicio.
                                    ¿Desea seleccionar otro tipo de servicio para marcar esta venta?</p>

                                @foreach($serviciosEnInventario as $servi)
                                    <tr class="table">
                                        <td>
                                            @if($servi->cantidad > 0)
                                            <a class="btn btn-info"  href="{{route('creditoVenta.marcarServicio', ['id'=>$venta->id, 'idServicio'=>$servi->servicio_id])}}">
                                                {{$servi->tipo}}
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            <p>Actualmente no hay existencias en inventario de este servicio.
                                ¿Desea seleccionar otro tipo de servicio para marcar esta venta?</p>
                            @foreach($serviciosEnInventario as $servi)
                                <tr class="table">
                                    <td>
                                        @if($servi->cantidad > 0)
                                            <a class="btn btn-info"  href="{{route('creditoVenta.marcarServicio', ['id'=>$venta->id, 'idServicio'=>$servi->servicio_id])}}">
                                                {{$servi->tipo}}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </div>

                        <!--Footer-->
                        <div class="modal-footer flex-center">
                            <a class="modal-footer btn btn-danger" href="{{route('ventaCredito.ver', ['id'=>$venta->id])}}">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
