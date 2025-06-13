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
include "conectarDB.php";
$cant_por_pag=5;
$pagina=isset($_GET["pagina"]) ? $_GET["pagina"]:null;
if (!$pagina){
    $inicio=0;
    $pagina=1;
} else {
    $inicio = ($pagina - 1) * $cant_por_pag;
}
$buscarLocales = "SELECT * FROM locales";
$losLocales = mysqli_query($link,$buscarLocales);
$totalLocales = mysqli_num_rows($losLocales);
$total_paginas = ceil($totalLocales/$cant_por_pag);
$buscarLocales = "SELECT * FROM locales". " limit " . $inicio . "," . $cant_por_pag;
$losLocales = mysqli_query($link,$buscarLocales);
$totalLocales = mysqli_num_rows($losLocales);

?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Locales</h2>
            <div class="table-container-with-button">
                <div class="table-wrapper">
                    <div class="table-responsive rounded-3 shadow">
                        <table class="table table-striped table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ubicación</th>
                                    <th scope="col">Rubro</th>
                                    <th scope="col">Dueño</th>
                                    <th scope="col">Modificar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($fila=mysqli_fetch_array($losLocales)){
                                    ?>
                                    <tr>
                                        <td><?php echo ($fila["codLocal"])?></td>
                                        <td><?php echo ($fila["nombreLocal"])?></td>
                                        <td><?php echo ($fila["ubicacionLocal"])?></td>
                                        <td><?php echo ($fila["rubroLocal"])?></td>
                                        <td>
                                            <?php
                                            $duenoABuscar = $fila["codUsuario"];
                                            $buscarDueno = "SELECT * FROM usuarios WHERE codUsuario = '$duenoABuscar'";
                                            $encontreDueno = mysqli_query($link,$buscarDueno);
                                            $duenoMuestro = mysqli_fetch_assoc($encontreDueno);
                                            echo $duenoMuestro["nombreUsuario"];
                                            mysqli_free_result($encontreDueno);
                                            ?>
                                        </td>
                                        <td>✏️</td>
                                        <td>❌</td>
                                    </tr>
                                    <?php
                                }
                                mysqli_free_result($losLocales);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="create-button-wrapper">
                    <a href="crearLocal.php" class="btn btn-primary btn-lg">Crear Local</a>
                </div>
            </div>
        </div>
    </main>
    <?php
    require("../public/includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>