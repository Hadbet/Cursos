<?php
$target_dir = "documentacion/"; // especifica el directorio donde se subirá el archivo
$target_file = $target_dir . basename($_FILES["file"]["name"]); // especifica la ruta del archivo a subir

// intenta subir el archivo
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "El archivo ". basename( $_FILES["file"]["name"]). " ha sido subido.";
} else {
    echo "Lo siento, hubo un error subiendo tu archivo.";
}
?>