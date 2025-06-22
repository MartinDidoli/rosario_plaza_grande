<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
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

function buscarLocal($codigoLocal){
    include "../src/conectarDB.php";
    $buscoNombre = "SELECT nombreLocal FROM locales WHERE codLocal='$codigoLocal'";
    return(mysqli_fetch_assoc(mysqli_query($link,$buscoNombre))["nombreLocal"]);
}
function buscarVeces($codigoPromo){
    include "../src/conectarDB.php";
    $buscoPromo = "SELECT * FROM uso_promociones WHERE codPromo='$codigoPromo'";
    return(mysqli_num_rows(mysqli_query($link,$buscoPromo)));
}

$buscarPromos1="SELECT * FROM promociones";
$buscarPromos2="SELECT * FROM promociones limit " . $inicio . "," . $cant_por_pag;

$lasPromos = mysqli_query($link,$buscarPromos1);
$totalPromos = mysqli_num_rows($lasPromos);
$total_paginas = ceil($totalPromos/$cant_por_pag);
$lasPromos = mysqli_query($link,$buscarPromos2);
$totalPromos = mysqli_num_rows($lasPromos);

?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Reportes</h2>
            <div class="table-responsive rounded-3 shadow">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Local</th>
                            <th scope="col">Código cupón</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Veces solicitado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($fila=mysqli_fetch_array($lasPromos)){
                            ?>
                            <tr>
                                <td><?php echo (buscarLocal($fila["codLocal"]))?></td>
                                <td><?php echo ($fila["codPromo"])?></td>
                                <td><?php echo ($fila["categoriaCliente"])?></td>
                                <td><?php echo ($fila["textoPromo"])?></td>
                                <td><?php echo buscarVeces($fila["codPromo"])?></td>
                            </tr>
                            <?php
                        }
                        mysqli_free_result($lasPromos);
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-center mt-4">
                <nav aria-label="Paginacion">
                    <ul class="pagination">
                        <?php
                        mysqli_close($link);
                        if ($total_paginas > 1){
                            for ($i=1;$i<=$total_paginas;$i++){
                                if($pagina == $i){
                                    echo '<li class="page-item"><a class="page-link">'. $i .'</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="reportesadmin.php?pagina='. $i .'">'. $i .'</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
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