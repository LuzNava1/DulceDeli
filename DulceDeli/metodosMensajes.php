<?php
// Verifica si se ha enviado el parámetro 'id' y 'action' en la URL
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'eliminar') {
    // Incluye el archivo de conexión
    require_once('inc/conexion.php');

    // Función para eliminar un mensaje de contacto por ID
    function eliminarMensaje($id) {
        global $conexion;

        $id = $conexion->real_escape_string($id);

        // Prepara la consulta SQL para eliminar el mensaje por ID
        $sql = "DELETE FROM mensajes_contacto WHERE id = $id";

        // Ejecuta la consulta y verifica si fue exitosa
        if ($conexion->query($sql) === TRUE) {
            return true; // Eliminación exitosa
        } else {
            return false; // Error al eliminar
        }
    }

    // Obtiene el ID del mensaje a eliminar
    $id = $_GET['id'];

    // Llama a la función eliminarMensaje
    if (eliminarMensaje($id)) {
        // Redirecciona de vuelta a la página de mostrar_mensajes.php después de eliminar el mensaje
        header("Location: mostrar_mensajes.php");
        exit();
    } else {
        // Maneja el caso si hubo un error al eliminar el mensaje
        echo "Error al eliminar el mensaje.";
    }
} else {
    // Maneja el caso si no se proporcionaron los parámetros requeridos en la URL
    echo "Parámetros incompletos.";
}
?>
