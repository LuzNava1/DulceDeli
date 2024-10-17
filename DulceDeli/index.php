<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Desplegable con Ícono</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cookie&display=swap">
    <link rel="stylesheet" href="css/rec.css">
    <!-- REFERENCIA A APP -->
  <script src="js/app.js"></script>
  <link rel="manifest" href="js/manifest.json">
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-red navbar-dark">
        <div class="wrapper">
          
        </div>
  <div class="container-fluid all-show">
        <a class="navbar-brand" href="index.php">Dulce Deli <i class="fa fa-cookie"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                        <a class="dropdown-item" href="galletas.php">Galletas</a>
                        <a class="dropdown-item" href="#">----</a>
                        <a class="dropdown-item" href="#">----</a>
                        <a class="dropdown-item" href="#">----</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
            <div class="d-flex flex-column sim">
            <form action="indes.php" method="GET" class="form-inline">
    <input type="text" placeholder="Buscar productos..." name="q" class="form-control">
    <!-- Elimina el botón y usa el ícono de la lupa -->
    <button type="submit" class="btn btn-dark icono-busqueda">
        <i class="fa fa-search"></i>
    </button>
    <a class="nav-link" href="login.php" title="Iniciar sesión"><i class="fa fa-user"></i></a>
</form>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <!-- Carrusel en la parte izquierda -->
        <div class="col-lg-8 mt-5">
        <h3 style='text-align: center;'>Articulos de temporada</h3>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="" class="d-block w-100" alt="...">
                    </div>
                    <!-- Agrega más elementos del carrusel según sea necesario -->
                </div>
            </div>
        </div>
        <!-- Contenido vertical en la parte derecha -->
        <div class="col-lg-4 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Con descuento</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <!-- Tarjeta para productos con descuento -->
                        <div class="mb-3"> <!-- Agregamos el margen inferior -->
                            <div class="card">
                                <img src="" class="card-img-top" alt="Producto con descuento">
                                <div class="card-body">
                                    <h5 class="card-title">Producto con descuento</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>50% de descuento</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <!-- Tarjeta para productos con 50% de descuento -->
                        <div class="mb-3"> <!-- Agregamos el margen inferior -->
                            <div class="card">
                                <img src="" class="card-img-top" alt="Producto con 50% de descuento">
                                <div class="card-body">
                                    <h5 class="card-title">Producto con 50% de descuento</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Agrega más contenido vertical según sea necesario -->
            </div>
        </div>
    </div>
</div>




<footer class="footer footer-purple">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5><i class="fas fa-phone"></i> Contacto</h5>
                <ul>
                    <li><i class="fas fa-phone"></i> Teléfono: 123-456-789</li>
                    <li><i class="fas fa-envelope"></i> Correo electrónico: info@example.com</li>
                    <!-- Agrega más información de contacto si es necesario -->
                </ul>
            </div>
            <div class="col-md-3">
                <h5><i class="fas fa-question-circle"></i> Ayuda</h5>
                <ul>
                    <li><i class="fas fa-question-circle"></i> <a href="ayuda.php">Preguntas frecuentes</a></li>
                    <li><i class="fas fa-lock"></i> <a href="#">Política de privacidad</a></li>
                    <!-- Agrega más enlaces de ayuda si es necesario -->
                </ul>
            </div>
            <div class="col-md-3">
                <h5><i class="fas fa-key"></i> Recuperación de contraseña</h5>
                <ul>
                    <li><i class="fas fa-unlock-alt"></i> <a href="#">¿Olvidaste tu contraseña?</a></li>
                    <!-- Agrega más enlaces relacionados con la recuperación de contraseña si es necesario -->
                </ul>
            </div>
            <div class="col-md-3">
                <h5><i class="fas fa-comments"></i> Chat</h5>
                <ul>
                    <li><i class="fas fa-comments"></i> <a href="#">Iniciar chat</a></li>
                    <!-- Agrega más enlaces relacionados con el chat si es necesario -->
                </ul>
            </div>
        </div>
    </div>
</footer>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

</body>
</html>
