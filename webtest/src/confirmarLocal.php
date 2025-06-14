<?php
include "conectarDB.php";

$nombreLocal = $_POST["nuevoLocalNombre"];
$ubicacionLocal = $_POST["nuevoLocalUbicacion"];
$rubroLocal = $_POST["nuevoLocalRubro"];
$duenoLocal = $_POST["nuevoLocalDueno"];

$sql = "INSERT INTO locales(nombreLocal,ubicacionLocal,rubroLocal,codUsuario) VALUES ('$nombreLocal','$ubicacionLocal','$rubroLocal','$duenoLocal')";
mysqli_query($link,$sql);
header("Location: /webtest/src/localesadmin.php?comofue=exitoso");

?>