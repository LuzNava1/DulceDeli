<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulce Deli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cookie&display=swap">
    <link rel="stylesheet" href="css/rec.css">
    <!-- PARA LA PWA -->
    <link rel="manifest" href="js/manifest.json"> 
    <script defer src="js/app.js"></script>
    <!-- FIN PWA -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Push.Permission.request();
            Push.create('Bienvenido a Dulce Deli', {
                body: '¡Explora nuestros productos y ofertas especiales!',
                icon: 'imagenes/Logo.png',
                timeout: 4000,
                onClick: function() {
                    window.focus();
                    this.close();
                }
            });
        });
    </script>
    
    <script>
    // JavaScript para ocultar la pantalla Splash después de 3 segundos
document.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    document.getElementById("splash-screen").style.display = "none"; // Oculta la pantalla Splash
    document.getElementById("main-content").style.display = "block"; // Muestra el contenido principal
  }, 3000); // Cambia el tiempo en milisegundos (3000 ms = 3 segundos)
});
 </script>
</head>
<body>

     <!-- Pantalla Splash -->
<div id="splash-screen" class="splash-screen">
    <img src="imagenes/Logo_DulceDeli.png" alt="Logo de la aplicación">
    <h1>Bienvenido a Dulce Deli Reposteria casera</h1>
  </div>
    
<nav class="navbar navbar-expand-lg navbar-red navbar-dark">
    <div class="container-fluid all-show">
        <a class="navbar-brand" href="index.php">Dulce Deli <i class="fa fa-cookie"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                        <a class="dropdown-item" href="galletas.php">Galletas</a>
                        <a class="dropdown-item" href="pasteles.php">Pasteles</a>
                        <a class="dropdown-item" href="#">Pays</a>
                        <a class="dropdown-item" href="#">Roscas</a>
                    </div>


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contáctame</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recomendacion.html">Recomendaciones</a>
                </li>
            </ul>
            <div class="d-flex flex-column sim">
                <form action="index.php" method="GET" class="form-inline">
                    <input type="text" placeholder="Buscar productos..." name="q" class="form-control">
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
        <div class="col-lg-8 mt-5">
            <h3 style="text-align: center;">Artículos de temporada</h3>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagenes/cisne.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/pastel.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/Galletas.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-5">
            <div class="container">
                <h3>De temporada</h3>
               
                <div class="card">
                    <img src="imagenes/pay.png" class="card-img-top" alt="Pay de queso crema">
                    <div class="card-body">
                        <h5 class="card-title">Producto con descuento</h5>
                        <p class="card-text">Pay de queso crema.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<footer class="footer footer-purple">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5><i class="fas fa-phone"></i> Contacto</h5>
                <ul>
                    <li><i class="fas fa-phone"></i> Teléfono: 123-456-789</li>
                    <li><i class="fas fa-envelope"></i> Correo electrónico: info@example.com</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5><i class="fas fa-question-circle"></i> Ayuda</h5>
                <ul>
                    <li><i class="fas fa-question-circle"></i> <a href="ayuda.php">Preguntas frecuentes</a></li>
                    <li><i class="fas fa-lock"></i> <a href="#">Política de privacidad</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>-->

<?php include('pie.php'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
