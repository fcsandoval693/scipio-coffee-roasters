<?php

session_start();

require_once "../includes/database.php";
require_once "../includes/auth.php";
require_once "../app/Repositories/UserRepository.php";

if (isLoggedIn()) {
    header("Location: ../index.php");
    exit;
}

$success = "";
$errors = [];
$name = "";
$email = "";
$phone = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);

    if (empty($name)) {
        $errors[] = "El nombre es obligatorio";
    }

    if (empty($email)) {
        $errors[] = "El email es obligatorio";
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El email no tiene un formato válido";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $existingUser = findUserByEmail($conn, $email);

        if ($existingUser !== null) {
            $errors[] = "Este email ya está registrado";
        }
    }

    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria";
    }

    if (!empty($password) && strlen($password) < 8) {
        $errors[] = "La contraseña debe tener al menos 8 caracteres";
    }

    if (count($errors) === 0) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        if(createUser($conn, $name, $email, $phone, $passwordHash)){
            $success = "Usuario creado correctamente";
        }else {
            $errors[] = "Error al crear el usuario";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
</head>
<body>
    <main>
        <h1>Crear cuenta</h1>
        <a href="../index.php">Volver al inicio</a>

        <?php if (!empty($success)): ?>
            <p><?php echo $success; ?></p>
        <?php endif; ?>

        <?php if (count($errors) > 0): ?>
            <ul> 
            <?php foreach ($errors as $error): ?>
                <li><?php  echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
                <?php endif; ?>
      

        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required value="<?php echo $name; ?>">

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required value="<?php echo $email; ?>">

            <label for="phone">Número de teléfono:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrarse</button>

        </form>
    </main>
</body>
</html>
