<?php
include "conectarDB.php";

$mailRegistra = $_POST["duenoMailRegistra"];
$claveRegistra = md5($_POST["duenoClaveRegistra"]);
$confirmaRegistra = md5($_POST["duenoConfirmaRegistra"]);
$localRegistra = $_POST["duenoIdLocalRegistra"];

$checkMail = "SELECT * FROM  usuarios WHERE nombreUsuario='$mailRegistra'";
$resultadoMail = mysqli_query($link,$checkMail);
if (mysqli_num_rows($resultadoMail)>0){
    echo "Email ya registrado";
    header("Location: /webtest/public/registro.php?comofue=duplicado");
} elseif ($claveRegistra!==$confirmaRegistra) {
    echo "Las claves no coinciden";
    header("Location: /webtest/public/registro.php?comofue=clavemal");
} else {
    $sql = "INSERT INTO usuarios(nombreUsuario,claveUsuario,tipoUsuario,categoriaCliente,duenoAprobado) VALUES ('$mailRegistra','$claveRegistra','dueno','$localRegistra','no')";
    if(mysqli_query($link,$sql)===TRUE){
        echo "Cuenta registrada";
        header("Location: /webtest/public/registro.php?comofue=exitosodueno");
    } else {
        echo "No se pudo registrar";
        header("Location: /webtest/public/registro.php?comofue=algosaliomal");
    }
}

?>