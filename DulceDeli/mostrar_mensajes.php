
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Mensajes de Contacto</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agrega el enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/rec.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-red navbar-dark">
        <div class="wrapper">
          
        </div>
  <div class="container-fluid all-show">
    <a class="navbar-brand" href="#">Nuestra tienda <i class="fa fa-shopping-cart"></i></a>
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
    <h2>Lista de Mensajes de Contacto</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Mensaje (resumen)</th>
                    <th>Acciones</th> <!-- Columna para las acciones -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluye el archivo de conexión
                require_once('inc/conexion.php');

                // Consulta para obtener todos los mensajes de contacto
                $query = "SELECT * FROM mensajes_contacto";
                $result = $conexion->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        // Mostrar solo una parte del mensaje
                        echo "<td>" . substr($row['mensaje'], 0, 50) . "...</td>";
                        // Botón para ver el mensaje completo
                        echo "<td>";
                        echo "<button class='btn btn-primary btn-sm mr-2' onclick='verDetalle(" . $row['id'] . ")'><i class='fas fa-eye'></i> Ver</button>";
                        echo "<a href='metodosMensajes.php?action=eliminar&id=" . $row['id'] . "' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                        // Agrega una fila adicional para mostrar el mensaje completo
                        echo "<tr id='mensaje_" . $row['id'] . "' style='display:none;'><td colspan='5'>" . $row['mensaje'] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay mensajes de contacto</td></tr>";
                }

                // Cierra la conexión
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Agrega el enlace a Bootstrap JS y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function verDetalle(id) {
        // Verifica si el mensaje está visible
        if ($("#mensaje_" + id).is(":visible")) {
            // Si está visible, lo oculta
            $("#mensaje_" + id).hide();
        } else {
            // Si no está visible, oculta todos los mensajes y luego muestra el mensaje correspondiente al ID
            $("tr[id^='mensaje_']").hide();
            $("#mensaje_" + id).show();
        }
    }
</script>

</body>
</html>
