
<?php
// Incluye el archivo de conexión Este archivo procesa el envio del mensaje de contacta con nosotros
require_once('inc/conexion.php');

// Verifica si se ha enviado un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si los campos obligatorios están presentes y no están vacíos
    if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["mensaje"]) &&
        !empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["mensaje"])) {
        
        // Captura los datos enviados por el formulario
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $mensaje = $_POST["mensaje"];
        
        // Prepara la consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";
        
        // Ejecuta la consulta y verifica si fue exitosa
        if ($conexion->query($sql) === TRUE) {
            // Muestra la ventana emergente y redirige a la página de contacto.php
            echo "<script>alert('¡Mensaje enviado correctamente!'); window.location='contacto.php';</script>";
        } else {
            echo "<h2>Error al enviar el mensaje: " . $conexion->error . "</h2>";
        }
        
    } else {
        // Si faltan campos obligatorios o están vacíos, muestra un mensaje de error
        echo "<h2>Error: Todos los campos son obligatorios</h2>";
    }
} else {
    // Si no se ha enviado un formulario POST, muestra un mensaje de error
    echo "<h2>Error: No se ha enviado ningún formulario</h2>";
}

// Cierra la conexión
$conexion->close();
?>
