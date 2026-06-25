<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "scipio_coffee";

$conn = new mysqli($host, $user, $password, $database);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
