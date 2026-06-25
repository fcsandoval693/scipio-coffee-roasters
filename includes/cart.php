<?php
function ensureCart()
{
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }
}
function addToCart($productId)
{
    ensureCart();
    
    if (isset($_SESSION["cart"][$productId])){
        $_SESSION["cart"][$productId]++;
    } else {
        $_SESSION["cart"][$productId] = 1;
    }
}
function cartCount()
{
    ensureCart();

    return array_sum($_SESSION["cart"]);
}
?>