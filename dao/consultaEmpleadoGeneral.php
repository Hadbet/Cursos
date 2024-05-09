<?php

include_once('db/db_Empleado_Aux.php');

$Nomina=$_GET['nomina'];
ContadorApu($Nomina);
function ContadorApu($Nomina)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT * FROM `Empleados` WHERE `IdUser` = '$Nomina'");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>