<?php

session_start();

require_once "../includes/auth.php";

requireLogin("login.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <header>
    <h1>Mi cuenta</h1>
    <main>
        <p>Nombre: <?php echo currentUserName(); ?></p>
        <p>Email: <?php echo currentUserEmail(); ?></p>
        <p>Rol: <?php echo currentUserRole(); ?></p>
        <a href="edit-profile.php">Editar perfil</a>
        <a href="../index.php">Volver al inicio</a>
        <a href="logout.php">Cerrar sesión</a>
        
    </main>
</header>
</body>
</html>