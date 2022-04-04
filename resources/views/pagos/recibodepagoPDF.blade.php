<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT identidad, nombres, apellidos, ocupacion, direccion, telefono FROM clientes");
    $query1=mysqli_query($mysqli,"SELECT tipo, precio FROM servicios");
?>

<!DOCTYPE html>
<html>
   <!-- <script language="javascript">alert("Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria.")</script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Previsualización Recibo de Pago</title>
    
    <body>
        
        <img src="/assets/logo_contrato.png" title="Exportar a PDF e imprimir" class="rounded-circle logo" id="btn" width="80" height="60">
        <div class="sh">
            <h3 style="text-align: center; font-size:18px; "><b>FUNERALES LA BENDICIÓN</h3></b>
        </div>
        
        <div class="shb">
            OFICINAS<br>
            Bº Abajo salida a Tegucigalpa, frente a Ferreteria Santa Fé, Danlí, El Paraíso<br>
            Teléfono: 2763-6520 | Email: funeralesbendicionhn@gmail.com
        </div><hr>

        <div class="shb2">
           <b>Pago de cuota de Póliza de servicio Funerario tipo:</b> <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$Pagos->ventas->servicios->tipo}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> <br><br>
           <b>A nombre de:</b> <u>&nbsp;&nbsp;{{$Pagos->ventas->clientes->nombres}} {{$Pagos->ventas->clientes->apellidos}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
           <b> Con identidad:</b> <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$Pagos->ventas->clientes->identidad}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
           <br> <br><b> La Cantidad de:</b> <u>{{$Pagos->cuota}} Lempiras Exactos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u>  <b> 
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;realizado en la fecha: </b> {{$Pagos->created_at->format(' d-m-Y')}}<br><br>
            <b>Saldo pendiente: L.{{$total->total}}.00</b> 
            <br>
            <div>
            <a class="line1">_________________________</a><br>
            <a class="frm1"><b>Colector</b></a>
            </div>
           

        </div>
        
        
        
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
        <script src="../../js/htmlpdf2.js"></script>
        
    </body>

    <style>
        .date1{
            font-size: 13px;
            margin-left: 28px;
        }
        .date2{
            font-size: 14px;

        }
        .title{
            font-size: 14px;
        }
        .line1{
            margin-left: 60%;
        }
        .frm1{
            margin-left: 72%;
            font-size: 12px;
        }
        .logo{
            position: absolute;
            margin-left: 10px;
            margin-top: 5px;
        }
        body{
            /*border-width:3px;
            border-color: black;
            border-style: solid;*/
            margin-top:70px;
            margin-left:30px;
            margin-right:30px;
            border-radius: 20px;
            -moz-user-select: none;
            user-select: none;
        }
       
        .modal{
            width: 100%;
            height: 100vh;
            background rgba(0,0,0,0, 0.6);
            position: absolute;
        }
      
    
        hr{
            height:1px;
            background-color: #000000;
            border: 10px;
            margin-left:10px;
            margin-right:10px;
        }

        .shb{
            font-weight: normal;
            text-align: center;
            font-size:10px;
            font-family: 'Times New Romans';
        }

        .shb2{
            margin-left:10px;
            font-weight: normal;
            text-align: left;
            font-size:13px;
            font-family: 'Times New Romans';
        }

       
        .serv{
            margin-left: 26px;
            text-align: center;
            text-weight: bold;
            font-family: 'Times New Romans'
        }
        
    </style>
</html>