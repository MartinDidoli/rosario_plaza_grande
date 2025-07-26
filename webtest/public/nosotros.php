<?php
$tituloPagina = 'Rosario Plaza Grande - Nosotros';
require_once("includes/headPublic.php");
?>
<body>
    <?php
    require("includes/header.php");
    ?>
    <main>
        <div class="container py-5">
            <h1 class="text-center mb-5">Acerca del shopping</h1>
            <div class="row g-4 justify-content-center">
                <div class="col-md-7">
                    <div class="ratio ratio-16x9 border border-secondary shadow-sm rounded-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3347.8593284340654!2d-60.6556302!3d-32.9547232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab6c48ca442d%3A0x58f671d4e2123dd9!2sAv.%20Pellegrini%202193%2C%20S2000%20Rosario%2C%20Santa%20Fe!5e0!3m2!1sen!2sar!4v1750025008939!5m2!1sen!2sar" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="p-4 bg-white border border-secondary shadow-sm rounded-3 h-100 d-flex flex-column justify-content-center">
                        <h2 class="mb-3 text-dark">Horarios</h2>
                        <p class="mb-1 fs-5 text-secondary">Lunes a Viernes 8hs - 23hs</p>
                        <p class="mb-1 fs-5 text-secondary">Sábados 7hs - 24hs</p>
                        <p class="mb-1 fs-5 text-secondary">Domingos 8hs - 20hs</p>
                        <p class="mb-0 fs-5 text-secondary">Feriados 8hs - 20hs</p>
                    </div>
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