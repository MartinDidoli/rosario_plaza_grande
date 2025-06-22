<?php
include "conectarDB.php";
$codigoElimino = $_GET["codigo"];

$buscoUsos = "SELECT * FROM uso_promociones WHERE codPromo = '$codigoElimino'";
if ((mysqli_query($link,$buscoUsos))!=FALSE){
    $eliminoUsos = "DELETE FROM uso_promociones WHERE codPromo = '$codigoElimino'";
    mysqli_query($link,$eliminoUsos);
}

$eliminarPromo = "DELETE FROM promociones WHERE codPromo='$codigoElimino'";
mysqli_query($link,$eliminarPromo);
header("Location: /src/promocionesdueno.php?comofue=eliminaPromoExitoso");

?>