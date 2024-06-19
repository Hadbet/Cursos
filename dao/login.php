<?php

require 'consultaEmpleado.php';

session_start();
$Nomina = $_POST['nomina'];
$Password = $_POST['password'];

if (strlen($Nomina) == 1) {
    $Nomina = "0000000" . $Nomina;
}
if (strlen($Nomina) == 2) {
    $Nomina = "000000" . $Nomina;
}
if (strlen($Nomina) == 3) {
    $Nomina = "00000" . $Nomina;
}
if (strlen($Nomina) == 4) {
    $Nomina = "0000" . $Nomina;
}
if (strlen($Nomina) == 5) {
    $Nomina = "000" . $Nomina;
}
if (strlen($Nomina) == 6) {
    $Nomina = "00" . $Nomina;
}
if (strlen($Nomina) == 7) {
    $Nomina = "0" . $Nomina;
}

$Nomina = str_pad($Nomina, 8, "0", STR_PAD_LEFT);
$statusLogin = verificacionUsuario($Nomina, $Password);

if ($statusLogin == 1) {
    $_SESSION['nomina'] = $Nomina;
    $_SESSION['password'] = $Password;
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../inicio.html'>";
} else if ($statusLogin == 0) {
    echo "<script>alert('Ocurrio un error')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../index.html'>";
}
?>