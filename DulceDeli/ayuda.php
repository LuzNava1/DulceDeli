<?php
// Incluir el archivo de conexión a la base de datos
include_once("inc/conexion.php");

// Verificar si se recibió una solicitud POST para procesar una nueva pregunta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió la pregunta desde el formulario
    if (isset($_POST["pregunta"]) && !empty($_POST["pregunta"])) {
        // Obtener la pregunta desde el formulario
        $pregunta = $_POST["pregunta"];
        
        // Guardar la pregunta en la base de datos
        if (guardarPregunta($pregunta)) {
            // La pregunta se guardó correctamente
            echo "<div class='alert alert-success' role='alert'>¡Tu pregunta ha sido enviada con éxito!</div>";
        } else {
            // Ocurrió un error al guardar la pregunta
            echo "<div class='alert alert-danger' role='alert'>Error al enviar la pregunta. Por favor, inténtalo de nuevo más tarde.</div>";
        }
    } else {
        // La pregunta no se recibió o está vacía
        echo "<div class='alert alert-warning' role='alert'>Por favor, asegúrate de escribir una pregunta antes de enviarla.</div>";
    }
}

// Función para guardar la pregunta en la base de datos
function guardarPregunta($pregunta) {
    // Obtener la conexión a la base de datos desde el archivo de conexión
    $conexion = new mysqli("localhost", "root", "", "DulceDeliOf");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_errno) {
        // Si la conexión falla, mostrar un mensaje de error y retornar false
        echo "Error: No se pudo conectar a la base de datos. " . $conexion->connect_error;
        return false;
    }
    
    // Preparar la consulta SQL para insertar la pregunta en la tabla
    $consulta = "INSERT INTO PreguntasFrecuentes (pregunta) VALUES ('$pregunta')";
    
    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        // Si la consulta se ejecuta correctamente, cerrar la conexión y retornar true
        $conexion->close();
        return true;
    } else {
        // Si la consulta falla, mostrar un mensaje de error y retornar false
        echo "Error: " . $consulta . "<br>" . $conexion->error;
        $conexion->close();
        return false;
    }
}

// Obtener todas las preguntas y respuestas de la base de datos
function obtenerPreguntas() {
    // Obtener la conexión a la base de datos desde el archivo de conexión
    $conexion = new mysqli("localhost", "root", "", "DulceDeliOf");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_errno) {
        // Si la conexión falla, mostrar un mensaje de error y retornar false
        echo "Error: No se pudo conectar a la base de datos. " . $conexion->connect_error;
        return false;
    }

    // Preparar la consulta SQL para obtener todas las preguntas y respuestas
    $consulta = "SELECT pregunta, respuesta FROM PreguntasFrecuentes";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Crear un array para almacenar las preguntas y respuestas
        $preguntas_respuestas = array();

        // Recorrer los resultados y almacenar cada pregunta y respuesta en el array
        while ($fila = $resultado->fetch_assoc()) {
            $preguntas_respuestas[] = $fila;
        }

        // Cerrar la conexión y retornar el array de preguntas y respuestas
        $conexion->close();
        return $preguntas_respuestas;
    } else {
        // Si no se encontraron preguntas y respuestas, mostrar un mensaje y retornar false
        echo "No se encontraron preguntas y respuestas.";
        $conexion->close();
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda - Preguntas Frecuentes</title>
    <!-- Enlaces a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Barra de navegación -->
<?php include('barra.php'); ?>
<?php include('barras.php'); ?>

    <main class="py-5">
        <div class="container">
            <!-- Sección de preguntas frecuentes -->
            <section>
                <h2>Preguntas Frecuentes</h2>
                <?php
                // Obtener todas las preguntas y respuestas
                $preguntas_respuestas = obtenerPreguntas();

                // Verificar si se obtuvieron preguntas y respuestas
                if ($preguntas_respuestas) {
                    // Mostrar cada pregunta y su respuesta en una lista con íconos de respuesta
                    foreach ($preguntas_respuestas as $pregunta_respuesta) {
                        echo "<div class='mb-3'>";
                        echo "<h3>{$pregunta_respuesta['pregunta']}</h3>";
                        echo "<p>{$pregunta_respuesta['respuesta']}</p>";
                        echo "</div>";
                    }
                }
                ?>
            </section>
            <!-- Sección para dejar una pregunta -->
            <section>
                <h2>Deja tu pregunta</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="pregunta" class="form-label">Escribe tu pregunta:</label>
                        <textarea class="form-control" id="pregunta" name="pregunta" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar pregunta</button>
                </form>
            </section>
        </div>
    </main>
    
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
