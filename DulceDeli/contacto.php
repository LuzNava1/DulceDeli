<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tienda de Ropa y Accesorios</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       #map {
            height: 500px;
            width: 90%;
            margin: 50px auto; /* Ajusta los márgenes */
        }
    </style>
    <link rel="stylesheet" href="css/rec.css">
    
</head>
<body>

<!-- Barra de navegación -->
<?php include('barra.php'); ?>
<?php include('barras.php'); ?>

<!-- Contenido principal -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <h2>Contacta con Nosotros</h2>
            <p>¡Estamos encantados de ayudarte! Ponte en contacto con nosotros para cualquier consulta o comentario.</p>

            <!-- Formulario de contacto -->
            <!-- Nuevo formulario de contacto -->
            <form action="procesar_formulario.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <!-- Fin del nuevo formulario -->
        </div>

        <!-- Información de contacto -->
        <div class="col-lg-4">
            <h2>Información de Contacto</h2>
            <p><strong>Dirección:</strong> Calle Principal, Ciudad</p>
            <p><strong>Teléfono:</strong> +123 456 789</p>
            <p><strong>Correo Electrónico:</strong> info@mitienda.com</p>
        </div>
    </div>
</div>

<!-- Agrega el enlace a Bootstrap JS y Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Mapa -->
<div id="map"></div>
<?php include('pie.php'); ?>
<script>
    function iniciarMap() {
        var coord = {lat:19.2049016, lng: -98.4757613};
        var map = new google.maps.Map(document.getElementById('map'),{
            zoom: 15,
            center: coord
        });
        var marker = new google.maps.Marker({
            position: coord,
            map: map
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3TuclbHLrpheehbpAYtcEDyfaYa5fwbQ&callback=iniciarMap"></script>

</body>
</html>
