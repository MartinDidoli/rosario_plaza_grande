<div class="container">
    <footer class="py-5">
        <div class="row">
            <div class="col-6">
                <h5>Secciones</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="/public/index.php" class="nav-link p-0 text-body-secondary">Inicio</a>
                    </li>
                    <?php
                    if(!isset($_SESSION["usuarioMailSesion"])){
                    ?>
                    <li class="nav-item mb-2">
                        <a href="/public/contacto.php" class="nav-link p-0 text-body-secondary">Contacto</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/public/nosotros.php" class="nav-link p-0 text-body-secondary">Nosotros</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/public/promociones.php" class="nav-link p-0 text-body-secondary">Promociones</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/public/login.php" class="nav-link p-0 text-body-secondary">Ingresar</a>
                    </li>
                    <?php
                    } else if ($_SESSION["usuarioTipoSesion"]=="administrador") {
                    ?>
                    <li class="nav-item mb-2">
                        <a href="../../src/reportesadmin.php" class="nav-link p-0 text-body-secondary">Reportes</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/localesadmin.php" class="nav-link p-0 text-body-secondary">Locales</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/novedadesadmin.php" class="nav-link p-0 text-body-secondary">Novedades</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/duenosadmin.php" class="nav-link p-0 text-body-secondary">Dueños</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/descuentosadmin.php" class="nav-link p-0 text-body-secondary">Descuentos</a>
                    </li>
                    <?php
                    } else if ($_SESSION["usuarioTipoSesion"]=="dueno") {
                    ?>
                    <li class="nav-item mb-2">
                        <a href="/public/contacto.php" class="nav-link p-0 text-body-secondary">Contacto</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/public/nosotros.php" class="nav-link p-0 text-body-secondary">Nosotros</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/reportesdueno.php" class="nav-link p-0 text-body-secondary">Reportes</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/promocionesdueno.php" class="nav-link p-0 text-body-secondary">Descuentos</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/solicitudesdueno.php" class="nav-link p-0 text-body-secondary">Solicitudes</a>
                    </li>
                    <?php
                    } else {
                    ?>
                    <li class="nav-item mb-2">
                        <a href="/public/contacto.php" class="nav-link p-0 text-body-secondary">Contacto</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/public/nosotros.php" class="nav-link p-0 text-body-secondary">Nosotros</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="/public/promociones.php" class="nav-link p-0 text-body-secondary">Promociones</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="../../src/novedades.php" class="nav-link p-0 text-body-secondary">Novedades</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-6">
                <h5>Contacto</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <p class="nav-link p-0 text-body-secondary">341-2345678</p>
                    </li>
                    <li class="nav-item mb-2">
                        <p class="nav-link p-0 text-body-secondary">Av. Pellegrini 2193</p>
                    </li>
                    <li class="nav-item mb-2">
                        <p class="nav-link p-0 text-body-secondary">rosario@plazagrande.com</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2025 Martín Didoli. Todos los derechos reservados.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3">
                    <a class="link-body-emphasis" href="#" aria-label="Instagram">
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="assets\instagram.svg"></use>
                        </svg>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="link-body-emphasis" href="#" aria-label="Facebook">
                        <svg class="bi" width="24" height="24" aria-hidden="true">
                            <use xlink:href="assets\facebook.svg"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</div>