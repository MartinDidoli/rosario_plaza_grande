<?php
include "conectarDB.php";

$codigoPr = $_GET["pido"];
$codigoCl = $_GET["cliente"];
$fecha = date("Y-m-d");

$sql = "INSERT INTO uso_promociones(codCliente,codPromo,fechaUsoPromo,estado) VALUES ('$codigoCl','$codigoPr','$fecha','enviada')";
mysqli_query($link,$sql);
header("Location: /webtest/public/promociones.php?comofue=pedida");

?>