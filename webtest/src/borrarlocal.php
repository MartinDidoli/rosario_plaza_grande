<?php
include "conectarDB.php";
$codigoElimino = $_GET["codigo"];

$buscoUsuario = "SELECT * FROM usuarios WHERE categoriaCliente = '$codigoElimino'";
if ((mysqli_query($link,$buscoUsuario))!=FALSE){
    $eliminoUsuario = "DELETE FROM usuarios WHERE categoriaCliente = '$codigoElimino'";
    mysqli_query($link,$eliminoUsuario);
}

$modificarLocal = "DELETE FROM locales WHERE codLocal='$codigoElimino'";
mysqli_query($link,$modificarLocal);
header("Location: /src/localesadmin.php?comofue=eliminaLocalExitoso");

?>