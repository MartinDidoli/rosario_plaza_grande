<?php
$tituloPagina = 'Recuperar Contraseña';
require_once("../public/includes/headPublic.php");
$mailClave = $_GET["mail"];
include "conectarDB.php";
$checkMail = "SELECT * FROM usuarios WHERE nombreUsuario = '$mailClave'";
$resultado = mysqli_query($link,$checkMail);
$usuario = mysqli_fetch_assoc($resultado);
$fechaVence = new DateTime($usuario["venceRecuperar"]);
$ahora = new DateTime();
if($fechaVence<$ahora){
    include ("../public/includes/vencido.html");
}
?>
<body>
    <?php
    require("../public/includes/header.php");
    ?>
    <main class="d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <form class="p-4 border rounded shadow-sm bg-white" action="/src/cambioClave.php" method="POST">
                        <h1 class="h3 mb-3 fw-normal">
                            Cambiar contraseña
                        </h1>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="mailCambia" name="mailCambia" placeholder="Mail" value="<?php echo ($_GET["mail"])?>" readonly>
                            <label for="mailCambia">
                                Su mail
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Password" required>
                            <label for="clave">
                                Contraseña nueva
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">
                            Confirmar
                        </button>
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