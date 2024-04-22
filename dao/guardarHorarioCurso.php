<?php
include_once('db/db_RH.php');

$Nombre=$_POST['horario'];

registroUsu($Nombre);
function registroUsu($Nombre){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "INSERT INTO `Horario_Curso`(`HorarioCurso`) VALUES ('$Nombre')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>