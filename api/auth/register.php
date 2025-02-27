<?php

include("../../config/database.php");
include("../../utils/JsonResponse.php");
header("Content-Type: application/json");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $response = [ 
        "name" => $data['name'],
        "email" => $data['email']
    ];
    if (!$data || !isset($data['email']) || !isset($data['password'])) {
        error($response, "Missing email or password");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, email FROM users where email = ?");
    $stmt->execute([$data['email']]);
    $email = $stmt->fetch(PDO::FETCH_ASSOC);
    if($email) {
        error($data['email'], "Email already exist" );
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$data['name'], $data['email'], password_hash($data['password'], PASSWORD_BCRYPT)]);
   
      success($response,"User Registered Successfully");
}
?>