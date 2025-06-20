<?php
session_start();
include "conectarDB.php";

$descPromo = $_POST["nuevaPromo"];
$pubPromo = date("Y-m-d");
$vencPromo = $_POST["fechaVence"];
$elLocal = $_SESSION["usuarioCategoriaSesion"];
$catClient = $_POST["catCli"];

$diasSeleccionados=$_POST["diasApl"]??[];
$diasAp = array_fill(0,7,0);

foreach ($diasSeleccionados as $i){
    if(isset($diasAp[$i])){
        $diasAp[$i]=1;
    }
}

$guardoDias = implode(",", $diasAp);

$sql = "INSERT INTO promociones(textoPromo,fechaDesdePromo,fechaHastaPromo,categoriaCliente,diasSemana,estadoPromo,codLocal) VALUES ('$descPromo','$pubPromo','$vencPromo','$catClient','$guardoDias','pendiente','$elLocal')";
mysqli_query($link,$sql);
header("Location: /webtest/src/promocionesdueno.php?comofue=exitoso");

?>