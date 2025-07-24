<?php
include "conectarDB.php";

$mailIngresa = $_POST["usuarioMailIngresa"];
$claveIngresa = md5($_POST["usuarioClaveIngresa"]);

$checkMail = "SELECT * FROM usuarios WHERE nombreUsuario = '$mailIngresa'";
$resultado = mysqli_query($link,$checkMail);
if (mysqli_num_rows($resultado) > 0){
    $usuario = mysqli_fetch_assoc($resultado);
    if (($claveIngresa==$usuario["claveUsuario"]) and $usuario["duenoAprobado"]!="no" and $usuario["categoriaCliente"]!="falta"){
        echo "Inicio de sesión correcto";
        session_start();
        $_SESSION["usuarioMailSesion"] = $mailIngresa;
        $_SESSION["usuarioTipoSesion"] = $usuario["tipoUsuario"];
        $_SESSION["usuarioCodSesion"] = $usuario["codUsuario"];
        if (isset($usuario["categoriaCliente"])){
            $_SESSION["usuarioCategoriaSesion"]=$usuario["categoriaCliente"];
        }
        header("Location: /public/index.php?login=exitoso");
    } elseif ($claveIngresa!=$usuario["claveUsuario"]){
        echo "Contraseña mal ingresada";
        header("Location: /public/login.php?login=malaClave");
    } else if ($usuario["duenoAprobado"]=="no"){
        header("Location: /public/login.php?login=noAprobado");
    } else if ($usuario["categoriaCliente"]=="falta") {
        header("Location: /public/login.php?login=revisarMail");
    }
} else {
    echo "El usuario no existe";
    header("Location: /public/login.php?login=noexisteusuario");
}

?>