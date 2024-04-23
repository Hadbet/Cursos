<?php
include_once('db/db_RH.php');

$Nombre=$_POST['nombre'];
$Horario=$_POST['horario'];
$Fecha=$_POST['fecha'];
$Capacidad=$_POST['capacidad'];

$Objetivo=$_POST['objetivo'];
$Instructor=$_POST['instructor'];
$Temario=$_POST['temario'];
$Tipo=$_POST['tipo'];

registroUsu($Nombre,$Horario,$Fecha,$Capacidad,$Objetivo,$Instructor,$Temario,$Tipo);
function registroUsu($Nombre,$Horario,$Fecha,$Capacidad,$Objetivo,$Instructor,$Temario,$Tipo){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "INSERT INTO `Cursos`(`NombreCurso`, `Horario`, `Fecha`, `Estatus`, `Capacidad`, `Objetivo`, `Instructor`, `Tipo`, `Temario`) VALUES ('$Nombre','$Horario','$Fecha',1,$Capacidad,'$Objetivo','$Instructor','$Tipo','$Temario')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>