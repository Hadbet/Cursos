<?php
include_once('db/db_RH.php');

$Nombre=$_POST['nombre'];
$Nomina=$_POST['nomina'];
$Horario=$_POST['horario'];
$Fecha=$_POST['fecha'];
$Curso=$_POST['curso'];
$Comentarios=$_POST['comentarios'];
$Calificacion=$_POST['calificacion'];
$Id=$_POST['id'];


registroUsu($Nombre,$Nomina,$Horario,$Fecha,$Curso,$Comentarios,$Calificacion,$Id);
function registroUsu($Nombre,$Nomina,$Horario,$Fecha,$Curso,$Comentarios,$Calificacion, $Id){

    $con = new LocalConector();
    $conex=$con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    // Primero, realiza la actualización
    $updateQuery = "UPDATE `BitacoraCursos` SET `EstatusAsistencia` = 3 where `IdBitacoraCurso` = '$Id'";
    $rsUpdate = mysqli_query($conex, $updateQuery);

    // Comprueba si la actualización fue exitosa
    if(!$rsUpdate){
        echo "Error al actualizar";
        return 0;
    }

    // Si la actualización fue exitosa, realiza la inserción
    $insertRegistro= "INSERT INTO `Evaluacion_Curso`(`Curso`, `Fecha`, `Horario`, `Nomina`, `Nombre`, `Calificacion`, `Comentarios`,`FechaEvaluacion`) VALUES ('$Curso','$Fecha','$Horario','$Nomina','$Nombre','$Calificacion','$Comentarios','$DateAndTime')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>