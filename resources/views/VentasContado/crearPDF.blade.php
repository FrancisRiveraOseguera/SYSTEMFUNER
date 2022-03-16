<?php
    include 'conexion.php';
    $query=mysqli_query($mysqli,"SELECT identidad, nombres, apellidos, ocupacion, direccion, telefono FROM clientes");
    $query1=mysqli_query($mysqli,"SELECT precio FROM servicios");
?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Previsualización del Contrato</title>

    <body>
        <img src="/assets/logo_contrato.png" class="rounded-circle logo" id="btn" width="120" height="100">
        <div class="sh">
            <h3><b>PÓLIZA DE SEGUROS FUNERARIOS</h3>
            <h3><b>FUNERALES LA BENDICIÓN</h3>
        </div>
        
        <div class="shb">
            SUCURSAL<br>
            Bº Abajo salida a Tegucigalpa, frente a Ferreteria Santa Fé, Danlí, El Paraíso<br>
            Teléfono 2763-6520
        </div><hr>

        <div class="contrato">
            Señores de Seguros Funerarios <a class="title"><b>FUNERALES LA BENDICIÓN</b></a><br><br>
            Yo: <a class="hh"><b>{{$contadoventa->clientes->nombres}} {{$contadoventa->clientes->apellidos}}</b></a> de _____ de edad con cédula de identidad personal No. <b>{{$contadoventa->clientes->identidad}}</b> de profesión u oficio <a class="hh"><b>{{$contadoventa->clientes->ocupacion}}</b></a> con domicilio en <a class="hh"><b>{{$contadoventa->clientes->direccion}}</b></a> y
            teléfono <b>{{$contadoventa->clientes->telefono}}</b>. Solicito a ustedes atentamente una póliza de seguro funerario de tipo <a class="hh"><b>{{$contadoventa->servicios->tipo}}</b></a> cuyo valor es de L. <b>{{$contadoventa->servicios->precio}}</b>
            dando de prima L. <b>{{$contadoventa->servicios->prima}}</b> y lo restante pagadero en ________ cuotas de L. <b>{{$contadoventa->servicios->cuota}}</b> mensuales.
        
            <br><br>Otorgo los beneficios de esta póliza a las personas que también responderán por el saldo en caso de mi defunción, ellos son:<BR><br>
                1. __________________________________________________________________________________ <a class="bfc">2. ______________________________________________________________________________</a><br>
            <BR>3. __________________________________________________________________________________ <a class="bfc">4. ______________________________________________________________________________</a>
        </div>

        <div class="claus1">
            <a class="Note">SERVICIOS</a>
            <div class="claus">
                <b>1)</b> En caso de accidente del contratante, y si él quedara discapacitado, la empresa le dará por cancelado el servicio funerario siempre y cuando esté al día en el pago de sus cuotas.<br>
                <b>2)</b> En caso de accidente del contratante, y si él quedara discapacitado, la empresa le dará por cancelado el servicio funerario siempre y cuando esté al día en el pago de sus cuotas.<br>
                <b>3)</b> En caso de accidente, tomaré el contrato para una persona de avanzada edad o enferma de gravedad, y si falleciere, se prestará el servicio contratado con el 50% del valor y el saldo lo pagará en cuotas convenidas.<br>  
                <b>4)</b> El asegurado podrá hacer uso del servicio funerario para quien él estime conveniente a partir del momento que firme este contrato; y si el contratante ocupase el servicio funerario durante los primeros seis meses después de firmado el contratro,
                    pagará un 50% del valor del servicio funerario, y el saldo lo pagará en cuotas establecidas.<br>
                <b>5)</b> En caso de accidente del contratante, y si él quedara discapacitado, la empresa le dará por cancelado el servicio funerario siempre y cuando esté al día en el pago de sus cuotas.<br>
                <b>6)</b> En caso de accidente, tomaré el contrato para una persona de avanzada edad o enferma de gravedad, y si falleciere, se prestará el servicio contratado con el 50% del valor y el saldo lo pagará en cuotas convenidas.<br>  
                <b>7)</b> El asegurado podrá hacer uso del servicio funerario para quien él estime conveniente a partir del momento que firme este contrato; y si el contratante ocupase el servicio funerario durante los primeros seis meses después de firmado el contratro,
                    pagará un 50% del valor del servicio funerario, y el saldo lo pagará en cuotas establecidas.<br>
                <b>8)</b> En caso de accidente del contratante, y si él quedara discapacitado, la empresa le dará por cancelado el servicio funerario siempre y cuando esté al día en el pago de sus cuotas.<br>
                <b>9)</b> En caso de accidente, tomaré el contrato para una persona de avanzada edad o enferma de gravedad, y si falleciere, se prestará el servicio contratado con el 50% del valor y el saldo lo pagará en cuotas convenidas.<br>  
                <b>10)</b> El asegurado podrá hacer uso del servicio funerario para quien él estime conveniente a partir del momento que firme este contrato; y si el contratante ocupase el servicio funerario durante los primeros seis meses después de firmado el contratro,
                    pagará un 50% del valor del servicio funerario, y el saldo lo pagará en cuotas establecidas.<br>
            </div>
        </div>
            
            <hr><div class="claus1">
                <a class="Note">CLAUSULAS</a>
            <div class="claus">
                <b>A)</b> La empresa otorga un seguro de deuda sin costo alguno que consiste que en caso de fallecimiento exclusivamente del contratante, se le hará un descuento especial del 50% de saldo actual, siempre y cuando se encuentre al día en sus cuotas mensuales.<br><br>
                <b>B)</b> En caso de accidente del contratante, y si él quedara discapacitado, la empresa le dará por cancelado el servicio funerario siempre y cuando esté al día en el pago de sus cuotas.<br><br>
                <b>C)</b> En caso de accidente, tomaré el contrato para una persona de avanzada edad o enferma de gravedad, y si falleciere, se prestará el servicio contratado con el 50% del valor y el saldo lo pagará en cuotas convenidas.<br><br>     
                <b>D)</b> El asegurado podrá hacer uso del servicio funerario para quien él estime conveniente a partir del momento que firme este contrato; y si el contratante ocupase el servicio funerario durante los primeros seis meses después de firmado el contratro,
                pagará un 50% del valor del servicio funerario, y el saldo lo pagará en cuotas establecidas.<br>
            </div>

            <div class="notes">
                <br><br><a class="notes1">1-La empresa no responde por dinero pagado a otra persona, que no sea el cobrador quien tendrá que mostrar su canet como tal.</a><br>
                <a class="notes1">2-La empresa no se responsabiliza por ofrecimientos verbales, del vendedor, que no están incluidos en el contrato. Por cualquier</a><br> <a class="notes1">duda o sugerencia llámenos o visítenos a nuestras oficinas.</a><br>
                <a class="Note"><b>NOTA</a></b> <a class="notes2">3-El vendedor está autorizado a cobrar únicamente la prima, autorizada por la empresa.</a><br>
                <a class="notes1">4-Este contrato se celebra en virtud de que ambas personas, vendedor y contratante, se encuentran en pleno estado físico y mental.</a><br>
                <a class="notes1">5-El asegurado tendrá derecho a platos, vasos, tenedores, café, azúcar y alumbrado.</a><br>
            </div><br><br>
           
            </div>
        </div>

        <div>
            <a class="date1"><b>Fecha de cobro:</b>  _____________________</a> <a class="date2"> ______ de ____________ del 20_______</a>
        </div><br><br>

        <div>
            <a class="line1">_________________________________________</a> <a class="line2">_________________________________________</a><br>
            <a class="frm1"><b>FIRMA DEL CLIENTE</b></a> <a class="frm2">FIRMA DEL REPRESENTANTE</a>
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
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../../js/script.js"></script>
        <script src="../../js/htmlpdf.js"></script>
    </body>

    <style>
        .date1{
            font-size: 12px;
            margin-left: 28px;
        }
        .date2{
            font-size: 12px;
            margin-left: 540px;
        }
        .title{
            font-size: 14px;
        }
        .logo{
            position: absolute;
            margin-left: 150px;
        }
        body{
            /*border-width:3px;
            border-color: black;
            border-style: solid;*/
            margin-top:20px;
            margin-left:30px;
            margin-right:30px;
            border-radius: 20px;
        }
        .line1{
            margin-left: 100px;
        }
        .line2{
            margin-left: 120px;
        }
        .frm1{
            margin-left: 200px;
            font-size: 12px;
        }
        .frm2{
            margin-left: 380px;
            font-size: 12px;
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
            margin-left:30px;
            margin-right:30px;
            font-family: 'Times New Romans';
            font-weight: normal;
            font-size: 12px;
            
        }
        .hh{
            text-transform: uppercase;
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