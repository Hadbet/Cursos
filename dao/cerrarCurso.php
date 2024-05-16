<?php
include_once('db/db_RH.php');

$Horario=$_POST['horario'];

registroUsu($Horario);
function registroUsu($Horario){

    $con = new LocalConector();
    $conex=$con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d");

    $horarioParts = explode(", ", $Horario);

    $Curso = trim($horarioParts[0]);
    $Fecha = trim($horarioParts[1]);
    $HorarioCurso = trim($horarioParts[2]);

    $insertRegistro= "UPDATE `Cursos` SET `Estatus` = 2,`FechaTermino`= '$DateAndTime' WHERE `Horario` = '$HorarioCurso' and `Fecha` = '$Fecha' and `NombreCurso` = '$Curso'";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>