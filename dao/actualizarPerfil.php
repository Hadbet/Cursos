<?php
include_once('db/db_RH.php');

$Nomina=$_POST['nomina'];
$FechaNacimiento=$_POST['fechaNacimiento'];
$Correo=$_POST['correo'];

registroUsu($Nomina,$FechaNacimiento,$Correo);
function registroUsu($Nomina,$FechaNacimiento,$Correo){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "UPDATE `Usuarios_Cursos` SET `Email`='$Correo',`FechaNacimiento`='$FechaNacimiento' WHERE `IdUsuario`='$Nomina'";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
    }else{
        return 1;
    }
}

?>