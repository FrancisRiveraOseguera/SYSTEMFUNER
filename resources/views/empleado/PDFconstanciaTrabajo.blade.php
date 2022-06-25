<!DOCTYPE html>
<html>
   <!-- <script language="javascript">alert("Para exportar el contrato a PDF y poder imprimirlo, haz clíc en el logo de la funeraria.")</script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Previsualización del Contrato</title>
    
    <body>

    <img src="/assets/logo_contrato.png" title="Exportar a PDF e imprimir" class="rounded-circle logo" id="btn" width="120" height="100">
        <div class="sh">
            <br>
            <h3><b>Constancia de Trabajo</h3></b>
            <br>
            <h3><b>FUNERALES LA BENDICIÓN</h3></b>
            <hr>
        </div>

       <div style="margin-left:70px; margin-top:70px;"> <p style="text-align: left; font-size: 18px ">Danlí, El Paraíso.</p></div>
       
       <div style="margin-top:70px; margin-left:70px; margin-right:70px;"><p style="text-align: justify; line-height: 2;  font-size: 18px;">Por medio de la presente, la empresa Funerales La Bendición hace constar que el Sr.
       {{$empleado->nombres}} {{$empleado->apellidos}} con cédula de identidad  {{$empleado->identidad}} y cuyo puesto de trabajo dentro de la empresa es {{$empleado->cargos->cargo}},
       labora actualmente con nosotros, y que lo ha venido haciendo desde {{date('d-m-Y',strtotime($empleado->fecha_ingreso))}}
        haciéndolo siempre con respeto y responsabilidad, mostrando total dominio del puesto.
        <br><br>
        Su buena voluntad para ejecutar las tareas asignadas y la forma eficiente en que sigue las instrucciones son dignas de mención. A continuación detallamos las principales 
        funciones que  ejecuta mientras labora: <br>
        {{$empleado->cargos->detalles_cargo}}
        </p>
        <br><br><br>
        <p style=" font-size: 18px">Se expide esta constancia por petición del interesado, y para los fines que éste considere convenientes.</p>
       
        <br>
        <br>
        <br>
        <p style=" font-size: 18px">Atentamente</p> 
        <br>
        <br>
        <br>
        <p style=" font-size: 18px"> Gerente general de Funerales la Bendición.</p>
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
        <script src="../../js/htmlpdf.js"></script>
    </body>

    <style>
        
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
        
        .frm1{
            margin-left: 23%;
            font-size: 12px;
        }
        .frm2{
            margin-left: 32%;
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
        .frm2{
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