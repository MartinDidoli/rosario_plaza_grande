<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locales (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="/webtest/public/css/style.css">
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

if(isset($_GET["comofue"])){
    switch ($_GET["comofue"]){
        case "exitoso":
            include("../public/includes/localexitoso.html");
            break;
        case "modificoexitoso":
            include("../public/includes/modificoexitoso.html");
            break;
        case "eliminaLocalExitoso":
            include("../public/includes/eliminaLocalExitoso.html");
            break;
    }
}
if(isset($_GET["borrar"])){
    include("../public/includes/seguroborrar.php");
}

?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Locales</h2>
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
                                    if($fila["codUsuario"]>0){
                                        $duenoABuscar = $fila["codUsuario"];
                                        $buscarDueno = "SELECT * FROM usuarios WHERE codUsuario = '$duenoABuscar' AND duenoAprobado = 'si'";
                                        $encontreDueno = mysqli_query($link,$buscarDueno);
                                        $duenoMuestro = mysqli_fetch_assoc($encontreDueno);
                                        if ($duenoMuestro == null){
                                            echo "<strong>Falta crear/aprobar</strong>";
                                        } else {
                                            echo $duenoMuestro["nombreUsuario"];
                                        }
                                        mysqli_free_result($encontreDueno);
                                    } else {
                                        echo "<strong>Sin asignar</strong>";
                                    }
                                    ?>
                                </td>
                                <td><a href="/webtest/src/modificarLocal.php?codigo=<?php echo ($fila["codLocal"]).'&nombre='.($fila["nombreLocal"]).'&ubicacion='.($fila["ubicacionLocal"]).'&rubro='.($fila["rubroLocal"]).'&dueno='.($fila["codUsuario"]) ?>" style="text-decoration:none">✏️</a></td>
                                <td><a href="/webtest/src/localesadmin.php?borrar=<?php echo ($fila["codLocal"]) ?>" style="text-decoration:none">❌</a></td>
                            </tr>
                            <?php
                        }
                        mysqli_free_result($losLocales);
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
                                    echo '<li class="page-item"><a class="page-link" href="localesadmin.php?pagina='. $i .'">'. $i .'</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
                <div class="create-button-wrapper">
                    <a href="/webtest/src/crearLocal.php" class="btn btn-primary btn-lg">Crear Local</a>
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