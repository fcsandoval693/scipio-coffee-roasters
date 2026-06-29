<?php

function createOrder($conn, $userId, $total)
{
    $sql = "INSERT INTO orders (user_id, total) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("id", $userId, $total);
    $stmt->execute();

    return $conn->insert_id;
}

function createOrderItem($conn, $orderId, $productId, $quantity, $unitPrice)
{
    $sql = "INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiid", $orderId, $productId, $quantity, $unitPrice);

    return $stmt->execute();
}