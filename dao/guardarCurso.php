<?php
include_once('db/db_RH.php');

$Nombre=$_POST['nombre'];
$Horario=$_POST['horario'];
$Fecha=$_POST['fecha'];

registroUsu($Nombre,$Horario,$Fecha);
function registroUsu($Nombre,$Horario,$Fecha){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "INSERT INTO `Cursos`(`NombreCurso`, `Horario`, `Fecha`, `Estatus`) VALUES ('$Nombre','$Horario','$Fecha',1)";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>