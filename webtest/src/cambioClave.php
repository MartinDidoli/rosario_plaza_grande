<?php
include "conectarDB.php";
$mailUser = $_POST["mailCambia"];
$claveUser = md5($_POST["clave"]);

$modificarClave = "UPDATE usuarios SET claveUsuario='$claveUser' WHERE nombreUsuario='$mailUser'";
mysqli_query($link,$modificarClave);
header("Location: /webtest/public/login.php?login=modificoexitoso");

?>