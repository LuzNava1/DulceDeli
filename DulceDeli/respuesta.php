<?php
// Incluir el archivo de conexión a la base de datos
include_once("inc/conexion.php");

// Verificar si se recibió una solicitud POST para procesar una nueva respuesta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el ID de la pregunta y la respuesta desde el formulario
    if (isset($_POST["pregunta_id"]) && isset($_POST["respuesta"]) && !empty($_POST["respuesta"])) {
        // Obtener el ID de la pregunta y la respuesta desde el formulario
        $pregunta_id = $_POST["pregunta_id"];
        $respuesta = $_POST["respuesta"];
        
        // Guardar la respuesta en la base de datos
        if (guardarRespuesta($pregunta_id, $respuesta)) {
            // La respuesta se guardó correctamente
            echo "<div class='alert alert-success' role='alert'>¡La respuesta ha sido enviada con éxito!</div>";
        } else {
            // Ocurrió un error al guardar la respuesta
            echo "<div class='alert alert-danger' role='alert'>Error al enviar la respuesta. Por favor, inténtalo de nuevo más tarde.</div>";
        }
    } else {
        // Los datos necesarios no se recibieron o están vacíos
        echo "<div class='alert alert-warning' role='alert'>Por favor, completa todos los campos antes de enviar la respuesta.</div>";
    }
}

// Verificar si se recibió una solicitud GET para eliminar una pregunta y su respuesta
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["eliminar_pregunta"])) {
    // Obtener el ID de la pregunta a eliminar
    $pregunta_id = $_GET["eliminar_pregunta"];
    
    // Eliminar la pregunta y su respuesta de la base de datos
    if (eliminarPregunta($pregunta_id)) {
        // La pregunta y respuesta se eliminaron correctamente
        echo "<div class='alert alert-success' role='alert'>¡La pregunta y su respuesta han sido eliminadas correctamente!</div>";
    } else {
        // Ocurrió un error al eliminar la pregunta y respuesta
        echo "<div class='alert alert-danger' role='alert'>Error al eliminar la pregunta y su respuesta. Por favor, inténtalo de nuevo más tarde.</div>";
    }
}

// Función para obtener todas las preguntas y respuestas de la base de datos
function obtenerPreguntasYRespuestas() {
    // Obtener la conexión a la base de datos desde el archivo de conexión
    $conexion = new mysqli("localhost", "root", "", "DulceDeliOf");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_errno) {
        // Si la conexión falla, mostrar un mensaje de error y retornar false
        echo "Error: No se pudo conectar a la base de datos. " . $conexion->connect_error;
        return false;
    }

    // Preparar la consulta SQL para obtener todas las preguntas y respuestas
    $consulta = "SELECT id, pregunta, respuesta FROM PreguntasFrecuentes";

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

// Función para guardar la respuesta en la base de datos
function guardarRespuesta($pregunta_id, $respuesta) {
    // Obtener la conexión a la base de datos desde el archivo de conexión
    $conexion = new mysqli("localhost", "root", "", "DulceDeliOf");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_errno) {
        // Si la conexión falla, mostrar un mensaje de error y retornar false
        echo "Error: No se pudo conectar a la base de datos. " . $conexion->connect_error;
        return false;
    }
    
    // Preparar la consulta SQL para actualizar la respuesta en la tabla
    $consulta = "UPDATE PreguntasFrecuentes SET respuesta='$respuesta' WHERE id=$pregunta_id";
    
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

// Función para eliminar una pregunta y su respuesta de la base de datos
function eliminarPregunta($pregunta_id) {
    // Obtener la conexión a la base de datos desde el archivo de conexión
    $conexion = new mysqli("localhost", "root", "", "DulceDeliOf");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_errno) {
        // Si la conexión falla, mostrar un mensaje de error y retornar false
        echo "Error: No se pudo conectar a la base de datos. " . $conexion->connect_error;
        return false;
    }
    
    // Preparar la consulta SQL para eliminar la pregunta y su respuesta de la tabla
    $consulta = "DELETE FROM PreguntasFrecuentes WHERE id=$pregunta_id";
    
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda - Preguntas Frecuentes</title>
    <!-- Enlaces a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/rec.css">
    
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-red navbar-dark">
        <div class="wrapper">
          
        </div>
  <div class="container-fluid all-show">
    <a class="navbar-brand" href="#">DulceDeli <i class="fa fa-shopping-cart"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                   
                    <li class="nav-item">
          <a class="nav-link" href="respuesta.php">Responder preguntas</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="mostrar_mensajes.php">Mensajes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php">Usuarios</a>
        </li>
      </ul>
      <div class="d-flex flex-column sim">

      <form action="indes.php" method="GET" class="form-inline">
 
    <a class="btn btn-danger" href="cierreSesion.php" style="color: white;">Cerrar Sesión</a>
  
</form>
        
      </div>
    </div>
  </div>
</nav>
   
    <main class="py-5">
        <div class="container">
            <!-- Sección de preguntas frecuentes -->
            <section>
                <h2>Preguntas Frecuentes</h2>
                <?php
                // Obtener todas las preguntas y respuestas
                $preguntas_respuestas = obtenerPreguntasYRespuestas();

                // Verificar si se obtuvieron preguntas y respuestas
                if ($preguntas_respuestas) {
                    // Mostrar cada pregunta y su respuesta en una lista con íconos de respuesta
                    foreach ($preguntas_respuestas as $pregunta_respuesta) {
                        echo "<div class='mb-3'>";
                        echo "<h3>{$pregunta_respuesta['pregunta']}</h3>";
                        echo "<p>{$pregunta_respuesta['respuesta']}</p>";
                        // Mostrar formulario para responder la pregunta
                        echo "<form action='respuesta.php' method='POST'>";
                        echo "<input type='hidden' name='pregunta_id' value='{$pregunta_respuesta['id']}'>";
                        echo "<div class='mb-3'>";
                        echo "<label for='respuesta' class='form-label'>Responder:</label>";
                        echo "<textarea class='form-control' id='respuesta' name='respuesta' rows='4'></textarea>";
                        echo "</div>";
                        echo "<button type='submit' class='btn btn-primary'>Responder</button>";
                        // Agregar botón de eliminar pregunta y respuesta
                        echo "<button type='button' class='btn btn-danger' onclick='eliminarPregunta({$pregunta_respuesta['id']})'>Eliminar</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                }
                ?>
            </section>
        </div>
    </main>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script para eliminar pregunta y respuesta -->
    <script>
        function eliminarPregunta(pregunta_id) {
            // Envía una solicitud AJAX para eliminar la pregunta y respuesta asociada
            if (confirm("¿Estás seguro de que quieres eliminar esta pregunta y su respuesta?")) {
                // Crear una instancia de XMLHttpRequest
                var xhttp = new XMLHttpRequest();
                
                // Definir la función de respuesta
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Actualizar la página después de eliminar la pregunta y respuesta
                        location.reload();
                    }
                };
                
                // Abrir una conexión con el servidor
                xhttp.open("GET", "respuesta.php?eliminar_pregunta=" + pregunta_id, true);
                
                // Enviar la solicitud
                xhttp.send();
            }
        }
    </script>
</body>
</html>
