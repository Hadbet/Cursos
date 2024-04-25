<?php

include_once('db/db_RH.php');

$con = new LocalConector();
$conex=$con->conectar();

$nombreInstructor = $_POST['nombreInstructor'];

$target_dir = "../documentacion/$nombreInstructor/"; // especifica el directorio donde se subirá el archivo

// verifica si el directorio existe, si no, lo crea
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// verifica si se subieron archivos
if (!empty($_FILES['archivos']['name'][0])) {
    // recorre cada archivo
    for ($i = 0; $i < count($_FILES['archivos']['name']); $i++) {
        $target_file = $target_dir . basename($_FILES["archivos"]["name"][$i]); // especifica la ruta del archivo a subir

        // intenta subir el archivo
        if (move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], $target_file)) {
            $insertDocumento= "INSERT INTO `Documentacion_Instructores`(`NombreInstructor`, `NombreArchivo`, `Ruta`) VALUES ('$nombreInstructor','" . basename($_FILES["archivos"]["name"][$i]) . "','" . $target_dir . basename($_FILES["archivos"]["name"][$i]) . "')";
            $rsinsertDocu=mysqli_query($conex,$insertDocumento);
            echo "El archivo ". basename( $_FILES["archivos"]["name"][$i]). " ha sido subido.";
        } else {
            echo "Lo siento, hubo un error subiendo el archivo ". basename( $_FILES["archivos"]["name"][$i]). ".";
        }
    }
} else {
    echo "No se subieron archivos.";
}

mysqli_close($conex);


?>