@extends('madre')
@section('title', 'Detalles de Inventario')

@section('content')

    <div class="emple">
        <h3> Detalles del producto</h3>
        <hr>
    <div class="emple">
        <form method="post" action="">
            @csrf
            <div class="form-group row">
                <label for="tipo" class="col-lg-2 control-label offset-md-1 requerido hijo">
                    <i id="IcDV" class="bi bi-card-list"></i>Tipo:</label>
                <div class="col-sm-8">
                  {{$Inventario->tipo}}
                </div>
            </div>

            <div class="form-group row">
                <label for="categoria" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcDV" class="bi bi-view-stacked"></i>Categoría:</label>
                <div class="col-sm-8">
                 {{$Inventario->categoria }}
                </div>
            </div>

        
        
            <div class="form-group row">
                <label for="responsable" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcDV" class="bi bi-person-fill"></i>Responsable:</label>
                <div class="col-sm-8">
                    {{$Inventario->responsable}}
                </div>
            </div>

            <?php $fecha_actual = date("d-m-Y");?>

            <div class="form-group row">
                <label  for="fecha_ingreso"  class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i id="IcDV" class="bi bi-calendar-date"></i>Fecha de Ingreso:</label>
                <div class="col-sm-8">
                   {{$Inventario->fecha_ingreso}}
                </div>
            </div>

            <div class="form-group row">
                <label for="cantidad_actual" class="col-lg-2 control-label offset-md-1 requerido hijo">
                <i  id="IcDV" class="bi bi-clipboard-check"></i>Cantidad Actual:</label>
                <div class="col-sm-8">
                   {{$Inventario->cantidad_actual}}
                </div>
            </div>

            <div class="form-group row">
                    <label for="detalles" class="col-lg-2 control-label offset-md-1 requerido hijo">
                        <i id="IcDV" class="bi bi-pencil-square"></i>Descripción:
                    </label>
                    <div class="col-sm-8">
                        <textarea  name="detalles"  id="detalles" disabled
                                   cols="52" rows="2" >{{$Inventario->descripcion}}
                        </textarea>
                    </div>
                </div>

          

            <!--REGRESAR A PANTALLA PRINCIPAL EMPLEADO-->
            <a class="btn btn-primary" href="{{route('inventario.index')}}" > <i class="bi bi-box-arrow-left"></i>Regresar</a>

        </form>

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

            .hijo{
                font-weight: bold;
            }

            #IcDV{
        font-size:20px; 
        width: 1em;
        height: 1em;
    }
        </style>

@endsection