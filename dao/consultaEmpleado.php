<?php

include_once('db/db_RH.php');
include_once('db/db_Empleado_Aux.php');

function verificacionUsuario($user, $contra){

    $con = new LocalConector();
    $conexion=$con->conectar();

    $conAux = new LocalConectorAux();
    $conexionAux=$conAux->conectarAux();

    $consP="SELECT * FROM `Usuarios_Cursos` WHERE `IdUsuario` = '$user' and `Password` = '$contra'";
    $rsconsPro=mysqli_query($conexion,$consP);
    mysqli_close($conexion);
    mysqli_close($conexionAux);

    if(mysqli_num_rows($rsconsPro) == 1){
        mysqli_close($conexion);
        mysqli_close($conexionAux);
        return 1;
    }else{
        $consPe="SELECT * FROM `Empleados` WHERE `IdUser` = '$user' and `IdTag` = '$contra'";
        $consultaEmpleados=mysqli_query($conexionAux,$consPe);

        $row = mysqli_fetch_assoc($consultaEmpleados);
        $Nombre = $row['NomUser'];
        $Area = $row['NombreCC'];

        $consI="INSERT INTO `Usuarios_Cursos`(`IdUsuario`, `Password`, `Nombre`,`Area`) VALUES ('$user','$contra','$Nombre','$Area')";
        $insert=mysqli_query($conexion,$consI);

        if($insert){
            mysqli_close($conexion);
            mysqli_close($conexionAux);
            return 1;
        }
        else{
            mysqli_close($conexion);
            mysqli_close($conexionAux);
            return 0;
        }
    }
}


?>