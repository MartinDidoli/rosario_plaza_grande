<?php
include "conectarDB.php";
$codigoRechazo = $_GET["rechazo"];

$rechazoSoli = "UPDATE uso_promociones SET estado='rechazada' WHERE codUso='$codigoRechazo'";
mysqli_query($link,$rechazoSoli);
header("Location: /webtest/src/solicitudesdueno.php?comofue=rechazada");
?>