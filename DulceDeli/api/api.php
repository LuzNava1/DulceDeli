<?php
// Configuración de la conexión a la base de datos
$host = 'localhost'; // Cambia por tu host
$dbname = 'dulcedeli'; // Cambia por tu nombre de base de datos
$username = 'root'; // Cambia por tu usuario de base de datos
$password = ''; // Cambia por tu contraseña de base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Establecer el encabezado de respuesta a JSON
header('Content-Type: application/json');

// Comprobar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados en el cuerpo de la solicitud
    $data = json_decode(file_get_contents("php://input"), true);

    if (is_array($data)) {
        foreach ($data as $item) {
            // Validar y preparar los datos
            $nombre = isset($item['nombre']) ? $item['nombre'] : '';
            $correo = isset($item['correo']) ? $item['correo'] : '';
            $telefono = isset($item['telefono']) ? $item['telefono'] : '';
            $sugerencia = isset($item['sugerencia']) ? $item['sugerencia'] : '';
            
            // Convertir el formato de fecha recibido a datetime adecuado
            $fecha = isset($item['fecha']) ? $item['fecha'] : date('Y-m-d H:i:s'); // Usa la fecha actual si no se proporciona
            $fecha = date('Y-m-d H:i:s', strtotime($fecha)); // Convertir a formato 'Y-m-d H:i:s'
            
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO sugerencias (nombre, correo, telefono, sugerencia, fecha) 
                    VALUES (:nombre, :correo, :telefono, :sugerencia, :fecha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':sugerencia', $sugerencia);
            $stmt->bindParam(':fecha', $fecha);

            try {
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo json_encode(['error' => 'Error al guardar la sugerencia: ' . $e->getMessage()]);
            }
            
        }
        echo json_encode(['message' => 'Sugerencia guardada correctamente.']);
    } else {
        echo json_encode(['error' => 'Los datos no son válidos.']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido.']);
}
?>