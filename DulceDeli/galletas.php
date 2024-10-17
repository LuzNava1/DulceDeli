<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyería</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+zfg4vObwxExn1RS8y8ct5S+8r4Bf4Itrs0twDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/rec.css">
    
</head>
<body>
<?php include('barra.php'); ?>
<?php include('barras.php'); ?>

<div class="container">
    <!-- Aplicar la clase CSS al h2 -->
    <h2 class="titulo-central">Productos de Joyería</h2>
    <div class="btn-group espacio-boton-filtro" role="group" aria-label="Filtrar por precio">
        <a href="?filtro=mas_barato" class="btn btn-primary">Más barato</a>
        <a href="?filtro=mas_caro" class="btn btn-primary">Más caro</a>
    </div>
    <div class="row">
        <?php
        include('inc/conexion.php');

        // Consulta SQL para obtener todos los productos de la tabla "joyeria"
        $consulta = "SELECT * FROM joyeria";

        // Aplicar filtro si se especifica
        if (isset($_GET['filtro'])) {
            $filtro = $_GET['filtro'];
            if ($filtro == 'mas_caro') {
                $consulta .= " ORDER BY precio DESC";
            } elseif ($filtro == 'mas_barato') {
                $consulta .= " ORDER BY precio ASC";
            }
        }

        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se obtuvieron resultados
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($producto = mysqli_fetch_assoc($resultado)) {
                echo "<div class='col-md-4 mb-3'>";
                echo "<div class='card'>";
                echo "<img src='$producto[imagen]' class='card-img-top img-fluid' alt='Imagen del producto'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$producto[nombre]</h5>";
                
                // Mostrar todos los campos excepto el id, el nombre y la imagen
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
            echo "<p>No hay productos de joyería disponibles en este momento.</p>";
        }
        ?>
    </div>
</div>
<?php include('pie.php'); ?>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-p6F0s82JFbRxkiq4omNjK1wuF7V7w6gJwTsL0sQcg/rQ21hM/6q6rt0z7TjBpGFF" crossorigin="anonymous"></script>
</body>
</html>
