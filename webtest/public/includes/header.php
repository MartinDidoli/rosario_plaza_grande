<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="/webtest/public/index.php">Rosario Plaza Grande</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Rosario Plaza Grande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 mx-auto">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="/webtest/public/index.php">🏠Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link " href="#">👥Contacto</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="/webtest/public/nosotros.php">😎Nosotros</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#'">🏷️Promociones</a>
                        </li>
                        <li class="nav-item dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php
                                if(!isset($_SESSION["usuarioMailSesion"])){
                                    echo "Usuarios";
                                } elseif ($_SESSION["usuarioTipoSesion"]=="administrador") {
                                    echo "Menú Administrador";
                                } elseif ($_SESSION["usuarioTipoSesion"]=="dueno"){
                                    echo "Menú Dueños";
                                } else {
                                    echo "Menú Clientes";
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if(!isset($_SESSION["usuarioMailSesion"])){
                                    ?>
                                    <li><a class="dropdown-item" href="/webtest/public/login.php">Iniciar sesión</a></li>
                                    <li><a class="dropdown-item" href="/webtest/public/registro.php">Registrarme</a></li>
                                    <?php
                                } elseif ($_SESSION["usuarioTipoSesion"]=="administrador") {
                                    ?>
                                    <li><a class="dropdown-item" href="/webtest/src/reportesadmin.php">Reportes</a></li>
                                    <li><a class="dropdown-item" href="/webtest/src/localesadmin.php">Locales</a></li>
                                    <li><a class="dropdown-item" href="/webtest/src/novedadesadmin.php">Novedades</a></li>
                                    <li><a class="dropdown-item" href="/webtest/src/duenosadmin.php">Dueños</a></li>
                                    <li><a class="dropdown-item" href="/webtest/src/descuentosadmin.php">Descuentos</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/webtest/src/cerrarsesion.php">Cerrar sesión</a></li>
                                    <?php
                                } elseif ($_SESSION["usuarioTipoSesion"]=="dueno") {
                                    ?>
                                    <li><a class="dropdown-item" href="/webtest/src/reportesdueno.php">Reportes</a></li>
                                    <li><a class="dropdown-item" href="/webtest/src/descuentosdueno.php">Descuentos</a></li>
                                    <li><a class="dropdown-item" href="/webtest/src/solicitudesdueno.php">Solicitudes</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/webtest/src/cerrarsesion.php">Cerrar sesión</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="dropdown-item" href="/webtest/src/novedades.php">📢Novedades</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/webtest/src/cerrarsesion.php">Cerrar sesión</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    <?php
                    if(!isset($_SESSION["usuarioMailSesion"])){
                        ?>
                        <div class="d-none d-lg-flex align-items-center">
                            <a href="/webtest/public/login.php" class="btn btn-outline-primary me-2">
                                Iniciar sesión
                            </a>
                            <a href="/webtest/public/registro.php" class="btn btn-primary">
                                Registrarme
                            </a>
                        </div>
                        <?php
                    } elseif ($_SESSION["usuarioTipoSesion"]=="administrador"){
                        ?>
                        <div class="btn-group d-none d-lg-flex align-items-center">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Menú Administrador
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/webtest/src/reportesadmin.php">Reportes</a></li>
                                <li><a class="dropdown-item" href="/webtest/src/localesadmin.php">Locales</a></li>
                                <li><a class="dropdown-item" href="/webtest/src/novedadesadmin.php">Novedades</a></li>
                                <li><a class="dropdown-item" href="/webtest/src/duenosadmin.php">Dueños</a></li>
                                <li><a class="dropdown-item" href="/webtest/src/descuentosadmin.php">Descuentos</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/webtest/src/cerrarsesion.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                        <?php
                    } elseif ($_SESSION["usuarioTipoSesion"]=="dueno"){
                        ?>
                        <div class="btn-group d-none d-lg-flex align-items-center">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Menú Dueños
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/webtest/src/reportesdueno.php">Reportes</a></li>
                                <li><a class="dropdown-item" href="/webtest/src/descuentosdueno.php">Descuentos</a></li>
                                <li><a class="dropdown-item" href="/webtest/src/solicitudesdueno.php">Solicitudes</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/webtest/src/cerrarsesion.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="btn-group d-none d-lg-flex align-items-center">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Menú Clientes
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/webtest/src/novedades.php">📢Novedades</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/webtest/src/cerrarsesion.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>