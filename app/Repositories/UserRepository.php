<?php

function findUserByEmail($conn, $email)
{
    $sql = "SELECT id, name, email, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return null;
    }

    return $result->fetch_assoc();
}
function createUser($conn, $name, $email, $phone, $passwordHash)
{
    $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $passwordHash);
    return $stmt->execute();
}
function findUserById($conn, $userId)
{
   $sql = "SELECT name, phone, street, street_number, postal_code, floor, door, city, province FROM users WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $userId);
   $stmt->execute();

   $result = $stmt->get_result();

   if ($result->num_rows === 0) {
      return null;
   }
   return $result->fetch_assoc();
}
function updateUserProfile($conn, $userId, $name, $phone, $street, $street_number, $postal_code, $floor, $door, $city, $province)
{
   $sql = "UPDATE users SET name = ?, phone = ?, street = ?, street_number = ?, postal_code = ?, floor = ?, door = ?, city = ?, province = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $name, $phone, $street, $street_number, $postal_code, $floor, $door, $city, $province, $userId);
    return $stmt->execute();
}
?>