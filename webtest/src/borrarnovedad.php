<?php
include "conectarDB.php";
$codigoElimino = $_GET["codigo"];

$modificarNovedad = "DELETE FROM novedades WHERE codNovedad='$codigoElimino'";
mysqli_query($link,$modificarNovedad);
header("Location: /webtest/src/novedadesadmin.php?comofue=eliminaNovedadExitoso");

?>