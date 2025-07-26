<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosario Plaza Grande - Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
if(isset($_GET["confirmo"])){
    include ("includes/mailEnviado.html");
}
?>
<body>
    <?php
    require("includes/header.php");
    ?>
    <main class="container py-5">
        <h1 class="text-center mb-5">Contacto</h1>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="mb-4 text-center">
                    <p class="lead mb-2"><strong>Dirección:</strong> Av. Pellegrini 2193</p>
                    <p class="lead mb-2"><strong>Teléfono:</strong> +54-341-2345678</p>
                    <p class="lead mb-2"><strong>Mail de contacto:</strong> rosario@plazagrande.com</p>
                </div>
                <hr class="my-5">
                <h2 class="text-center mb-4">Formulario de contacto</h2>
                <form action="../../src/enviarMail.php" method="POST">
                    <div class="mb-3">
                        <label for="mailSender" class="form-label">Tu mail:</label>
                        <input type="email" id="mailSender" name="mailSender" placeholder="mail@ejemplo.com" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreSender" class="form-label">Tu nombre:</label>
                        <input type="text" id="nombreSender" name="nombreSender" placeholder="Juan Pérez" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea type="text" id="mensaje" name="mensaje" placeholder="Escribí tu mensaje acá..." rows=5 class="form-control" required></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                </form>
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