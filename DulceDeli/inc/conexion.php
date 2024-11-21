<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "DulceDeli";

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_errno) {
    echo "Falló al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

// Opcional: Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

// Función para realizar la búsqueda en todos los campos de una tabla específica
function buscarProductos($termino, $tabla) {
    global $conexion;

    $termino = $conexion->real_escape_string($termino);
    $tabla = $conexion->real_escape_string($tabla);

    // Obtener nombres de columnas de la tabla
    $columnas = obtenerNombresColumnas($tabla);

    // Construir la parte WHERE de la consulta
    $where = [];
    foreach ($columnas as $columna) {
        $where[] = "$columna LIKE '%$termino%'";
    }

    // Unir las condiciones con OR
    $where_condicion = implode(" OR ", $where);

    // Construir la consulta
    $query = "SELECT * FROM $tabla WHERE $where_condicion";
    
    $resultado = $conexion->query($query);

    if (!$resultado) {
        die("Error en la consulta: " . $conexion->error);
    }

    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// Función para obtener los nombres de las columnas de una tabla
function obtenerNombresColumnas($tabla) {
    global $conexion;

    $columnas = [];
    $resultado = $conexion->query("SHOW COLUMNS FROM $tabla");

    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            $columnas[] = $fila['Field'];
        }
        $resultado->free();
    }

    return $columnas;
}



?>
