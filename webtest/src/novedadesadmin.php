<?php
$tituloPagina = 'Novedades - Admin';
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
$buscarNovedades = "SELECT * FROM novedades";
$lasNovedades = mysqli_query($link,$buscarNovedades);
$totalNovedades = mysqli_num_rows($lasNovedades);
$total_paginas = ceil($totalNovedades/$cant_por_pag);
$buscarNovedades = "SELECT * FROM novedades". " limit " . $inicio . "," . $cant_por_pag;
$lasNovedades = mysqli_query($link,$buscarNovedades);
$totalNovedades = mysqli_num_rows($lasNovedades);

if(isset($_GET["comofue"])){
    switch ($_GET["comofue"]){
        case "exitoso":
            include("../public/includes/novedadexitoso.html");
            break;
        case "modificoexitoso":
            include("../public/includes/modificoNovedadexitoso.html");
            break;
        case "eliminaNovedadExitoso":
            include("../public/includes/eliminaNovedadExitoso.html");
            break;
    }
}
if(isset($_GET["borrar"])){
    include("../public/includes/seguroborrarNovedad.php");
}

?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Novedades</h2>
            <div class="table-responsive rounded-3 shadow">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Publicada</th>
                            <th scope="col">Vence</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($fila=mysqli_fetch_array($lasNovedades)){
                            ?>
                            <tr>
                                <td><?php echo ($fila["fechaDesdeNovedad"])?></td>
                                <td><?php echo ($fila["fechaHastaNovedad"])?></td>
                                <td><?php echo ($fila["tipoUsuario"])?></td>
                                <td><?php echo ($fila["textoNovedad"])?></td>
                                <td><a href="/src/modificarNovedad.php?codigo=<?php echo ($fila["codNovedad"]) ?>" style="text-decoration:none">✏️</a></td>
                                <td><a href="/src/novedadesadmin.php?borrar=<?php echo ($fila["codNovedad"]) ?>" style="text-decoration:none">❌</a></td>
                            </tr>
                            <?php
                        }
                        mysqli_free_result($lasNovedades);
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
                                    echo '<li class="page-item"><a class="page-link" href="novedadesadmin.php?pagina='. $i .'">'. $i .'</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <div class="create-button-wrapper">
                    <a href="/src/crearNovedad.php" class="btn btn-primary btn-lg">Crear Novedad</a>
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