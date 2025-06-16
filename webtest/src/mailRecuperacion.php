<?php
include "conectarDB.php";
require "../vendor/autoload.php";

$mailIngresa = $_POST["usuarioMailIngresa"];

$checkMail = "SELECT * FROM usuarios WHERE nombreUsuario = '$mailIngresa'";
$resultado = mysqli_query($link,$checkMail);
if (mysqli_num_rows($resultado) > 0){
    $vencimiento = date("Y-m-d H:i:s", time() + 60 * 30);
    $fechaIng = "UPDATE usuarios SET venceRecuperar='$vencimiento' WHERE nombreUsuario='$mailIngresa'";
    mysqli_query($link,$fechaIng);
    $resend = Resend::client('queti');
    $resend->emails->send([
        'from'=>'onboarding@resend.dev',
        'to'=> 'ixanol99@gmail.com',
        'subject'=>'Recuperar contrasena',
        'html'=>'<p>Ingresá a este link para recuperar tu contraseña: <a href="www.rosarioplazagrande.free.nf/src/recuperarde.php?mail=' . $mailIngresa . '">Link</a></p>'
    ]);
    header("Location: /webtest/public/login.php?login=revisarMail");
} else {
    echo "El usuario no existe";
    header("Location: /webtest/public/login.php?login=noexisteusuario");
}
?>