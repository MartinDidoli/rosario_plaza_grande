<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
if(isset($_GET["login"])){
    switch ($_GET["login"]){
        case "malaClave":
            include ("includes/malaclave.html");
            break;
        case "noexisteusuario":
            session_start();
            include ("includes/noexisteusuario.html");
            break;
        case "noAprobado":
            include ("includes/noAprobado.html");
            break;
        case "revisarMail":
            include ("includes/revisarMail.html");
            break;
        case "modificoexitoso":
            include ("includes/claveexito.html");
            break;
        case "exitoso":
            include ("includes/verificado.html");
            break;
    }
}
?>
<body>
    <?php
    require("includes/header.php");
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="../../src/confirmaruser.php" method="POST">
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
                            <i class="fa fa-eye toggle-password" data-target="usuarioClaveIngresa"></i>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Ingresar
                        </button>
                        <div class="text-center mt-3">
                            <a href="/public/recuperarContrasena.php" class="btn btn-link text-decoration-none">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="text-center mt-2">
                            <a href="/public/registro.php" class="btn btn-secondary w-100 py-2">
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
    <script src="togglePassword.js"></script>
</body>

</html>