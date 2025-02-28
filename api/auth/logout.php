<?php
include("../../config/database.php");
include("../../middleware/authenticate.php");
header("Content-Type: application/json");

$user_id = authenticate($conn);

$headers = getallheaders();
$token = $headers['Authorization'];
$stmt = $conn->prepare("DELETE FROM tokens WHERE token = ?");
$stmt->execute([$token]);

session_start();
session_unset();
session_destroy();

echo json_encode(["message" => "Logged out successfully"]);
?>
