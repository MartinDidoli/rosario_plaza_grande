<?php
include "conectarDB.php";
$codigoDeniego = $_GET["negar"];

$codigoDeniego = "UPDATE promociones SET estadoPromo='denegada' WHERE codPromo='$codigoDeniego'";
mysqli_query($link,$codigoDeniego);
header("Location: /webtest/src/descuentosadmin.php");
?>