<?php
require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Contenido HTML del documento
$html = '
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documento de prueba</title>
</head>
<body>
    <h1>¡Hola, mundo!</h1>
    <p>Este es un documento de prueba generado con DOMPDF.</p>
</body>
</html>
';

// Instancia de Dompdf
$dompdf = new Dompdf();

// Carga el HTML en Dompdf
$dompdf->loadHtml($html);

// Renderiza el documento
$dompdf->render();

// Envía el PDF al navegador
$dompdf->stream("documento_prueba.pdf", array("Attachment" => false));
?>