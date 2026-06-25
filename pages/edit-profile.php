<?php

session_start();

require_once "../app/Repositories/UserRepository.php";
require_once "../includes/database.php";
require_once "../includes/auth.php";

requireLogin("login.php");

$errors = [];
$success = "";

$userId = $_SESSION["user_id"];

$user = findUserById($conn, $userId);

if ($user === null) {
    header("Location: profile.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $street = trim($_POST["street"]);
    $street_number = trim($_POST["street_number"]);
    $postal_code = trim($_POST["postal_code"]);
    $floor = trim($_POST["floor"]);
    $door = trim($_POST["door"]);
    $city = trim($_POST["city"]);
    $province = trim($_POST["province"]);

    if (empty($name)) {
        $errors[] = "El nombre es obligatorio";
    }

    if (count($errors) === 0) {
        if (updateUserProfile($conn, $userId, $name, $phone, $street, $street_number, $postal_code, $floor, $door, $city, $province)) {
            $success = "Perfil actualizado correctamente";
            $_SESSION["user_name"] = $name;

            $user["name"] = $name;
            $user["phone"] = $phone;
            $user["street"] = $street;
            $user["street_number"] = $street_number;
            $user["postal_code"] = $postal_code;
            $user["floor"] = $floor;
            $user["door"] = $door;
            $user["city"] = $city;
            $user["province"] = $province;
        } else {
            $errors[] = "No se pudo actualizar el perfil";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
</head>
<body>
    <main>
        <h1>Editar perfil</h1>

        <a href="profile.php">Volver a mi cuenta</a>
        <?php if(!empty($success)): ?>
            <p><?php echo $success; ?></p>
        <?php endif; ?>
        
        <?php if (count($errors) > 0): ?>
               <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required value="<?php echo $user["name"]; ?>">

            <label for="phone">Teléfono</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $user["phone"]; ?>">

            <label for="street">Calle</label>
            <input type="text" name="street" id="street" value="<?php echo $user["street"]; ?>">

            <label for="street_number">Número</label>
            <input type="text" name="street_number" id="street_number" value="<?php echo $user["street_number"]; ?>">

            <label for="postal_code">Código postal</label>
            <input type="text" name="postal_code" id="postal_code" value="<?php echo $user["postal_code"]; ?>">

            <label for="floor">Piso</label>
            <input type="text" name="floor" id="floor" value="<?php echo $user["floor"]; ?>">

            <label for="door">Puerta</label>
            <input type="text" name="door" id="door" value="<?php echo $user["door"]; ?>">

            <label for="city">Ciudad</label>
            <input type="text" name="city" id="city" value="<?php echo $user["city"]; ?>">

            <label for="province">Provincia</label>
            <input type="text" name="province" id="province" value="<?php echo $user["province"]; ?>">

            <button type="submit">Guardar cambios</button>
        </form>
    </main>
</body>
</html>