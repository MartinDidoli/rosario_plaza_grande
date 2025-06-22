<?php
include "conectarDB.php";
$codigoApruebo = $_GET["aprobar"];

$aprueboPromo = "UPDATE promociones SET estadoPromo='aprobada' WHERE codPromo='$codigoApruebo'";
mysqli_query($link,$aprueboPromo);
header("Location: /src/descuentosadmin.php");
?>