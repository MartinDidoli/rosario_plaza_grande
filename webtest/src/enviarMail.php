<?php
require "../vendor/autoload.php";

$mailSender = $_POST["mailSender"];
$nombreSender = $_POST["nombreSender"];
$mensaje = $_POST["mensaje"];

$resend = Resend::client('queti');
$resend->emails->send([
    'from'=>'onboarding@resend.dev',
    'to'=> 'ejemplo@gmail.com',
    'subject'=>'Form de contacto',
    'html'=>'<p>El mail' . $mailSender . ' con nombre '. $nombreSender .' se contactó a través del formulario de Rosario Plaza Grande con el siguiente mensaje: '. $mensaje .'</p>'
]);
header("Location: /public/contacto.php?confirmo=enviado");
?>