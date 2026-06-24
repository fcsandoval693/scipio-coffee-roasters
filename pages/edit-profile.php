<?php

session_start();

require_once "../includes/database.php";
require_once "../includes/auth.php";

requireLogin("login.php");

$errors = [];
$success = "";

$userId = $_SESSION["user_id"];
$sql = "SELECT name, phone, street, street_number, postal_code, floor, door, city, province FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $street = trim($_POST["street"]);
    $street_number = trim($_POST["street_number"]);
    $postal_code = trim($_POST["postal_code"]);
    $floor = trim($_POST["floor"]);
    $door = trim($_POST["door"]);
    $city = trim($_POST["city"]);
    $province = trim($_POST["province"]);
    if(empty($name)){
        $errors[] = "El nombre es obligatorio";
    }
    if (count($errors) === 0) {
    $sql = "UPDATE users SET name = ?, phone = ?, street = ?, street_number = ?, postal_code = ?, floor = ?, door = ?, city = ?, province = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $name, $phone, $street, $street_number, $postal_code, $floor, $door, $city, $province, $userId);
}
    if($stmt->execute()){
        
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