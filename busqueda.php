<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors, and José Barriemtos Vela">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Album example · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <link href="css/bootstrap.min.mod.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <meta name="theme-color" content="#712cf9">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light rounded" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 me-0" href="#">Centered nav</a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="insert.php">Insertar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buscar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <button class="btn btn-primary" id="registro">Registrate</button>
                </div>
            </div>
        </div>
    </nav>
    <div class="cabecera" style="background-image: url('videos/waves.svg');width: 100%;height: 300px;">
        <!-- Barra de busqueda -->
        <form class="barraBusqueda" action="#" method="post">
            <div class="input-group mt-3 mb-3" id="barraBusqueda" style="padding-left: 200px;padding-right: 200px;padding-top: 140px;">
                <select name="tipo" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <option value="Cualquiera">Cualquiera</option>
                    <option value="Betaboxer">Betaboxer</option>
                    <option value="Competicion">Competición</option>
                </select>
                <input type="text" class="form-control" placeholder="Search" name="busqueda">
                <button class="btn btn-success" type="submit" name="buscar">Go</button>
            </div>
        </form>
    </div>
    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    // Declara variables necesarias
                    $resultado = $extrasCadena = "";
                    $i = 1;
                    // Cuando pulsa el boton de buscar recoje los datos
                    if (isset($_REQUEST['buscar'])) {
                        $tipo = $_REQUEST['tipo'];
                        $busqueda = $_REQUEST['busqueda'];

                        // Conecta a la BD
                        $conect = mysqli_connect("localhost", "root", "", "bxn");
                        if (mysqli_connect_errno()) {
                            echo "Fallo al conectar con la base de datos" . mysqli_connect_error();
                            exit;
                        } else {
                            // Envia consulta
                            if (empty($_REQUEST['busqueda']) && $tipo == 'Betaboxer') {
                                $resultado = mysqli_query($conect, "SELECT * FROM beatboxer");
                            } else {
                                if (empty($_REQUEST['busqueda']) && $tipo == 'Competicion') {
                                    $resultado = mysqli_query($conect, "SELECT * FROM competicion");
                                } else {
                                    $resultado = mysqli_query($conect, "SELECT * FROM beatboxer, competicion, user");
                                }
                            }
                        }

                        // Mientras haya resultado de la consulta muestra otra fila en la tabla
                        while ($arrayCunsulta = mysqli_fetch_array($resultado)) {
                    ?>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thubnail</text>
                                    </svg>
                                    <div class="card-body">
                                        <h1><?php echo $arrayCunsulta['nombre'] ?></h1>
                                        <h5><?php echo $arrayCunsulta['edad'] ?> años</h5>
                                        <h5><?php echo $arrayCunsulta['nacionalidad'] ?></h5>
                                        <p class="card-text"><?php if (empty($arrayCunsulta['descripcion'])) {
                                                                    echo '        - ';
                                                                } else {
                                                                    echo $arrayCunsulta['descripcion'];
                                                                } ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    <?php
                    }
    ?>
    </main>
    <div class="b-example-divider"></div>
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Contacto</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Recursos</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribete a nuestra newsletter</h5>
                        <p>Mantente informado con nuestro contenido exclusivo. ¡No te quedes atrás y únete a nuestra comunidad de seguidores!</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2022 BeatboxNews, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><img src="images/rrss/linkedin.png" alt="" width="20px"></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="images/rrss/instagram.png" alt="" width="20px"></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="images/rrss/facebook.png" alt="" width="20px"></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="images/rrss/youtube.png" alt="" width="25px"></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="images/rrss/email.png" alt="" width="20px"></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="images/rrss/whatsapp.png" alt="" width="20px"></a></li>
                </ul>
            </div>
        </footer>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/busqueda.js"></script>


</body>

</html>