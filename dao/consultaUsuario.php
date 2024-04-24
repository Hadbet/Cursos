<?php

include_once('db/db_Empleado.php');

$Nomina=$_GET['nomina'];

Contador($Nomina);

function Contador($Nomina){
    $con = new LocalConector();
    $conex=$con->conectar();

    if (strlen($Nomina) == 8){
        $datos = mysqli_query($conex, "SELECT * FROM `Empleados` WHERE `IdUser` = '$Nomina';");
    }else{
        $datos = mysqli_query($conex, "SELECT * FROM `Empleados` WHERE `IdTag` = '$Nomina';");
    }

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data"=>$resultado));
}


?>