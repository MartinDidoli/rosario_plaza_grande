<?php
$tituloPagina = 'Rosario Plaza Grande - Recuperar Contraseña';
require_once("includes/headPublic.php");
if(isset($_GET["login"])){
    switch ($_GET["login"]){
        case "malaClave":
            include ("includes/malaclave.html");
            break;
        case "noexisteusuario":
            include ("includes/noexisteusuario.html");
            break;
        case "noAprobado":
            include ("includes/noAprobado.html");
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
                    <form class="p-4 border rounded shadow-sm bg-white" action="../../src/mailRecuperacion.php" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Recuperar contraseña
                        </h1>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="usuarioMailIngresa" name="usuarioMailIngresa" placeholder="nombre@ejemplo.com" required>
                            <label for="usuarioMailIngresa">
                                Correo electrónico 
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Recuperar
                        </button>
                        <div class="text-center mt-2">
                            <a href="/public/login.php" class="btn btn-secondary w-100 py-2">
                                Volver
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