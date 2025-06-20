<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Descuento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="/webtest/public/css/style.css">
</head>
<body>
    <?php
    session_start();
    require("../public/includes/header.php");
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="/webtest/src/confirmarPromo.php" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Creando nueva promo
                        </h1>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="nuevaPromo" name="nuevaPromo" placeholder="Promo" required></textarea>
                            <label for="nuevaPromo">
                                Descripción de la promo 
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="fechaVence" class="form-label">
                                Día que vence
                            </label>
                            <input type="date" class="form-control" id="fechaVence" name="fechaVence" required>
                        </div>
                        <div class="mb-3">
                            <label for="catCli" class="form-label">
                                Categoría de Cliente
                            </label>
                            <select class="form-select" id="catCli" name="catCli" required>
                                <option value="" disabled selected>Selecciona una categoría</option>
                                <option value="inicial">Inicial</option>
                                <option value="medium">Medium</option>
                                <option value="premium">Premium</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Días de la semana que aplica:
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="0" id="lunes">
                                <label class="form-check-label" for="lunes">Lunes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="1" id="martes">
                                <label class="form-check-label" for="martes">Martes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="2" id="miercoles">
                                <label class="form-check-label" for="miercoles">Miércoles</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="3" id="jueves">
                                <label class="form-check-label" for="jueves">Jueves</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="4" id="viernes">
                                <label class="form-check-label" for="viernes">Viernes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="5" id="sabado">
                                <label class="form-check-label" for="sabado">Sábado</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="diasApl[]" value="6" id="domingo">
                                <label class="form-check-label" for="domingo">Domingo</label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Crear Promo
                        </button>
                        <div class="text-center mt-2">
                            <a href="/webtest/src/promocionesdueno.php" class="btn btn-secondary w-100 py-2">
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