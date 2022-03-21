<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT identidad, nombres, apellidos, ocupacion, direccion, telefono FROM clientes");
    $query1=mysqli_query($mysqli,"SELECT precio FROM servicios");
?>

<!DOCTYPE html>
<html>
   <!-- <script language="javascript">alert("Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria.")</script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Previsualización del Contrato</title>
    
    <body>

        <img src="/assets/logo_contrato.png" title="Exportar a PDF e imprimir" class="rounded-circle logo" id="btn" width="120" height="100">
        <div class="sh">
            <h3><b>PÓLIZA DE SEGUROS FUNERARIOS</h3></b>
            <h3><b>FUNERALES LA BENDICIÓN</h3></b>
        </div>
        
        <div class="shb">
            OFICINAS<br>
            Bº Abajo salida a Tegucigalpa, frente a Ferreteria Santa Fé, Danlí, El Paraíso<br>
            Teléfono: 2763-6520 | Email: funeralesbendicionhn@gmail.com
        </div><hr>

        <div class="contrato">
            Señores de Seguros Funerarios <a class="title"><b>FUNERALES LA BENDICIÓN</b></a><br><br>
            Yo: <a class="hh"><b>{{$contadoventa->clientes->nombres}} {{$contadoventa->clientes->apellidos}}</b></a> con cédula de identidad personal No. <b>{{$contadoventa->clientes->identidad}}</b> de profesión u oficio <a class="hh"><b>{{$contadoventa->clientes->ocupacion}}</b></a> con domicilio en <a class="hh"><b>{{$contadoventa->clientes->direccion}}</b></a> y
            teléfono <b>{{$contadoventa->clientes->telefono}}</b>. Solicito a ustedes atentamente <a class="hh"><b>{{$contadoventa->cantidad_v}}</b></a> póliza(s) de seguro funerario de tipo <a class="hh"><b>{{$contadoventa->servicios->tipo}}</b></a> con un precio total de L. <b>{{$contadoventa->cantidad_v * $contadoventa->servicios->precio}}</b>, con la siguiente descripción: <br><br><b>{{$contadoventa->servicios->detalles}}</b> </b>
        </div>
     
        </div>
            
            <hr><div class="claus1">
                <a class="Note">CLAÚSULAS</a>
            <div class="claus">
                <b>A)</b> El comprador manifiesta que recibe el ataúd a su entera satisfacción, y debidamente informado del estado del mismo y de sus elementos.<br>
                <b>B)</b> El vendedor hace entrega del ataúd al comprador, haciéndose éste responsable, desde este momento, de cuantas cuestiones puedan derivarse del uso o posesión del mismo.<br>
                <b>C)</b> Los demás elementos que incluye el servicio como ser: carretilla, crucifijo, lámparas, floreros, candelabros y capilla, deben ser devueltos a la empresa el día siguiente del sepelio.<br>
                <b>D)</b> El contratante tiene 10 días hábiles para presentarse a la empresa para cancelar el costo en caso de que se presente un daño a los demás elementos que incluye el servicio como ser: lámparas, crucifijo, carretilla, etc.<br>
                <b>E)</b> Para la resolución de las cuestiones que pudieran surgir, derivadas del presente contrato de venta al contado, las partes quedan sometidas a los Juzgados y Tribunales competentes, como lugar de celebración del contrato y cumplimiento de las obligaciones del mismo.<br>
                <b>F)</b> Exclusivamente, el contratante tiene derecho a traslado del cadáver dentro del país, y si fuese para otra persona familiar o particular, mientras sea en el casco urbano, se prestará el traslado convenido, y en caso que sea afuera de la zona, se hará efectivo el pago conforme a la distancia del traslado..<br>
            </div>

            <div class="notes">
                <br><br><a class="notes1">1-La empresa no responde por dinero pagado a otra persona, que no sea el vendedor quien tendrá que mostrar su canet como tal.</a><br>
                <a class="notes1">2-La empresa no se responsabiliza por ofrecimientos verbales, del vendedor, que no están incluidos en el contrato. Por cualquier</a><br> <a class="notes1">duda o sugerencia llámenos o visítenos a nuestras oficinas.</a><br>
                <a class="Note"><b>NOTA</a></b><a class="notes2"> 3-Este contrato se celebra en virtud de que ambas personas, vendedor y contratante, se encuentran en pleno estado físico y mental.</a><br>
                <a class="notes1">4-El asegurado tendrá derecho a platos, vasos, tenedores, café, azúcar y alumbrado.</a><br>
            </div><br><br>
           
            </div>
        </div>

        <div>
            <a class="date1"><b>Hora y fecha de venta:</b></a> <a class="date2">{{$contadoventa->created_at->format('h:iA d-m-Y')}}</a>
        </div><br><br>

        <div>
            <a class="line1">_________________________________________</a> <a class="line2">_________________________________________</a><br>
            <a class="frm1"><b>FIRMA DEL CLIENTE</b></a> <a class="frm2"><b>FIRMA DEL REPRESENTANTE</b></a>
        </div><br><br>

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
        .logo{
            position: absolute;
            margin-left: 100px;
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
        .line1{
            margin-left: 7%;
        }
        .line2{
            margin-left: 9%;
        }
        .frm1{
            margin-left: 15%;
            font-size: 12px;
        }
        .frm2{
            margin-left: 34%;
            font-size: 12px;
        }
        .modal{
            width: 100%;
            height: 100vh;
            background rgba(0,0,0,0, 0.6);
            position: absolute;
        }
        .sh, .claus1{
            text-align: center;
            font-family: 'Times New Romans';
            margin-top:25px;
        }
        .claus{
            font-size:12px;
            font-weight: normal;
        }
        .claus1{
            font-size: 20px;
        }
        .bfc{
            margin-left: 0px;
        }
        hr{
            height:3px;
            background-color: #000000;
            border: 20px;
            margin-left:30px;
            margin-right:30px;
        }

        .contrato, .claus1{
            margin-left: 30px;
            margin-right: 30px;
            font-family: 'Times New Romans';
            font-size: 14px;
            font-weight: normal;
        }
        .hh{
            text-transform: uppercase;
            font-weight: bold;
        }

        .claus{
            text-align:justify;
        }

        .shb{
            font-weight: normal;
            text-align: center;
            font-size:12px;
            font-family: 'Times New Romans';
        }
        .notes{
            text-weigth: normal;
            text-align: left;
            font-size: 12px;
            font-family: 'Times New Romans';
        }
        .notes1{
            margin-left: 90px;
            font-weight: normal;
        }
        .notes2{
            margin-left: 28px;
            font-weight: normal;
        }
        .Note{
            font-size: 20px;
            font-family: 'Times New Romans';
        }
        .frm{
            text-align:center;
        }
        .aa{
            text-align: right;
        }
        .serv{
            margin-left: 26px;
            text-align: center;
            text-weight: bold;
            font-family: 'Times New Romans'
        }
        
    </style>
</html>