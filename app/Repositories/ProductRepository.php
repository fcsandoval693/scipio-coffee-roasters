<?php
function findProductsByIds($conn, $ids)
{
    if (empty($ids)){
        return [];
    }

    $placeholders = implode(", ", array_fill(0, count($ids), "?"));
    $sql = "SELECT id, name, price, stock, weight FROM products WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $types = str_repeat("i", count($ids));
    $stmt->bind_param($types, ...$ids);
    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

function findProductById($conn, $productId)
{
    $sql = "SELECT id, name, price, stock FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->nom_rows === 0){
        return null;
    }

    return $result->fetch_assoc();
}
