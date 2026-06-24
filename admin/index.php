<?php

session_start();

require_once "../includes/auth.php";

requireLogin("../pages/login.php");
requireAdmin("../index.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de administración</title>
</head>
<body>
    <header>
        <h1>Panel de administración</h1>
    </header>

    <main>
        <p>Bienvenido, <?php echo $_SESSION["user_name"]; ?></p>

        <a href="../index.php">Volver al inicio</a>
        <a href="../pages/logout.php">Cerrar sesión</a>
    </main>
</body>
</html>