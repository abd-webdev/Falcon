<?php
include '../../config/database.php';
include '../../utils/JsonResponse.php';
header("Content-Type: application/json");

function generateToken() {
    return bin2hex(random_bytes(32)); // 64-character token
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($data['password'], $user['password'])) {
        $token = generateToken();
        
        // Store token in tokens table
        $stmt = $conn->prepare("INSERT INTO tokens (user_id, token) VALUES (?, ?)");
        $stmt->execute([$user['id'], $token]);
        $data['token'] = $token;
        // echo json_encode(["message" => "Login successful", "token" => $token]);
        success($data, "Successfully Logged In");
    } else {
        echo json_encode(["error" => "Invalid credentials"]);
    }
}
?>
