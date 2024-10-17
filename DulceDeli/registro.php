<?php
if(isset($_POST['submit'])) {
    // Incluye el archivo de conexión
    require_once('inc/conexion.php');

    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['clave'];

    // Realiza la inserción en la base de datos
    $query = "INSERT INTO usuario (nombre, login_email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";
    if($conexion->query($query) === TRUE) {
        echo "<script>alert('Usuario registrado exitosamente.')</script>";
    } else {
        echo "<script>alert('Error al registrar usuario.')</script>";
    }

    // Cierra la conexión
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54578da939.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/rec.css">
    <!-- REFERENCIA A APP -->
  <script src="js/app.js"></script>
  <link rel="manifest" href="js/manifest.json">
    <title>Registro de Usuario</title>
</head>

<body>
    <?php include('barra.php'); ?>
  <!-- barras.php -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="login.php">Iniciar Sesión</a></li>
    <li class="breadcrumb-item" aria-current="page">Registrate</li>
  </ol>
</nav>

    <section class="vh-100" style="background-color: #0000FF;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <img src="imagenes/Assets/reg.png" alt="login form" class="img-fluid"
                                        style="border-radius: 2rem 0 0 2rem; display: inline-block;" />
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                <span class="h1 fw-bold mb-0">Registrate</span>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="clave">Contraseña</label>
                                            <input type="password" class="form-control form-control-lg" id="clave" name="clave" placeholder="Ingresa tu contraseña" required>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-lg btn-block" name="submit">Registrar</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
