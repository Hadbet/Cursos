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

$ResOne=$_POST['resOne'];
$ResTwo=$_POST['resTwo'];
$ResThree=$_POST['resThree'];
$ResFour=$_POST['resFour'];
$ResFive=$_POST['resFive'];
$ResSix=$_POST['resSix'];
$ResSeven=$_POST['resSeven'];
$ResEight=$_POST['resEight'];
$ResNine=$_POST['resNine'];
$ComentariosInstructor=$_POST['comentariosInstructor'];

registroUsu($Nombre,$Nomina,$Horario,$Fecha,$Curso,$Comentarios,$Calificacion,$Id,$ResOne,$ResTwo,$ResThree,$ResFour,$ResFive,$ResSix,$ResSeven,$ResEight,$ResNine,$ComentariosInstructor);
function registroUsu($Nombre,$Nomina,$Horario,$Fecha,$Curso,$Comentarios,$Calificacion, $Id,$ResOne,$ResTwo,$ResThree,$ResFour,$ResFive,$ResSix,$ResSeven,$ResEight,$ResNine,$ComentariosInstructor){

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

    $Respuestas = $ResOne."_".$ResTwo."_".$ResThree."_".$ResFour."_".$ResFive."_".$ResSix."_".$ResSeven."_".$ResEight."_".$ResNine."_".$ComentariosInstructor;

    $ResOne = convertirRespuestaANumero($ResOne);
    $ResTwo = convertirRespuestaANumero($ResTwo);
    $ResThree = convertirRespuestaANumero($ResThree);
    $ResFour = convertirRespuestaANumero($ResFour);
    $ResFive = convertirRespuestaANumero($ResFive);
    $ResSix = convertirRespuestaANumero($ResSix);
    $ResSeven = convertirRespuestaANumero($ResSeven);
    $ResEight = convertirRespuestaANumero($ResEight);
    $ResNine = convertirRespuestaANumero($ResNine);

    $suma = $ResOne + $ResTwo + $ResThree + $ResFour + $ResFive + $ResSix + $ResSeven + $ResEight + $ResNine;

    $promedio = ($suma * 100) / 9;

    // Si la actualización fue exitosa, realiza la inserción
    $insertRegistro= "INSERT INTO `Evaluacion_Curso`(`Curso`, `Fecha`, `Horario`, `Nomina`, `Nombre`, `Calificacion`, `Comentarios`,`FechaEvaluacion`,`Respuestas`) VALUES ('$Curso','$Fecha','$Horario','$Nomina','$Nombre','$promedio','$Comentarios','$DateAndTime','$Respuestas')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

function convertirRespuestaANumero($respuesta) {
    $partes = explode('-', $respuesta);
    $calificacion = trim($partes[1]);

    switch ($calificacion) {
        case 'Mal':
            return 0;
        case 'Bien':
            return 0.5;
        case 'Excelente':
            return 1;
        default:
            return 0;
    }
}

?>