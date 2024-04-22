<?php
include_once('db/db_RH.php');

$Nombre=$_POST['nombre'];
$Horario=$_POST['horario'];
$Fecha=$_POST['fecha'];
$Capacidad=$_POST['capacidad'];

registroUsu($Nombre,$Horario,$Fecha,$Capacidad);
function registroUsu($Nombre,$Horario,$Fecha,$Capacidad){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "INSERT INTO `Cursos`(`NombreCurso`, `Horario`, `Fecha`, `Estatus`, `Capacidad`) VALUES ('$Nombre','$Horario','$Fecha',1,$Capacidad)";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>