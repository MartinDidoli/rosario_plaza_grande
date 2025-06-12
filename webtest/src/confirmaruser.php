<?php
include "conectarDB.php";

$mailIngresa = $_POST["usuarioMailIngresa"];
$claveIngresa = md5($_POST["usuarioClaveIngresa"]);

$checkMail = "SELECT * FROM usuarios WHERE nombreUsuario = '$mailIngresa'";
$resultado = mysqli_query($link,$checkMail);
if (mysqli_num_rows($resultado) > 0){
    $usuario = mysqli_fetch_assoc($resultado);
    if ($claveIngresa==$usuario["claveUsuario"]){
        echo "Inicio de sesión correcto";
        session_start();
        $_SESSION["usuarioMailSesion"] = $mailIngresa;
        $_SESSION["usuarioTipoSesion"] = $usuario["tipoUsuario"];
        if (isset($usuario["categoriaCliente"])){
            $_SESSION["usuarioCategoriaSesion"]=$usuario["categoriaCliente"];
        }
        header("Location: /webtest/public/inicio.php?login=exitoso");
    } elseif ($claveIngresa!=$usuario["claveUsuario"]){
        echo "Contraseña mal ingresada";
    }
} else {
    echo "El usuario no existe";
}

?>