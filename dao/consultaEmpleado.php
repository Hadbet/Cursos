<?php

include_once('db/db_RH.php');
include_once('db/db_Empleado_Aux.php');

function verificacionUsuario($Nomina, $contra){

    $con = new LocalConector();
    $conexion=$con->conectar();

    $conAux = new LocalConector();
    $conexionAux=$conAux->conectarAux();

    $consP="SELECT * FROM `Usuarios_Cursos` WHERE `IdUsuario` = '$Nomina' and `Password` = '$contra'";
    $rsconsPro=mysqli_query($conexion,$consP);

    if(mysqli_num_rows($rsconsPro) == 1){
        mysqli_close($conexion);
        return 1;
    }
    else{
        $consPe="SELECT * FROM `Empleados` WHERE `IdUser` = '$Nomina' and `IdTag` = '$contra'";
        $consultaEmpleados=mysqli_query($conexionAux,$consPe);

        $row = mysqli_fetch_assoc($consultaEmpleados);
        $Nombre = $row['NomUser'];
        $Area = $row['NombreCC'];

        $consI="INSERT INTO `Usuarios_Cursos`(`IdUsuario`, `Password`, `Nombre`,`Area`) VALUES ('$Nomina','$contra','$Nombre','$Area')";
        $insert=mysqli_query($conexion,$consI);

        if($insert){
            mysqli_close($conexion);
            return 1;
        }
        else{
            mysqli_close($conexion);
            return 0;
        }
    }
}


?>