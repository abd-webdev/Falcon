<?php

include('../../config/database.php');

function authenticate($conn) {
    $headers = getallheaders();
    if (!isset($headers['Authorization'])) {
        echo json_encode(["error" => "Unauthorized!"]);
        exit;
    }

    $token = $headers['Authorization'];

    $stmt = $conn->prepare("SELECT user_id FROM tokens WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
       error($user, "Invalid or expired token");
        exit;
    }

    return $user['user_id'];
}
?>
