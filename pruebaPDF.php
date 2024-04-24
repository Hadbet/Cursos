<?php
require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Contenido HTML del documento


$css=file_get_contents("css/pdf.css");

$html = '
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../imgs/Grammer_Logo.ico" type="image/x-icon">
    <title>Prueba</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <main>
        <div class="page-header row headerLogo">
        <table id="tableTitle">
            <tr class="">
                <th class="">
                    <div class="col divTitle" id="divRespdf">
                        <h1>Lista de asistencia</h1>
                        <h6>Grammer Querétaro</h6>
                    </div>
                </th>
                <td>
                    <div class="col">
                        <img class="logoGrammer2-img logoR" alt="LogoGrammer" src="https://arketipo.mx/Produccion/ML/PW_MetrologyLaboratory/imgs/logoGrammer.png"><br>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="container-fluid" id="containerPruebaPDF" >
        <div class="row">
            <div class="table-responsive">
                <h5 id="titleTablaPDFg">DATOS GENERALES</h5>
                <table class="table table-bordered table-hover table-sm  table-responsive" id="datosGeneralesTablePDF">
                    <tbody>
                    <tr class="bg-primary">
                        <th class="">No. de solicitud: </th>
                        <td> tsetse</td>
                        <th class="" > Fecha de Solicitud: </th>
                        <td>testset</td>
                    </tr>
                    <tr>
                        <th class="">Tipo de Prueba: </th>
                        <td>testse</td>
                        <th class=""> Solicitante:</th>
                        <td>testse</td>
                    </tr>
                    <tr>
                        <th class="">Norma: </th>
                        <td>testest</td>
                        <th class="">Documento de la norma: </th>
                        <td><a href="">Archivo pdf</a></td>
                    </tr>
                    <tr>
                        <th class="">Especifícaciones: </th>
                        <td colspan="3">setsetse</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="" class="table-responsive">
                <h5 id="materialPDF">MATERIAL PARA MEDICIÓN</h5>
                <table class="table table-striped" id="materialesResumenPDF">
                    <thead>
                    <tr>
                        <th>No. de Parte</th>
                        <th>Material</th>
                        <th>Cantidad</th>
                        <th>Estatus</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>test</td>
                            <td>set</td>
                            <td>serse</td>
                            <td>rserse</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="" class="table-responsive">
                <h5 id="titleTablaPDF">RESULTADOS</h5>
                <table class="table table-bordered table-hover table-sm table-responsive" id="resultadosTablePDF">
                    <tbody>
                    <tr>
                        <th class="">Fecha de Respuesta:</th>
                        <td id="">ser</td>
                        <th class="">Metrólogo:</th>
                        <td id="">res</td>
                    </tr>
                    <tr>
                        <th class="">Estatus: </th>
                        <td id="" >ser</td>
                        <th class="">Prioridad:</th>
                        <td id="">rse</td>
                    </tr>
                    <tr>
                        <th class="">Observaciones:</th>
                        <td id="" colspan="3">rse</td>
                    </tr>
                    <tr>
                        <th class="">Resultados:</th>
                        <td id=""  colspan="3">sre</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
    <footer class="footer_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <small> <a href="https://arketipo.mx/Produccion/ML/PW_MetrologyLaboratory/modules/sesion/indexSesion.php">Laboratorio de Metrología </a></small><br>
                    <small> laboratoriometrologia@arketipo.com.mx </small><br>
                    <strong><small>GRAMMER AUTOMOTIVE PUEBLA S. A. DE C. V.</small></strong>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
';

$html = "<style>" . $css . "</style>" . $html;
// Instancia de Dompdf
$dompdf = new Dompdf();

// Carga el HTML en Dompdfu8
$dompdf->loadHtml($html);

// Renderiza el documento
$dompdf->render();

// Envía el PDF al navegador
$dompdf->stream("documento_prueba.pdf", array("Attachment" => false));
?>