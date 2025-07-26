<?php
$tituloPagina = 'Promociones - admin';
require_once("../public/includes/headPublic.php");
include "conectarDB.php";
$cant_por_pag=5;
$pagina=isset($_GET["pagina"]) ? $_GET["pagina"]:null;
if (!$pagina){
    $inicio=0;
    $pagina=1;
} else {
    $inicio = ($pagina - 1) * $cant_por_pag;
}

$buscarPromos = "SELECT * FROM promociones WHERE estadoPromo='pendiente'";
$lasPromos = mysqli_query($link,$buscarPromos);
$totalPromos = mysqli_num_rows($lasPromos);
$total_paginas = ceil($totalPromos/$cant_por_pag);
$buscarPromos = "SELECT * FROM promociones WHERE estadoPromo='pendiente'". " limit " . $inicio . "," . $cant_por_pag;
$lasPromos = mysqli_query($link,$buscarPromos);
$totalPromos = mysqli_num_rows($lasPromos);

if(isset($_GET["comofue"])){
    switch ($_GET["comofue"]){
        case "aprobado":
            include("../public/includes/promoAprobada.html");
            break;
        case "rechazado":
            include("../public/includes/promoRechazada.html");
            break;
    }
}
if(isset($_GET["borrar"])){
    include("../public/includes/seguroborrarpromo.php");
}

?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Descuentos</h2>
            <div class="table-responsive rounded-3 shadow">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Local</th>
                            <th scope="col">Código</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Vence</th>
                            <th scope="col">Días aplica</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Aprobar</th>
                            <th scope="col">Rechazar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $diasSemana = ["lun","mar","mie","jue","vie","sab","dom"];
                        while($fila=mysqli_fetch_array($lasPromos)){
                            $diasExtraidos=explode(",",$fila["diasSemana"]);
                            $diasArray = [];
                            foreach($diasExtraidos as $i => $aplica){
                                if ($aplica == "1"){
                                    $diasArray[]=$diasSemana[$i];
                                }
                            }
                            $diasMuestro = implode("-",$diasArray);
                            ?>
                            <tr>
                                <td><?php echo ($fila["codLocal"])?></td>
                                <td><?php echo ($fila["codPromo"])?></td>
                                <td><?php echo ($fila["categoriaCliente"])?></td>
                                <td><?php echo ($fila["fechaHastaPromo"])?></td>
                                <td><?php echo ($diasMuestro) ?></td>
                                <td><?php echo ($fila["textoPromo"])?></td>
                                <td><a href="/src/promoYesAdmin.php?aprobar=<?php echo ($fila["codPromo"]) ?>" style="text-decoration:none">👍</a></td>
                                <td><a href="/src/promoNoAdmin.php?negar=<?php echo ($fila["codPromo"]) ?>" style="text-decoration:none">👎</a></td>
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
                                    echo '<li class="page-item"><a class="page-link" href="descuentosadmin.php?pagina='. $i .'">'. $i .'</a></li>';
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