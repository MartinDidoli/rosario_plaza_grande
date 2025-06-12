<?php
session_start();
session_destroy();
header("Location: /webtest/public/inicio.php?login=afuera");
?>