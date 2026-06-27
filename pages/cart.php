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
            <p>
                Hay <?php echo cartCount(); ?>
                <?php echo cartCount() === 1 ? "producto" : "productos"; ?>
                en tu carrito
            </p>

            <?php $total = 0; ?>
            

            <ul>

                <?php foreach ($products as $product): ?>
                    <?php
                        $quantity = $_SESSION["cart"][$product["id"]];
                        $subtotal = $quantity * $product["price"];
                        $total += $subtotal;
                    ?>
                    <li>
                        <strong><?php echo $product["name"]; ?></strong>
                        <br>
                        Cantidad: <?php echo $quantity; ?>
                        <br>
                        Precio: <?php echo $product["price"]; ?>€
                        <br>
                        Subtotal: <?php echo number_format($subtotal, 2); ?>€
                        <br>
                        <?php if($quantity < $product["stock"]): ?>
                            <a href="increase-cart-item.php?id=<?php echo $product["id"]; ?>">Añadir una unidad</a>
                        <?php else: ?>
                            <span>No hay stock suficiente</span>
                            <?php endif; ?>
                        <br>
                        <a href="decrease-cart-item.php?id=<?php echo $product["id"]; ?>">Quitar una unidad</a>
                        <br>
                        <a href="remove-from-cart.php?id=<?php echo $product["id"]; ?>">Quitar producto</a>
                    </li>
                <?php endforeach; ?>
            </ul>

        <p>Total: <?php echo number_format($total, 2); ?>€</p>

        <a href="clear-cart.php">Vaciar carrito</a>
        <?php endif; ?>
    </main>
</body>
</html>


