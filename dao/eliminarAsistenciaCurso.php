<?php
include_once('db/db_RH.php');

$Id=$_POST['id'];


registroUsu($Id);
function registroUsu($Id){

    $con = new LocalConector();
    $conex=$con->conectar();

    // Primero, realiza la actualización
    $updateQuery = "UPDATE `BitacoraCursos` SET `EstatusAsistencia` = 0 where `IdBitacoraCurso` = '$Id'";
    $rsUpdate = mysqli_query($conex, $updateQuery);

    // Comprueba si la actualización fue exitosa
    if(!$rsUpdate){
        echo "Error al actualizar";
        return 0;
    }

    mysqli_close($conex);
}

?>