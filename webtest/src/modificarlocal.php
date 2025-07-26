<?php
$tituloPagina = 'Modificar Local';
require_once("../public/includes/headPublic.php");
?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="/src/confirmarLocalModificado.php?modificoLocal=<?php echo ($_GET["codigo"])?>" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Modificar local
                        </h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="modificoLocal" name="modificoLocal" placeholder="Local" value="<?php echo ($_GET["codigo"])?>" disabled>
                            <label for="modificoLocal">
                                ID del Local
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="modificoNombre" name="modificoNombre" placeholder="Local" value="<?php echo ($_GET["nombre"])?>" required>
                            <label for="modificoNombre">
                                Nombre del Local 
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="modificoUbicacion" name="modificoUbicacion" value="<?php echo ($_GET["ubicacion"])?>" placeholder="Ubicación" required>
                            <label for="modificoUbicacion">
                                Ubicación
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="modificoRubro" name="modificoRubro" value="<?php echo ($_GET["rubro"])?>" placeholder="Rubro" required>
                            <label for="modificoRubro">
                                Rubro
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="modificoDueno" name="modificoDueno" value="<?php echo ($_GET["dueno"])?>" placeholder="Ubicación" required>
                            <label for="modificoDueno">
                                ID del Dueño
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Confirmar modificación
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