@extends('madre')

@section ('title' , 'Listado de Gastos')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn" data-toggle="modal" data-target="#ModalConTiempo">
</button>

<!-- Modal -->
<div class="modal fade" id="ModalConTiempo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consejo</h5>
      </div>
      <div class="modal-body">
        Para ver los detalles de cada gasto, haz clic en el nombre del responsable.
      </div>
      <div class="modal-footer">
        <p style="font-weight: bold">¡Ten un buen día!</p>
      </div>
    </div>
  </div>
</div>

<div class="formato">
    <div class="row">
        <div class="col-lg-6">
            <h3>Listado de gastos</h3>
        </div>

        <div class="col-lg-2.5">
            @can('Nuevo_gasto')
            <a class="btn btn-info btn block" href="nuevoGasto">
                <i class="bi bi-plus-circle"></i>Nuevo gasto
            </a>
            @endcan
        </div>
        <div class="col-lg-4">
            <td>
                <!-- Button trigger modal-->
                <a class="btn btn-danger" target="_blank" href="{{route('gastos.pdf')}}" data-toggle="modal" data-target="#modalPushG"><i class="fas fa-file-pdf">
                </i>Previsualizar e imprimir reporte de gastos</a>

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
                            <p>Para exportar el reporte de gastos a PDF y poder imprimirlo, haz clíc en el logo de la funeraria ubicado en la parte superior izquierda.</p>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer flex-center">
                            <a href="{{route('gastos.pdf')}}" target="_blank" class="modal-footer btn-info">Imprimir reporte mensual</a>
                            <a href="{{route('listadoGastos.index')}}" target="_blank" class="modal-footer btn" style="background: rgba(255, 172, 149, 0.45); foreground: white; font-size: 14px;" onclick="printDiv('printableArea')">Imprimir búsqueda de gastos</a>
                        </div>
                    </div>
                    </div>
                </div>
            
        </td>
    
        </div>
    </div>

    <!--Barra de búsqueda-->
    <div>
        <br>
        <form  action="{{route('listadoGastos.index')}}" method="GET" autocomplete="off">
            <div   class="input-group input-group-sm">
                <a type="button" href="{{route('listadoGastos.index')}}" class="btn btn-secondary btn-sm">Limpiar</a>

                <input type="search" class="col-sm-6" name="busqueda"
                    placeholder="Ingrese el tipo de gasto o responsable para realizar la búsqueda." value="{{$busqueda}}">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        Buscar
                    </button>
                </div>
            </div>
        <br>
        <br>

        <!--Búsqueda por fecha-->
        <div class="input-group input-group-sm">
            <label for="">Desde:</label>
            &nbsp;&nbsp;&nbsp;
            <input type="date" name="inicio" id="inicio" min="{{$fecha->inicio}}" max="{{$fecha->final}}" 
            value="{{$inicio}}" onchange="minimo();">
            &nbsp;&nbsp;&nbsp;
            <label for="">Hasta: </label>
            &nbsp;&nbsp;&nbsp;
            <input type="date" name="final" id="final" min="{{$fecha->inicio}}" max="{{$fecha->final}}" 
            value="{{$final}}" onchange="maximo();">
            &nbsp;&nbsp;&nbsp;
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>
                <a type="button" href="{{route('listadoGastos.index')}}" 
                class="btn btn-secondary btn-sm">Limpiar</a>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <label for=""><b>Total de gastos: </b></label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" disabled class="col-sm-2" value="L. {{number_format($suma->total,2)}}">
        </div>
    </form>
</div><br>

<!--SCRIPTS-->
<script>
    function minimo() {
    var value = $("#inicio").val();
    $("#final").attr("min", value);
    }
    function maximo() {
    var value = $("#final").val();
    $("#inicio").attr("max", value);
    }
</script>

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

<script>
    $(document).ready(function(){
    setTimeout(function(){
        $('#ModalConTiempo').modal('show');
    }, 2500);
    });

    $(document).ready(function(){
    setTimeout(function(){
        $('#ModalConTiempo').modal('hide');
    }, 6000);
    });
</script>

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
    <img src="/assets/logo.png" class="rounded-circle" style="width: 50px; height: 50px; margin-left: 31%; position: absolute"><div style="text-align: center; font-weight: bold;">REPORTE DE GASTOS<br>
    FUNERALES LA BENDICIÓN</div></br>
    <table class="table">
        <thead>
            <tr>
                <tr class="table-info">
                    <th scope="col">Fecha</th>
                    <th scope="col">Tipo de gasto</th>
                    <th scope="col">Total gastado</th>
                    <th scope="col">Responsable</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            @forelse($gasto as $gast)
            <tr class="table-primary">
                <td>{{date('d-m-Y',strtotime($gast->fecha))}}</td>
                <td>{{$gast->tipo_gasto}}</td>
                <td>L.{{number_format($gast->cantidad,2)}}</td>
                <td> <a title="Detalles del gasto" href="{{route('gastos.ver', ['id'=>$gast->id])}}">{{$gast->empleados->nombres}} {{$gast->empleados->apellidos}}</a></td>
                </td>
            @empty
            <tr>
                <th scope="row" colspan="5"> No hay gastos</th>
            </tr>
            @endforelse

        </tbody>
    </table>
    {{$gasto->links()}}
</div>

@endsection
