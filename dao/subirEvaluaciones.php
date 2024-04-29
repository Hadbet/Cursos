<?php

include_once('db/db_RH.php');

$con = new LocalConector();
$conex=$con->conectar();

$nombreUsuario = $_POST['nombreUsuario'];
$nominaUsuario = $_POST['nominaUsuario'];
$cursoUsuario = $_POST['cursoUsuario'];
$idUsuario = $_POST['idUsuario'];
$horarioUsuario = $_POST['horarioUsuario'];
$calificicacionUsuario = $_POST['calificacionUsuario'];

$target_dir = "../evaluaciones/$nominaUsuario/"; // especifica el directorio donde se subirá el archivo

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
            $insertDocumento= "INSERT INTO `Documentos_Operativos`(`Nomina`, `Nombre`, `IdCurso`,`NombreArchivo`) VALUES ('$nominaUsuario','$nombreUsuario','$horarioUsuario','" . basename($_FILES["archivos"]["name"][$i]) . "')";
            $rsinsertDocu=mysqli_query($conex,$insertDocumento);
            echo "El archivo ". basename( $_FILES["archivos"]["name"][$i]). " ha sido subido.";
        } else {
            echo "Lo siento, hubo un error subiendo el archivo ". basename( $_FILES["archivos"]["name"][$i]). ".";
        }
    }
} else {
    echo "No se subieron archivos.";
}



// Realiza la consulta para verificar si ya existe un registro con el mismo nombre de instructor
$checkRegistro = "UPDATE `BitacoraCursos` SET `EstatusAsistencia`='2',`Evaluacion`='$calificicacionUsuario' WHERE `IdBitacoraCurso` = '$idUsuario'";
$rsCheck = mysqli_query($conex, $checkRegistro);

// Si la consulta devuelve algún resultado, no realiza la inserción
if (mysqli_num_rows($rsCheck) > 0) {
    echo "El instructor ya existe en la base de datos.";
} else {

}

mysqli_close($conex);

echo '<script type="text/javascript">
           window.location = "form_cursos_admin_calificacion.html"
      </script>';


?>