<?php
include "conectarDB.php";

$mailIngresa = $_GET["mail"];

$checkMail = "UPDATE usuarios SET categoriaCliente='inicial' WHERE nombreUsuario='$mailIngresa'";;
$resultado = mysqli_query($link,$checkMail);
header("Location: /public/login.php?login=exitoso");
?>