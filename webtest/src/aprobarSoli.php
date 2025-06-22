<?php
include "conectarDB.php";
$codigoApruebo = $_GET["aprobar"];

$aprueboSoli = "UPDATE uso_promociones SET estado='aceptada' WHERE codUso='$codigoApruebo'";
mysqli_query($link,$aprueboSoli);
header("Location: /src/solicitudesdueno.php?comofue=aprobada");
?>