<?php

include("../../config/database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$data['name'], $data['email'], password_hash($data['password'], PASSWORD_BCRYPT)]);

    echo json_encode(["message" => "User registered"]);
}
?>