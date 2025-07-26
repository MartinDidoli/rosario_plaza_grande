<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear local</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="/src/confirmarLocal.php" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Creando nuevo local
                        </h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nuevoLocalNombre" name="nuevoLocalNombre" placeholder="Local" required>
                            <label for="nuevoLocalNombre">
                                Nombre del Local 
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nuevoLocalUbicacion" name="nuevoLocalUbicacion" placeholder="Ubicación" required>
                            <label for="nuevoLocalUbicacion">
                                Ubicación
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nuevoLocalRubro" name="nuevoLocalRubro" placeholder="Rubro" required>
                            <label for="nuevoLocalRubro">
                                Rubro
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nuevoLocalDueno" name="nuevoLocalDueno" placeholder="Dueño">
                            <label for="nuevoLocalDueno">
                                ID del Dueño
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Crear local
                        </button>
                        <div class="text-center mt-2">
                            <a href="/src/localesadmin.php" class="btn btn-secondary w-100 py-2">
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