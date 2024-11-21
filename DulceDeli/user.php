<?php
// Incluye el archivo de funciones para borrar usuarios y correos
require_once('metodosBorrar.php');

// Incluye el archivo de conexión
require_once('inc/conexion.php');

// Verifica si se ha enviado el formulario para agregar un usuario
if(isset($_POST['submit'])) {
    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    // Inserta los datos en la tabla de usuarios
    $queryUsuario = "INSERT INTO usuario (nombre, login_email, contraseña) VALUES ('$nombre', '$email', '$clave')";
    if($conexion->query($queryUsuario) === TRUE) {
        echo "<script>alert('Usuario agregado exitosamente.')</script>";
    } else {
        echo "<script>alert('Error al agregar usuario.')</script>";
    }
}

// Verifica si se ha enviado el formulario para agregar a login
if(isset($_POST['agregar_login'])) {
    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    // Inserta los datos en la tabla de login
    $queryLogin = "INSERT INTO login (email, clave) VALUES ('$email', '$clave')";
    if($conexion->query($queryLogin) === TRUE) {
        echo "<script>alert('Usuario agregado exitosamente a Login.')</script>";
    } else {
        echo "<script>alert('Error al agregar usuario a la tabla de login.')</script>";
    }
}

// Consulta para obtener todos los usuarios
$query = "SELECT usuario.nombre, usuario.login_email, usuario.contraseña, IF(login.email IS NULL, 'Pendiente', 'Activo') AS estatus FROM usuario LEFT JOIN login ON usuario.login_email = login.email";
$result = $conexion->query($query);

// Cierra la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Usuarios</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

<div class="container mt-4">
    <h2>Lista de Usuarios</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- Ocultar la columna de ID -->
                    <th style="display: none;">ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // No mostrar la columna de ID
                        //echo "<td style='display: none;'>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['login_email'] . "</td>";
                        // Mostrar la contraseña
                        echo "<td>" . $row['contraseña'] . "</td>";
                        echo "<td>" . $row['estatus'] . "</td>";
                        echo "<td>
                                <!-- Agregar botón para agregar a login -->
                                <form method='post'>
                                    <input type='hidden' name='nombre' value='" . $row['nombre'] . "'>
                                    <input type='hidden' name='email' value='" . $row['login_email'] . "'>
                                    <input type='hidden' name='clave' value='" . $row['contraseña'] . "'>
                                    <button type='submit' class='btn btn-success' name='agregar_login'><i class='fas fa-user-plus'></i> Dar de alta</button>
                                </form>
                                <!-- Agregar botón para eliminar usuario -->
                                <form method='post'>
                                    <input type='hidden' name='nombre_eliminar' value='" . $row['nombre'] . "'>
                                    <button type='submit' class='btn btn-danger' name='eliminar_usuario'><i class='fas fa-trash'></i> Eliminar Usuario</button>
                                </form>
                                <!-- Agregar botón para deshabilitar correo -->
                                <form method='post'>
                                    <input type='hidden' name='email_deshabilitar' value='" . $row['login_email'] . "'>
                                    <button type='submit' class='btn btn-warning' name='deshabilitar_correo'><i class='fas fa-ban'></i> Deshabilitar Usuario</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay usuarios</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-4">
    <h2>Agregar Nuevo Usuario</h2>
    <form method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el correo electrónico" required>
        </div>
        <div class="form-group">
            <label for="clave">Contraseña</label>
            <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingresa la contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Agregar Usuario</button>
    </form>
</div>

</body>
</html>
