<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body>
<?php include('barra.php'); ?>
<?php include('barras.php'); ?>
<?php
include('inc/conexion.php');


// Manejar la búsqueda si se envió el formulario
if (isset($_GET['q'])) {
    $termino_busqueda = $_GET['q'];

    // Sanitizar la entrada del usuario para evitar inyección de SQL
    $termino_busqueda = mysqli_real_escape_string($conexion, $termino_busqueda);

    // Buscar en todas las tablas "Aqui van las tablas donde quieres buscar agrega mas si es necesario"
    $tablas = ['dulces', 'juguetes', 'joyeria','galletas'];
    $resultados_totales = [];

    foreach ($tablas as $tabla) {
        // Construir la consulta SQL con el operador LIKE para buscar palabras similares
        $consulta = "SELECT * FROM $tabla WHERE nombre LIKE '%$termino_busqueda%'";

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
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $resultados_totales[$tabla][] = $fila;
            }
        }
    }

    // Mostrar los resultados en tarjetas
    echo "<div class='container'>";
    echo "<h2 class='titulo-central'>Resultados de $termino_busqueda:</h2>";

    
    // Agregar los botones de ordenar por precio
    echo "<div class='btn-group' role='group' aria-label='Filtrar por precio'>";
    echo "<a href='?q=$termino_busqueda&filtro=mas_barato' class='btn btn-primary'>Más barato</a>";
    echo "<a href='?q=$termino_busqueda&filtro=mas_caro' class='btn btn-primary'>Más caro</a>";
    echo "</div>";

    if (empty($resultados_totales)) {
        echo "<p>No tenemos esos artículos</p>";
    } else {
        foreach ($resultados_totales as $tabla => $resultados) {
            echo "<div class='row'>";
            foreach ($resultados as $producto) {
                echo "<div class='col-md-4 mb-3'>";
                echo "<div class='card'>";
                echo "<img src='$producto[imagen]' class='card-img-top img-fluid' alt='Imagen del producto'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>$producto[nombre]</h5>";

                // Mostrar todos los campos excepto el id y la columna "nombre" y "imagen"
                foreach ($producto as $campo => $valor) {
                    if ($campo != 'id' && $campo != 'nombre' && $campo != 'imagen') {
                        echo "<p class='card-text'>$campo: $valor</p>";
                    }
                }
                
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>"; // Cerrar fila
        }
    }
    echo "</div>"; // Cerrar contenedor
}
?>
<?php include('pie.php'); ?>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-p6F0s82JFbRxkiq4omNjK1wuF7V7w6gJwTsL0sQcg/rQ21hM/6q6rt0z7TjBpGFF" crossorigin="anonymous"></script>
</body>
</html>
