<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dueños (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
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
$buscarDuenos = "SELECT * FROM usuarios WHERE tipoUsuario='dueno'";
$losDuenos = mysqli_query($link,$buscarDuenos);
$totalDuenos = mysqli_num_rows($losDuenos);
$total_paginas = ceil($totalDuenos/$cant_por_pag);
$buscarDuenos = "SELECT * FROM usuarios WHERE tipoUsuario='dueno'". " limit " . $inicio . "," . $cant_por_pag;
$losDuenos = mysqli_query($link,$buscarDuenos);
$totalDuenos = mysqli_num_rows($losDuenos);

?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Dueños</h2>
            <div class="table-responsive rounded-3 shadow">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Local</th>
                            <th scope="col">¿Aprobado?</th>
                            <th scope="col">Aprobar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($fila=mysqli_fetch_array($losDuenos)){
                            ?>
                            <tr>
                                <td><?php echo ($fila["codUsuario"])?></td>
                                <td><?php echo ($fila["nombreUsuario"])?></td>
                                <td>
                                    <?php
                                    if($fila["categoriaCliente"]>0){
                                        $localABuscar = $fila["codUsuario"];
                                        $buscarLocal = "SELECT * FROM locales WHERE codUsuario = '$localABuscar'";
                                        $encontreLocal = mysqli_query($link,$buscarLocal);
                                        $localMuestro = mysqli_fetch_assoc($encontreLocal);
                                        if ($localMuestro == null){
                                            echo "<strong>No existe el local</strong>";
                                        } else {
                                            echo $localMuestro["nombreLocal"];
                                        }
                                        mysqli_free_result($encontreLocal);
                                    } else {
                                        echo "<strong>Sin asignar</strong>";
                                    }
                                    ?>
                                </td>
                                <td><?php echo ($fila["duenoAprobado"])?></td>
                                <td><a href="/src/aprobardueno.php?aprobar=<?php echo ($fila["codUsuario"])?>" style="text-decoration:none">✅</a></td>
                                <td><a href="/src/rechazardueno.php?borrar=<?php echo ($fila["codUsuario"]) ?>" style="text-decoration:none">❌</a></td>
                            </tr>
                            <?php
                        }
                        mysqli_free_result($losDuenos);
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
                                    echo '<li class="page-item"><a class="page-link" href="duenosadmin.php?pagina='. $i .'">'. $i .'</a></li>';
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