<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
</head>
    <?php
    if(isset($_GET["comofue"])){
        switch ($_GET["comofue"]){
            case "exitoso":
                include ("includes/registroexitoso.html");
                break;
            case "clavemal":
                include ("includes/registroclavemal.html");
                break;
            case "duplicado":
                include ("includes/registroduplicado.html");
                break;
            case "algosaliomal":
                include ("includes/registroalgosaliomal.html");
                break;
        }        
    }
    ?>
<body>
    <?php
    require("includes/header.php");
    ?>
    <main class="py-5 min-height-main">
        <div class="container">
            <h2 class="text-center mb-4">Seleccioná tu tipo de registro</h2>
            <div class="row justify-content-center align-items-stretch">
                <div class="col-12 col-md-6 mb-4 mb-md-0 d-flex flex-column">
                    <form class="p-4 border rounded shadow-sm bg-white form-box flex-grow-1 d-flex flex-column" action="/webtest/src/registrarCliente.php" method="POST">
                        <h3 class="h4 mb-3 fw-normal text-center">
                            Registrar como cliente
                        </h3>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="clienteMailRegistra" name="clienteMailRegistra" placeholder="nombre@ejemplo.com" required>
                            <label for="clienteMailRegistra">
                                Correo electrónico 
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="clienteClaveRegistra" name="clienteClaveRegistra" placeholder="Password" required>
                            <label for="clienteClaveRegistra">
                                Contraseña
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="clienteConfirmaRegistra" name="clienteConfirmaRegistra" placeholder="Confirmar contraseña" required>
                            <label for="clienteConfirmaRegistra">Confirmar Contraseña</label>
                        </div>
                        <button class="btn btn-primary w-100 py-2 mt-auto" type="submit">
                            Registrar
                        </button>
                    </form>
                </div>
                <div class="col-12 col-md-6 d-flex flex-column">
                    <form class="p-4 border rounded shadow-sm bg-white form-box flex-grow-1 d-flex flex-column" action="/webtest/src/registrarDueno.php" method="POST">
                        <h3 class="h4 mb-3 fw-normal text-center">
                            Registrar como Dueño de Local
                        </h3>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="duenoMailRegistra" name="duenoMailRegistra" placeholder="nombre@ejemplo.com" required>
                            <label for="duenoMailRegistra">
                                Correo electrónico 
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="duenoClaveRegistra" name="duenoClaveRegistra" placeholder="Password" required>
                            <label for="duenoClaveRegistra">
                                Contraseña
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="duenoConfirmaRegistra" name="duenoConfirmaRegistra" placeholder="Confirmar contraseña" required>
                            <label for="duenoConfirmaRegistra">Confirmar Contraseña</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="duenoIdLocalRegistra" name="duenoIdLocalRegistra" placeholder="1234" required>
                            <label for="duenoIdLocalRegistra">
                                ID de su Local 
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2 mt-auto" type="submit">
                            Registrar
                        </button>
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