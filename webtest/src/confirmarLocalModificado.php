<?php
include "conectarDB.php";
$codigoModifico = $_GET["modificoLocal"];
$nombreoModifico = $_POST["modificoNombre"];
$ubicacionModifico = $_POST["modificoUbicacion"];
$rubroModifico = $_POST["modificoRubro"];
$duenoModifico = $_POST["modificoDueno"];

$modificarLocal = "UPDATE locales SET nombreLocal='$nombreoModifico', ubicacionLocal='$ubicacionModifico', rubroLocal='$rubroModifico', codUsuario='$duenoModifico' WHERE codLocal='$codigoModifico'";
mysqli_query($link,$modificarLocal);
header("Location: /src/localesadmin.php?comofue=modificoexitoso");

?>