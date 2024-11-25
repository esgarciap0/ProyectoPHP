<?php
// Incluir la conexión a la base de datos
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña

    try {
        // Consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "Usuario registrado exitosamente.";
    } catch (PDOException $e) {
        // Manejo de errores al registrar
        echo "Error al registrar usuario: " . $e->getMessage();
    }
}
?>

<!-- Formulario de registro -->
<form method="POST" action="register.php">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Registrar</button>
</form>
