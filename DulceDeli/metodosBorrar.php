<?php
// Incluye el archivo de conexión
require_once('inc/conexion.php');

// Función para eliminar un usuario de la tabla usuario
function eliminarUsuario($nombreUsuario) {
    global $conexion;
    $queryEliminarUsuario = "DELETE FROM usuario WHERE nombre = '$nombreUsuario'";
    if($conexion->query($queryEliminarUsuario) === TRUE) {
        echo "<script>alert('Usuario eliminado exitosamente.')</script>";
        // Redirige de nuevo a la página principal
        echo "<script>window.location.href = 'user.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar usuario.')</script>";
    }
}

// Función para deshabilitar un correo de la tabla login
function deshabilitarCorreo($emailUsuario) {
    global $conexion;
    $queryDeshabilitarCorreo = "DELETE FROM login WHERE email = '$emailUsuario'";
    if($conexion->query($queryDeshabilitarCorreo) === TRUE) {
        echo "<script>alert('Correo deshabilitado exitosamente.')</script>";
        // Redirige de nuevo a la página principal
        echo "<script>window.location.href = 'user.php';</script>";
    } else {
        echo "<script>alert('Error al deshabilitar correo.')</script>";
    }
}

// Verifica si se ha enviado la solicitud de eliminación de usuario
if(isset($_POST['eliminar_usuario'])) {
    $nombreEliminar = $_POST['nombre_eliminar'];
    eliminarUsuario($nombreEliminar);
}

// Verifica si se ha enviado la solicitud de deshabilitar correo
if(isset($_POST['deshabilitar_correo'])) {
    $emailDeshabilitar = $_POST['email_deshabilitar'];
    deshabilitarCorreo($emailDeshabilitar);
}
?>
