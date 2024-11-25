<?php
// Incluir la conexión a la base de datos
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Consulta SQL para buscar el usuario
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo "Inicio de sesión exitoso. ¡Bienvenido, " . htmlspecialchars($username) . "!";
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        // Manejo de errores al iniciar sesión
        echo "Error al iniciar sesión: " . $e->getMessage();
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form method="POST" action="login.php">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Iniciar sesión</button>
</form>
