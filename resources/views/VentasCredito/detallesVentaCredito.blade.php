@extends('madre')
@section('title','Detalles de venta')

@section('content')

<div class="emple">
    <h3> Detalles de venta al crédito</h3>
    <hr>

    <!--Formulario para ver  los datos del cliente-->
    <div class="emple">
    <form method="post" action="" autocomplete="off">
        @csrf
        <div class="form-group row">
            <label for="nombre" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-credit-card-2-front"></i>Nombre del cliente:</label>
            <div class="col-sm-8 mt-2 ml-6 detalle">
                {{$creditoventa->clientes->nombres}} {{$creditoventa->clientes->apellidos}}
            </div>
        </div>

        <div class="form-group row">
                <label for="nombres" class="col-lg-3 control-label offset-md-1 requerido hijo">
                    <i id="IcNewEmp" class="bi bi-person-fill"></i>Empleado responsable:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$creditoventa->responsable}}
            </div>
        </div>        

        <div class="form-group row">
            <label for="servicio_id" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i id="IcNewEmp" class="bi bi-list-stars"></i>Tipo de servicio comprado:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{$creditoventa->servicios->tipo}}
            </div>
        </div>

        <?php $fecha_actual = date("d-m-Y");?>
        <div class="form-group row ">
            <label for="fecha" class="col-lg-3 control-label offset-md-1 requerido hijo">
                <i  id="IcNewEmp" class="bi bi-calendar-month"></i>Fecha de venta:</label>
            <div class="col-sm-8 mt-2 ml-6">
                {{date_format($creditoventa->created_at,"d/m/Y")}}
            </div>
        </div><hr>

        <div class="form-group benef" title="Haz clic en el botón para ver a los beneficiarios, y clic nuevamente para ocultarlos.">
            <a class="hijo requerido" data-toggle="collapse" href="#collapseBeneficiario" role="button" aria-expanded="false" aria-controls="collapseBeneficiario">
                <i class="bi bi-person-plus">  Información de los beneficiarios:</i>
            </a><br>

            <div>
                <div class="collapse row md-6" id="collapseBeneficiario">
                    <div class="form-group col">
                        <div class="form-group row">
                            <label for="nombres" class="hijo requerido">
                                <i id="IcNewEmp" class="bi bi-person-fill"></i>Beneficiario 1:</label>
                            <div class="col-sm-8 mt-2 ml-6">
                                    {{$creditoventa->beneficiario1}}
                            </div>
                        </div>
                    
                <div class="form-group row col" id="collapseBeneficiario">
                    <label for="nombres" class="hijo requerido">
                        <i id="IcNewEmp" class="col-sm-4 bi bi-telephone-forward"></i>Tel. beneficiario 1:</label>
                    <div class="col-sm-8 mt-2 ml-6">
                            {{$creditoventa->telefono1}}
                    </div>
                </div><hr>   
            
                <div class="collapse row md-6" id="collapseBeneficiario">
                    <div class="form-group col">
                        <div class="form-group row">
                            <label for="nombres" class="hijo requerido">
                                <i id="IcNewEmp" class="bi bi-person-fill"></i>Beneficiario 2:</label>
                            <div class="col-sm-8 mt-2 ml-6">
                                    {{$creditoventa->beneficiario2}}
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group row col" id="collapseBeneficiario">
                    <label for="nombres" class="hijo requerido">
                        <i id="IcNewEmp" class="col-sm-4 bi bi-telephone-forward"></i>Tel. beneficiario 2:</label>
                    <div class="col-sm-8 mt-2 ml-6">
                        {{$creditoventa->telefono2}}
                    </div>
                </div><hr>

                <div class="collapse row md-6" id="collapseBeneficiario">
                    <div class="form-group col">
                        <div class="form-group row">
                            <label for="nombres" class="hijo requerido">
                                <i id="IcNewEmp" class="bi bi-person-fill"></i>Beneficiario 3:</label>
                            <div class="col-sm-8 mt-2 ml-6">
                                    {{$creditoventa->beneficiario3}}
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group row col" id="collapseBeneficiario">
                    <label for="nombres" class="hijo requerido">
                        <i id="IcNewEmp" class="col-sm-4 bi bi-telephone-forward"></i>Tel. beneficiario 3:</label>
                    <div class="col-sm-8 mt-2 ml-6">
                        {{$creditoventa->telefono3}}
                    </div>
                </div><hr>

                <div class="collapse row md-6" id="collapseBeneficiario">
                    <div class="form-group col">
                        <div class="form-group row">
                            <label for="nombres" class="hijo requerido">
                                <i id="IcNewEmp" class="bi bi-person-fill"></i>Beneficiario 4:</label>
                            <div class="col-sm-8 mt-2 ml-6">
                                    {{$creditoventa->beneficiario4}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row col" id="collapseBeneficiario">
                    <label for="nombres" class="hijo requerido">
                        <i id="IcNewEmp" class="col-sm-4 bi bi-telephone-forward"></i>Tel. beneficiario 4:</label>
                    <div class="col-sm-8 mt-2 ml-6">
                        {{$creditoventa->telefono4}}
                    </div>
                </div><hr>

            </div>
            </div>
            </div>
        </div>

        <div class="col">
            <br><br>
            <!--botones-->
            <a class="btn btn-primary" href="{{route('ventasCredito.index')}}"><i class="bi bi-box-arrow-left"></i>Regresar</a>
        </div>
        
    </form>
    </div>

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
        /*.requerido{
            margin-top:-2px;
        }*/

        .emple{
            font-style: bold;
            font-family: 'Times New Roman', Times, serif;
        }
        .hijo{
            font-weight: bold;
        }
        .benef{
            padding-left: 10%;
        }
        

        #IcNewEmp{
        font-size:25px;
        width: 1em;
        height: 1em;
    }


    </style>


@endsection
