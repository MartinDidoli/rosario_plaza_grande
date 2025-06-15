<?php
session_start();
session_destroy();
header("Location: /webtest/public/index.php?login=afuera");
?>