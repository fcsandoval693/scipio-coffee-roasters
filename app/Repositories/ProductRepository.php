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
