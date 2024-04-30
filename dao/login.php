<?php

require 'consultaEmpleado.php';

session_start();
$Nomina = $_POST['nomina'];
$Password = $_POST['password'];

$Nomina = str_pad($Nomina, 8, "0", STR_PAD_LEFT);
$statusLogin = verificacionUsuario($Nomina, $Password);
echo $statusLogin;
/*
if ($statusLogin == 1) {
    $_SESSION['nomina'] = $Nomina;
    $_SESSION['password'] = $Password;
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../inicio.html'>";
} else if ($statusLogin == 0) {
    echo "<script>alert('Acceso Denegado')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../index.html'>";
}*/
?>