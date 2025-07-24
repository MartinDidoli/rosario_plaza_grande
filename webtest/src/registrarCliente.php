<?php
include "conectarDB.php";
require "../vendor/autoload.php";

$mailRegistra = $_POST["clienteMailRegistra"];
$claveRegistra = md5($_POST["clienteClaveRegistra"]);
$confirmaRegistra = md5($_POST["clienteConfirmaRegistra"]);

$checkMail = "SELECT * FROM  usuarios WHERE nombreUsuario='$mailRegistra'";
$resultadoMail = mysqli_query($link,$checkMail);
if (mysqli_num_rows($resultadoMail)>0){
    echo "Email ya registrado";
    header("Location: /public/registro.php?comofue=duplicado");
} elseif ($claveRegistra!==$confirmaRegistra) {
    echo "Las claves no coinciden";
    header("Location: /public/registro.php?comofue=clavemal");
} else {
    $sql = "INSERT INTO usuarios(nombreUsuario,claveUsuario,tipoUsuario,categoriaCliente) VALUES ('$mailRegistra','$claveRegistra','cliente','falta')";
    $resend = Resend::client('queti');
    $resend->emails->send([
        'from'=>'onboarding@resend.dev',
        'to'=> 'ejemplo@gmail.com',
        'subject'=>'Confirmar registro',
        'html'=>'<p>Ingresá a este link para confirmar tu registro: <a href="www.rosarioplazagrande.free.nf/src/confirmoRegistro.php?mail=' . $mailRegistra . '">Link</a></p>'
    ]);
    if(mysqli_query($link,$sql)===TRUE){
        echo "Cuenta registrada";
        header("Location: /public/registro.php?comofue=exitoso");
    } else {
        echo "No se pudo registrar";
        header("Location: /public/registro.php?comofue=algosaliomal");
    }
}

?>