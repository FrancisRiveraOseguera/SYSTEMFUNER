<!DOCTYPE html>
<html lang="esp">
   <!-- <script language="javascript">alert("Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria.")</script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Reporte de clientes deudores</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href="../../css/style.css" rel="stylesheet" type="text/css" >
   <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
   <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <link rel="icon" type="image/x-icon" href="/assets/page-logo.png"/>
   <script src="/icons.js"></script>

   <!-- jQuery -->
   <script src="../../js/jquery.min.js"></script>

   <!-- select2 css -->
   <link href='../../css/select2.min.css' rel='stylesheet' type='text/css'>

   <!-- select2 script -->
   <script src='../../js/select2.min.js'></script>
   <!-- Libreria español -->
   <script src="../../js/i18n/es.js"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@2.15.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="../../js/script.js"></script>
   <script src="../../js/htmlpdf.js"></script>

    <body>
        <img src="/assets/logo_contrato.png" title="Exportar a PDF e imprimir" class="rounded-circle logo" id="btn" width="120" height="100">
        <div class="sh">
            <br>
            <h3><b>REPORTE DE CLIENTES DEUDORES</b></h3>
            <br>
            <h3><b>FUNERALES LA BENDICIÓN</b></h3>
            <hr>
        </div>

        <table class="table">
            <thead>
                <tr class="table"  style="width: 1000px;">
                    <th scope="col">Fecha de venta</th>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Teléfono del cliente</th>
                    <th scope="col">Tipo de servicio</th>
                    <th scope="col" >Saldo pendiente</th>
                    <th scope="col" >Último pago</th>
                </tr>

                @forelse($deudores as $deudor)
                <tr class="table">
                    <td>{{$deudor->created_at}}</td>
                    <td>{{$deudor->nombres}} {{$deudor->apellidos}}</td>
                    <td>{{$deudor->telefono}}</td>
                    <td>{{$deudor->tipo}}</td>
                    <td>L.{{number_format($deudor->pagar,2)}}</td>
                    <td class="text-danger">{{$deudor->ultimo}}</td>
                </tr>
                @empty
                <tr>
                    <th scope="row" colspan="5">No hay resultados</th>
                </tr>
                @endforelse
            </thead>
        </table>
    </body>

    <style>
        .logo{
            position: absolute;
            margin-left: 100px;

        }
        body{
            margin-top:70px;
            margin-left:30px;
            margin-right:30px;
            border-radius: 20px;
            -moz-user-select: none;
            user-select: none;
        }
        .sh{
            text-align: center;
            font-family: 'Times New Romans', "serif";
            margin-top:25px;
        }
        hr{
            height:3px;
            background-color: #000000;
            border: 20px;
            margin-left:30px;
            margin-right:30px;
        }
    </style>
</html>
