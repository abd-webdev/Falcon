<?php

include("../../config/database.php");
include("../../utils/JsonResponse.php");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data || !isset($data['email']) || !isset($data['password']) || !isset($data['role_id'])) {
        error($data["email"], "Missing email or password");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, email FROM users where email = ?");
    $stmt->execute([$data['email']]);
    $email = $stmt->fetch(PDO::FETCH_ASSOC);
    if($email) {
        error($data['email'], "Email already exist" );
        exit;
    }
    
    $stmt = $conn->prepare("INSERT INTO users (name, email, role_id, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$data['name'], $data['email'], $data['role_id'], password_hash($data['password'], PASSWORD_BCRYPT)]);
    unset($data["password"]);
   
    success($data,"User Registered Successfully");
}
?>