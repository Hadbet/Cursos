<?php

include_once('db/db_RH.php');

$nomina = $_POST['nomina'];

$target_dir = "../perfiles/$nomina/"; // especifica el directorio donde se subirá el archivo

// verifica si el directorio existe, si no, lo crea
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// verifica si se subieron archivos
if (!empty($_FILES['imagenes']['name'][0])) {
    // recorre cada archivo
    for ($i = 0; $i < count($_FILES['imagenes']['name']); $i++) {
        $target_file = $target_dir . basename($_FILES["imagenes"]["name"][$i]); // especifica la ruta del archivo a subir

        // intenta subir el archivo
        if (move_uploaded_file($_FILES["imagenes"]["tmp_name"][$i], $target_file)) {

        } else {
            echo "Lo siento, hubo un error subiendo el archivo ". basename( $_FILES["archivos"]["name"][$i]). ".";
        }
    }
} else {
    echo "No se subieron archivos.";
}



echo '<script type="text/javascript">
           window.location = "../form_cursos_admin.html"
      </script>';


?>