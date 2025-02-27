<?php
session_start();
include("../../config/database.php"); 

function checkRole($conn){
    $user_id = $_SESSION['user_id']; 
    $query = $conn->prepare('SELECT users.id, users.role_id, roles.name AS role FROM users 
                                JOIN roles ON users.role_id = roles.id
                                WHERE users.id = ?');
$query->execute([$user_id]);  
$checkRole = $query->fetch(PDO::FETCH_ASSOC);

return $checkRole['role'];
}

?>