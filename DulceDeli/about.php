<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tienda de Ropa y Accesorios</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/rec.css">
    
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Barra de navegación -->
<?php include('barra.php'); ?>
<?php include('barras.php'); ?>

<!-- Contenido principal -->
<div class="container mt-4">
    <h2>Sobre Nosotros</h2>
    <div class="row">

        <!-- Div de Historia -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">hola</h5>
                    <p class="card-text">Desde nuestros modestos comienzos en 2005, abrimos nuestra primera tienda en un pequeño local en el corazón de la ciudad, dedicándonos a ofrecer una selección cuidadosamente curada de ropa y accesorios únicos. A lo largo de los años, hemos crecido y evolucionado constantemente, expandiéndonos a múltiples ubicaciones y llevando nuestra pasión por la moda a un público más amplio.  En esos primeros días, nuestra dedicación a la calidad y a las últimas tendencias nos convirtió en un referente en el mundo de la moda local. Hoy en día, nuestra tienda en línea permite a clientes de todo el país acceder a nuestra amplia gama de productos. Nos enorgullece ofrecer moda asequible y de alta calidad, manteniendo la misma atención personalizada que nos caracterizó desde el principio. Estamos comprometidos a inspirar confianza y autoexpresión a través de la moda, brindando productos excepcionales y un servicio excepcional a nuestros clientes.</p>
                </div>
            </div>
        </div>

        <!-- Columna izquierda con Visión y Misión -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Visión</h5>
                    <p class="card-text">Buscamos ser reconocidos como la tienda líder en moda, creando tendencias y estableciendo estándares en la industria de la moda.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Misión</h5>
                    <p class="card-text">Nuestra misión es inspirar confianza y autoexpresión a través de la moda, brindando a nuestros clientes productos excepcionales y un servicio excepcional.</p>
                </div>
            </div>
        </div>

        <!-- Columna derecha con Valores y Objetivos -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Valores</h5>
                    <p class="card-text">Compromiso con la calidad, integridad en los negocios, innovación constante y respeto por nuestros clientes son los valores fundamentales que guían nuestras decisiones y acciones.</p>
                </div>
            </div>
        </div>

        <!-- Nuevo contenedor para Objetivos -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Objetivos</h5>
                    <p class="card-text">Nuestros objetivos incluyen expandir nuestra presencia global, ofrecer colecciones innovadoras y mantener altos estándares éticos en todos nuestros procesos.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Agrega el enlace a Bootstrap JS y Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
<?php include('pie.php'); ?>