<?php
session_start();

require_once "../includes/cart.php";
require_once "../includes/database.php";
require_once "../app/Repositories/ProductRepository.php";

ensureCart();

$productIds = array_keys($_SESSION["cart"]);
$products = findProductsByIds($conn, $productIds);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
</head>
<body>
    <header>
        <h1>Carrito</h1>
    </header>

    <main>
        <a href="../index.php">Volver al inicio</a>

        <?php if (empty($_SESSION["cart"])): ?>
            <p>Tu carrito está vacío</p>
        <?php else: ?>
            <p>Hay <?php echo cartCount(); ?> productos en tu carrito</p>

            <ul>
                <?php foreach ($products as $product): ?>
                    <?php
                        $quantity = $_SESSION["cart"][$product["id"]];
                        $subtotal = $quantity * $product["price"];
                    ?>
                    <li>
                        <strong><?php echo $product["name"]; ?></strong>
                        <br>
                        Cantidad: <?php echo $quantity; ?>
                        <br>
                        Precio: <?php echo $product["price"]; ?>€
                        <br>
                        Subtotal: <?php echo number_format($subtotal, 2); ?>€
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
</body>
</html>
