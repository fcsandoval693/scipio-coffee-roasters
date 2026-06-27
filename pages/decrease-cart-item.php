<?php 

session_start();

require_once "../includes/cart.php";

$productId = (int) ($_GET["id"] ?? 0);

if ($productId > 0) {
    decreaseCartItem($productId);
}

header("Location: cart.php");
exit;