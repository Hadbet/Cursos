<?php

require 'consultaEmpleado.php';

session_start();
$Nomina = $_POST['nomina'];
$Password = $_POST['password'];

echo $Nomina;

$_SESSION['nomina'] = $Nomina;
$_SESSION['password'] = $Password;
/*
$statusLogin = verificacionUsuario($Nomina, $Password);

if ($statusLogin == 1) {
    $_SESSION['nomina'] = $Nomina;
    $_SESSION['password'] = $Password;
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../inicio.html'>";
} else if ($statusLogin == 0) {
    echo "<script>alert('Acceso Denegado')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../index.html'>";
}

*/
?>