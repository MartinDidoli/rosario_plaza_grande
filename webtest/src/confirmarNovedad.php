<?php
include "conectarDB.php";

$descNovedad = $_POST["nuevaNovedad"];
$pubNovedad = $_POST["fechaPublicacion"];
$vencNovedad = $_POST["vencimiento"];
$catNovedad = $_POST["categoria"];

$sql = "INSERT INTO novedades(textoNovedad,fechaDesdeNovedad,fechaHastaNovedad,tipoUsuario) VALUES ('$descNovedad','$pubNovedad','$vencNovedad','$catNovedad')";
mysqli_query($link,$sql);
header("Location: /src/novedadesadmin.php?comofue=exitoso");

?>