<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Novedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php
    session_start();
    include "conectarDB.php";
    require("../public/includes/header.php");
    $codNov = $_GET["codigo"];
    $checkNovedad = "SELECT * FROM novedades WHERE codNovedad = '$codNov'";
    $resultado = mysqli_query($link,$checkNovedad);
    $novedad = mysqli_fetch_assoc($resultado);
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="/src/confirmarNovedadModificada.php?codigo=<?php echo ($_GET["codigo"])?>" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Modificar novedad
                        </h1>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="modificoDesc" name="modificoDesc" placeholder="Descripción" required><?php echo $novedad["textoNovedad"]?></textarea>
                            <label for="modificoDesc">
                                Descripción de la Novedad 
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="fechaPublicacion" name="fechaPublicacion" value="<?php echo $novedad["fechaDesdeNovedad"] ?>" readonly>
                            <label for="fechaPublicacion">
                                Fecha de publicación
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="vencimiento" name="vencimiento" value="<?php echo $novedad["fechaHastaNovedad"] ?>" readonly>
                            <label for="vencimiento">
                                Vencimiento
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="modificoCategoria" name="modificoCategoria" required>
                                <option value="inicial" <?php echo ($novedad["tipoUsuario"] == 'inicial') ? 'selected' : ''; ?>>Inicial</option>
                                <option value="medium" <?php echo ($novedad["tipoUsuario"] == 'medium') ? 'selected' : ''; ?>>Medium</option>
                                <option value="premium" <?php echo ($novedad["tipoUsuario"] == 'premium') ? 'selected' : ''; ?>>Premium</option>
                            </select>
                            <label for="modificoCategoria">
                                Categoría
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Confirmar modificación
                        </button>
                        <div class="text-center mt-2">
                            <a href="/src/novedadesadmin.php" class="btn btn-secondary w-100 py-2">
                                Cancelar
                            </a>
                        </div>
                    </form>
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