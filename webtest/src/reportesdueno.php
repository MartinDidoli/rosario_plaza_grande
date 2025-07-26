<?php
$tituloPagina = 'Reportes - Dueño';
require_once("../public/includes/headPublic.php");
include "../src/conectarDB.php";
$cant_por_pag=5;
$pagina=isset($_GET["pagina"]) ? $_GET["pagina"]:null;
if (!$pagina){
    $inicio=0;
    $pagina=1;
} else {
    $inicio = ($pagina - 1) * $cant_por_pag;
}

function buscarVeces($codigoPromo){
    include "../src/conectarDB.php";
    $buscoPromo = "SELECT * FROM uso_promociones WHERE codPromo='$codigoPromo'";
    return(mysqli_num_rows(mysqli_query($link,$buscoPromo)));
}


$localPertenece=$_SESSION["usuarioCategoriaSesion"];
$buscarPromos1="SELECT * FROM promociones WHERE codLocal='$localPertenece'";
$buscarPromos2="SELECT * FROM promociones WHERE codLocal='$localPertenece' limit " . $inicio . "," . $cant_por_pag;

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
                                    echo '<li class="page-item"><a class="page-link" href="reportesdueno.php?pagina='. $i .'">'. $i .'</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-primary" onclick="imprimirTabla()">Imprimir Tabla</button>
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
    <script>
        function imprimirTabla() {
            const contenidoParaImprimir = document.querySelector('.table-responsive');
            const tituloReportes = document.querySelector('h2.mb-4.text-center');

            const ventanaImpresion = window.open('', '_blank');

            ventanaImpresion.document.write('<html><head><title>Reporte de Promociones</title>');
            ventanaImpresion.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">');
            ventanaImpresion.document.write('<style>');
            ventanaImpresion.document.write('body { margin: 20px; }');
            ventanaImpresion.document.write('table { width: 100%; border-collapse: collapse; }');
            ventanaImpresion.document.write('th, td { border: 1px solid #dee2e6; padding: 8px; text-align: left; }');
            ventanaImpresion.document.write('thead th { background-color: #343a40; color: white; }');
            ventanaImpresion.document.write('h2 { text-align: center; margin-bottom: 20px; }');
            ventanaImpresion.document.write('</style>');
            ventanaImpresion.document.write('</head><body>');
            
            if (tituloReportes) {
                ventanaImpresion.document.write(tituloReportes.outerHTML);
            }
            
            if (contenidoParaImprimir) {
                ventanaImpresion.document.write(contenidoParaImprimir.outerHTML);
            }
            
            ventanaImpresion.document.write('</body></html>');
            ventanaImpresion.document.close();

            ventanaImpresion.onload = function() {
                ventanaImpresion.print();
                ventanaImpresion.close();
            };
        }
    </script>
</body>

</html>