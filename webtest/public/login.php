<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
</head>

<body>
    <?php
    require("includes/header.php");
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="/webtest/src/confirmaruser.php" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Iniciar sesión
                        </h1>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="usuarioMailIngresa" name="usuarioMailIngresa" placeholder="nombre@ejemplo.com" required>
                            <label for="usuarioMailIngresa">
                                Correo electrónico 
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="usuarioClaveIngresa" name="usuarioClaveIngresa" placeholder="Password" required>
                            <label for="usuarioClaveIngresa">
                                Contraseña
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Ingresar
                        </button>
                        <div class="text-center mt-3">
                            <a href="recuperarContrasena.php" class="btn btn-link text-decoration-none">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="text-center mt-2">
                            <a href="registro.php" class="btn btn-secondary w-100 py-2">
                                Registrarme
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
    require("includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>