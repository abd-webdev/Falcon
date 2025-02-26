<?php
include("../../config/database.php");
include("../../middleware/authenticate.php");

$user_id = authenticate($conn);

$headers = getallheaders();
$token = $headers['Authorization'];
$stmt = $conn->prepare("DELETE FROM tokens WHERE token = ?");
$stmt->execute([$token]);

echo json_encode(["message" => "Logged out successfully"]);
?>
