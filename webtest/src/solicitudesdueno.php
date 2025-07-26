<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes (Dueño)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
include "conectarDB.php";
$cant_por_pag=5;
$total_paginas=0;
$pagina=isset($_GET["pagina"]) ? $_GET["pagina"]:null;
if (!$pagina){
    $inicio=0;
    $pagina=1;
} else {
    $inicio = ($pagina - 1) * $cant_por_pag;
}

if(isset($_GET["comofue"])){
    switch ($_GET["comofue"]){
        case "aprobada":
            include("../public/includes/soliAprobada.html");
            break;
        case "rechazada":
            include("../public/includes/soliRechazada.html");
            break;
        }
    }

function buscarNombre($codigoUsuario){
    include "../src/conectarDB.php";
    $buscoNombre = "SELECT nombreUsuario FROM usuarios WHERE codUsuario='$codigoUsuario'";
    return(mysqli_fetch_assoc(mysqli_query($link,$buscoNombre))["nombreUsuario"]);
}

$guardoCorresponden=[];
$listaSolis="";
$duenoDe = $_SESSION["usuarioCategoriaSesion"];
$buscarCorresponde = "SELECT * FROM promociones WHERE codLocal='$duenoDe'";
$corresponden = mysqli_query($link,$buscarCorresponde);
while($fila = mysqli_fetch_array($corresponden)){
    $guardoCorresponden[]=$fila["codPromo"];
    if (count($guardoCorresponden)==1){
        $listaSolis.= "codPromo=".$fila["codPromo"];
    } else {
        $listaSolis.= " OR codPromo=".$fila["codPromo"];
    }
}

$lasSolis=null;
if(count($guardoCorresponden)>0){
    $buscarSolis1 = "SELECT * FROM uso_promociones WHERE estado='enviada' AND (". $listaSolis .")";
    $buscarSolis2 = "SELECT * FROM uso_promociones WHERE estado='enviada' AND (". $listaSolis .")". " limit " . $inicio . "," . $cant_por_pag;
    $lasSolis = mysqli_query($link,$buscarSolis1);
    $totalSolis = mysqli_num_rows($lasSolis);
    $total_paginas = ceil($totalSolis/$cant_por_pag);
    $lasSolis = mysqli_query($link,$buscarSolis2);
    $totalSolis = mysqli_num_rows($lasSolis);
}


?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Solicitudes</h2>
            <div class="table-responsive rounded-3 shadow">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Código de cupón</th>
                            <th scope="col">Usuario que solicita</th>
                            <th scope="col">Aprobar</th>
                            <th scope="col">Rechazar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($lasSolis!==null){
                            while($fila=mysqli_fetch_array($lasSolis)){
                            ?>
                            <tr>
                                <td><?php echo ($fila["codPromo"])?></td>
                                <td><?php echo buscarNombre($fila["codCliente"])?></td>
                                <td><a href="/src/aprobarSoli.php?aprobar=<?php echo ($fila["codUso"])?>" style="text-decoration:none">✅</a></td>
                                <td><a href="/src/rechazarSoli.php?rechazo=<?php echo ($fila["codUso"]) ?>" style="text-decoration:none">❌</a></td>
                            </tr>
                            <?php
                            }
                        mysqli_free_result($lasSolis);
                        }
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
                                    echo '<li class="page-item"><a class="page-link" href="solicitudesdueno.php?pagina='. $i .'">'. $i .'</a></li>';
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