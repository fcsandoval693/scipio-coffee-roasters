<?php

session_start();

require_once "../includes/auth.php";
require_once "../includes/cart.php";
require_once "../includes/database.php";
require_once "../app/Repositories/ProductRepository.php";
require_once "../app/Repositories/OrderRepository.php";

requireLogin("login.php");
ensureCart();

$userId = $_SESSION["user_id"];

if (empty($_SESSION["cart"])) {
    header("Location: cart.php");
    exit;
}

$productIds = array_keys($_SESSION["cart"]);
$products = findProductsByIds($conn, $productIds);
$total = 0;

foreach ($products as $product) {
    $quantity = $_SESSION["cart"][$product["id"]];
    $subtotal = $quantity * $product["price"];
    $total += $subtotal;
}

if ($total <= 0) {
    header("Location: cart.php");
    exit;
}

$orderId = createOrder($conn, $userId, $total);

foreach ($products as $product) {
    $productId = $product["id"];
    $quantity = $_SESSION["cart"][$productId];
    $unitPrice = $product["price"];

    createOrderItem($conn, $orderId, $productId, $quantity, $unitPrice);
}

clearCart();

header("Location: profile.php?order=success");
exit;
