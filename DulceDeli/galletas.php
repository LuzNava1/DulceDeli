<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galletas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cookie&display=swap">
    <link rel="stylesheet" href="css/rec.css">
    <style>
        .card {
            margin: 5px; /* Reducir el margen entre tarjetas */
            max-height: 300px; /* Altura máxima de la tarjeta */
        }
        .card-img-top {
            max-height: 150px; /* Altura máxima de las imágenes */
            object-fit: cover; /* Ajustar imágenes sin deformarlas */
        }
    </style>
</head>
<body>

<!-- Barra de navegación -->
<?php include('barra.php'); ?>
<?php include('barras.php'); ?>

<div class="container">
    <h2 class="titulo-central">Catálogo de galletas</h2>
    <div class="btn-group espacio-boton-filtro" role="group" aria-label="Filtrar por precio">
        <a href="?filtro=mas_barato" class="btn btn-primary">Más barato</a>
        <a href="?filtro=mas_caro" class="btn btn-primary">Más caro</a>
    </div>
    <div class="row">
        <?php
        include('inc/conexion.php');

        $consulta = "SELECT * FROM joyeria";

        if (isset($_GET['filtro'])) {
            $filtro = $_GET['filtro'];
            if ($filtro == 'mas_caro') {
                $consulta .= " ORDER BY precio DESC";
            } elseif ($filtro == 'mas_barato') {
                $consulta .= " ORDER BY precio ASC";
            }
        }

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($producto = mysqli_fetch_assoc($resultado)) {
                echo "<div class='col-6 col-sm-4 col-md-3 col-lg-2 mb-3'>"; // Diseño compacto y responsive
                echo "<div class='card'>";
                echo "<img src='$producto[imagen]' class='card-img-top img-fluid' alt='Imagen del producto'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$producto[nombre]</h5>";
                foreach ($producto as $campo => $valor) {
                    if ($campo != 'id' && $campo != 'nombre' && $campo != 'imagen') {
                        echo "<p class='card-text'>$campo: $valor</p>";
                    }
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay productos de galletas disponibles en este momento.</p>";
        }
        ?>
    </div>
</div>
<?php include('pie.php'); ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
