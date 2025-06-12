<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="inicio.php">Rosario Plaza Grande</a>
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
                            <a class="nav-link active" aria-current="page" href="inicio.php">🏠Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link " href="#">👥Contacto</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">😎Nosotros</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">🏷️Promociones</a>
                        </li>
                        <li class="nav-item dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Usuarios
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                                <li><a class="dropdown-item" href="registro.php">Registrarme</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-none d-lg-flex align-items-center">
                        <a href="login.php" class="btn btn-outline-primary me-2">
                            Iniciar sesión
                        </a>
                        <a href="registro.php" class="btn btn-primary">
                            Registrarme
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>