<?php
// header("Content-Type: application/json");
include("../../config/database.php"); 
session_start();

function checkRole($conn){

        if(isset($_SESSION['user_id'])){
       
        $query = $conn->prepare('SELECT users.id, users.role_id, roles.name AS role FROM users 
                                JOIN roles ON users.role_id = roles.id
                                WHERE users.id = ?');
        $query->execute([$_SESSION['user_id']]);  
        $checkRole = $query->fetch(PDO::FETCH_ASSOC);
        return $checkRole['role'];

}else{
    error([], "Unauthorized! Login First");
    exit();
}
}

?>