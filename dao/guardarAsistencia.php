<?php
include_once('db/db_RH.php');

$Nomina=$_POST['nomina'];
$Nombre=$_POST['nombre'];
$Tag=$_POST['tag'];
$Horario=$_POST['horario'];

registroUsu($Nomina,$Nombre,$Horario,$Tag);
function registroUsu($Nomina,$Nombre,$Horario,$Tag){

    $con = new LocalConector();
    $conex=$con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $horarioParts = explode(", ", $Horario);

    $Curso = trim($horarioParts[0]);
    $Fecha = trim($horarioParts[1]);
    $HorarioCurso = trim($horarioParts[2]);

    // Consulta SELECT para verificar si ya existen los datos
    $selectQuery = "SELECT * FROM `BitacoraCursos` WHERE `Nomina` = '$Nomina' and `Curso` = '$Curso' and `Horario` = '$HorarioCurso' and `Fecha` = '$Fecha' and EstatusAsistencia = 0";
    $rsSelect = mysqli_query($conex, $selectQuery);

    if (mysqli_num_rows($rsSelect) > 0) {
        $row = mysqli_fetch_assoc($rsSelect);
        $IdBitacoraCurso = $row['IdBitacoraCurso'];
    }else{
        return 0;
    }

    // Si la consulta SELECT no devuelve ningún resultado, hacemos el INSERT
    $insertRegistro= "INSERT INTO `Bitacora_Asistencia`(`$Horario`, `Nomina`, `Nombre`, `Tag`, `Fecha`, `IdBitacoraCurso`) VALUES (,'[value-2]','$Nomina','$Nombre','$Tag',$DateAndTime,'$IdBitacoraCurso')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>