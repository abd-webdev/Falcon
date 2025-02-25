<?php
session_start();
include("../../config/database.php");
$post_id = $_GET['id'];
echo 'Delete post' . $post_id .'';

if($post_id){
    $stmt = $conn->prepare("DELETE FROM posts where id = ?");
    $stmt->execute([$post_id]);
    $_SESSION['success'] = "Post Deleted";
    header("location: index.php");
    exit();
}
   $_SESSION['error'] = "Post couldn't delete";

?>