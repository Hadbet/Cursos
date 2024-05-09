<?php

include_once('db/db_Empleado.php');

$Nomina = $_GET['nomina'];
ContadorApu($Nomina);

function ContadorApu($Nomina)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    if ($conex === false) {
        die("ERROR: No se pudo conectar a la base de datos");
    }

    $stmt = $conex->prepare("SELECT * FROM `Empleados` WHERE `IdUser` = ?");
    $stmt->bind_param("s", $Nomina);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));

    $stmt->close();
    $conex->close();
}

?>