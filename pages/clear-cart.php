<?php

session_start();

require_once "../includes/cart.php";

clearCart();

header("Location: cart.php");
exit;

