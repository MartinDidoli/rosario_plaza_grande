<?php
include "conectarDB.php";
$codigoModifico = $_GET["codigo"];
$descModifico = $_POST["modificoDesc"];
$categoriaModifico = $_POST["modificoCategoria"];

$modificarNovedad = "UPDATE novedades SET textoNovedad='$descModifico', tipoUsuario='$categoriaModifico' WHERE codNovedad='$codigoModifico'";
mysqli_query($link,$modificarNovedad);
header("Location: /webtest/src/novedadesadmin.php?comofue=modificoexitoso");

?>