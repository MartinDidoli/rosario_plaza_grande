<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosario Plaza Grande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
</head>
<?php
session_start();
if(isset($_GET["login"])){
    switch ($_GET["login"]){
        case "afuera":
            include ("includes/loginafuera.html");
            break;
        case "exitoso":
            include ("includes/loginexitoso.php");
            break;
    }        
}
?>
<body>
    <?php
    require("includes/header.php");
    ?>
    <main>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <?php
                if(!isset($_SESSION["usuarioMailSesion"])){
                    ?>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <?php
                }
                ?>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item" data-bs-interval="10000">
                    <img src="assets\shopping1.jpg" class="d-block w-100 c-img" alt="Entrada de un shopping">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-shadow-custom">¡Bienvenidos a nuestro nuevo sitio web!</p>
                        <h1 class="display-1 fw-bolder text-shadow-custom">Rosario Plaza Grande</h1>
                        <a href="/webtest/public/nosotros.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Conocé todo sobre nosotros</a>
                    </div>
                </div>
                <?php
                if(!isset($_SESSION["usuarioMailSesion"])){
                    ?>
                    <div class="carousel-item c-item" data-bs-interval="2000">
                        <img src="assets\shopping2.jpg" class="d-block w-100 c-img" alt="Mujer realizando compras">
                        <div class="carousel-caption top-0 mt-4">
                            <p class="mt-5 fs-3 text-shadow-custom">Reservá los cupones de descuentos para tus compras</p>
                            <h2 class="display-1 fw-bolder text-shadow-custom">¡Registrate!</h2>
                            <a href="/webtest/public/registro.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Registrarme</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="carousel-item c-item">
                    <img src="assets\shopping3.jpg" class="d-block w-100 c-img" alt="Interior de un shopping">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-shadow-custom">Conocé todas las promociones</p>
                        <h2 class="display-1 fw-bolder text-shadow-custom">Todos tus descuentos acá</h2>
                        <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Descuentos</button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previa</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
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