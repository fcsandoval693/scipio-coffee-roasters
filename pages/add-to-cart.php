<?php

session_start();

require_once "../includes/cart.php";

$productId = (int) ($_GET["id"] ?? 0);

if ($productId > 0) {
    addToCart($productId);
}

header("Location: ../index.php");
exit;
