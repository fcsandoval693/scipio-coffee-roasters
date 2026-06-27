<?php

session_start();

require_once "../includes/cart.php";
require_once "../includes/database.php";
require_once "../app/Repositories/ProductRepository.php";

ensureCart();

$productId = (int) ($_GET["id"] ?? 0);

if ($productId > 0) {
    $product = findProductById($conn, $productId);
    $currentQuantity = $_SESSION["cart"][$productId] ?? 0;

    if ($product !== null && $currentQuantity < $product["stock"]) {
        addToCart($productId);
    }
}

header("Location: cart.php");
exit;
