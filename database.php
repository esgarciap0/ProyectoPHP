<?php
// Configuración de la conexión a la base de datos
$host = 'localhost'; // Servidor de la base de datos
$dbname = 'web_service_db'; // Nombre de la base de datos
$user = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos (vacío si no configuraste una)

try {
    // Crear una conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar excepciones
    // Mensaje para depuración
    // echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Manejo de errores en la conexión
    die("Error en la conexión: " . $e->getMessage());
}
?>
