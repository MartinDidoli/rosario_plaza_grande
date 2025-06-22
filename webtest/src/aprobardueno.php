<?php
include "conectarDB.php";
$codigoApruebo = $_GET["aprobar"];

$aprueboDueno = "UPDATE usuarios SET duenoAprobado='si' WHERE codUsuario='$codigoApruebo'";
mysqli_query($link,$aprueboDueno);
header("Location: /src/duenosadmin.php");
?>