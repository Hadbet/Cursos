<?php
include_once('db/db_RH.php');

$Nomina=$_POST['nomina'];
$Nombre=$_POST['nombre'];
$Apu=$_POST['apu'];
$Supervisor=$_POST['supervisor'];
$ShiftLeader=$_POST['shiftLeader'];
$Horario=$_POST['horario'];

registroUsu($Nomina,$Nombre,$Apu,$Supervisor,$ShiftLeader,$Horario);
function registroUsu($Nomina,$Nombre,$Apu,$Supervisor,$ShiftLeader,$Horario){

    $con = new LocalConector();
    $conex=$con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $horarioParts = explode(", ", $Horario);

    $Curso = trim($horarioParts[0]);
    $Fecha = trim($horarioParts[1]);
    $HorarioCurso = trim($horarioParts[2]);

    $insertRegistro= "INSERT INTO `BitacoraCursos`(`Nomina`, `Nombre`, `FechaRegistro`, `Curso`, `Horario`, `Fecha`, `EstatusAsistencia`, `Evaluacion`, `APU`, `ShiftLeader`, `Supervisor`) VALUES ('$Nomina','$Nombre','$DateAndTime','$Curso','$HorarioCurso','$Fecha',0,0,'$Apu','$ShiftLeader','$Supervisor')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>