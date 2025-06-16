<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosario Plaza Grande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
</head>
<?php
session_start();
include "../src/conectarDB.php";
$cant_por_pag=5;
$pagina=isset($_GET["pagina"]) ? $_GET["pagina"]:null;
if (!$pagina){
    $inicio=0;
    $pagina=1;
} else {
    $inicio = ($pagina - 1) * $cant_por_pag;
}
if(isset($_SESSION["usuarioCategoriaSesion"])){
    $categoriaAhora=$_SESSION["usuarioCategoriaSesion"];
    switch ($categoriaAhora){
        case "inicial":
            $buscarPromos1= "SELECT *
                            FROM promociones
                            WHERE categoriaCliente='$categoriaAhora'
                            AND fechaHastaPromo >= CURDATE()";

    }
} else {

}
?>
<body>
    <?php
    require("includes/header.php");
    ?>
    <main>

    </main>
    <?php
    require("includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>