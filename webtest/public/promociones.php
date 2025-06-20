<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="/webtest/public/css/style.css">
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

if(isset($_SESSION["usuarioCategoriaSesion"]) and $_SESSION["usuarioCategoriaSesion"]=="inicial"){
    $buscarPromos1="SELECT * FROM promociones WHERE estadoPromo='aprobada' AND categoriaCliente='inicial'";
    $buscarPromos2="SELECT * FROM promociones WHERE estadoPromo='aprobada' AND categoriaCliente='inicial'". " limit " . $inicio . "," . $cant_por_pag;
} elseif (isset($_SESSION["usuarioCategoriaSesion"]) and $_SESSION["usuarioCategoriaSesion"]=="medium") {
    $buscarPromos1="SELECT * FROM promociones WHERE estadoPromo='aprobada' AND categoriaCliente!='premium'";
    $buscarPromos2="SELECT * FROM promociones WHERE estadoPromo='aprobada' AND categoriaCliente!='premium'". " limit " . $inicio . "," . $cant_por_pag;
} else {
    $buscarPromos1 = "SELECT * FROM promociones WHERE estadoPromo='aprobada'";
    $buscarPromos2 = "SELECT * FROM promociones WHERE estadoPromo='aprobada'". " limit " . $inicio . "," . $cant_por_pag;
}

$lasPromos = mysqli_query($link,$buscarPromos1);
$totalPromos = mysqli_num_rows($lasPromos);
$total_paginas = ceil($totalPromos/$cant_por_pag);
$lasPromos = mysqli_query($link,$buscarPromos2);
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
                            <?php
                            if(!isset($_SESSION["usuarioTipoSesion"]) or $_SESSION["usuarioTipoSesion"]!=="cliente"){
                                ?>
                                <th scope="col">Categoría</th>
                                <?php
                            }
                            ?>
                            <th scope="col">Vence</th>
                            <th scope="col">Días aplica</th>
                            <th scope="col">Descripción</th>
                            <?php
                                if(isset($_SESSION["usuarioTipoSesion"]) and $_SESSION["usuarioTipoSesion"]=="cliente"){
                                    ?>
                                    <th scope="col">Pedir</th>
                                    <?php
                                }
                            ?>
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
                                <td><?php echo (buscarLocal($fila["codLocal"]))?></td>
                                <?php
                                if(!isset($_SESSION["usuarioTipoSesion"]) or $_SESSION["usuarioTipoSesion"]!=="cliente"){
                                    ?>
                                    <td><?php echo ($fila["categoriaCliente"])?></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo ($fila["fechaHastaPromo"])?></td>
                                <td><?php echo ($diasMuestro) ?></td>
                                <td><?php echo ($fila["textoPromo"])?></td>
                                <?php
                                if(isset($_SESSION["usuarioTipoSesion"]) and $_SESSION["usuarioTipoSesion"]=="cliente"){
                                    ?>
                                    <td><a href="/webtest/src/promoNoAdmin.php?negar=<?php echo ($fila["codPromo"]) ?>" style="text-decoration:none">🙏</a></td>
                                    <?php
                                }
                                ?>
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
                                    echo '<li class="page-item"><a class="page-link" href="promocionesdueno.php?pagina='. $i .'">'. $i .'</a></li>';
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