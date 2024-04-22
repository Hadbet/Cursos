<?php
include_once('db/db_RH.php');

$Nombre=$_POST['nombre'];

registroUsu($Nombre);
function registroUsu($Nombre){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "INSERT INTO `Nombres_Cursos`(`NombreCurso`) VALUES ('$Nombre')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>