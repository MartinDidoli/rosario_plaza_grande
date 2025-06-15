<?php
include "conectarDB.php";
$codigoElimino = $_GET["borrar"];

$eliminoUsuario = "DELETE FROM usuarios WHERE codUsuario = '$codigoElimino'";
mysqli_query($link,$eliminoUsuario);

header("Location: /webtest/src/duenosadmin.php");

?>