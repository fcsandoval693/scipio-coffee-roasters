<?php

session_start();

require_once "../includes/database.php";

require_once "../includes/auth.php";

if (isLoggedIn()) {
    header("Location: ../index.php");
    exit;
}

$errors = [];
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email)) {
        $errors[] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El email no tiene un formato válido";
    }

    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria";
    }

    if (count($errors) === 0) {
        $sql = "SELECT id, name, email, password, role FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $errors[] = "Email o contraseña incorrectos";
        } else {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_role"] = $user["role"];

                header("Location: ../index.php");
                exit;
            } else {
                $errors[] = "Email o contraseña incorrectos";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
    <main>
        <h1>Inicio de sesión</h1>

        <a href="../index.php">Volver al inicio</a>

        <?php if (count($errors) > 0): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                   <li> <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="POST" action="">

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required value="<?php echo $email; ?>">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>