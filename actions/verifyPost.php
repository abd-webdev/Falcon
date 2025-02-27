<?php

function approvePost($post_id){
    include '../config/database.php';
    $stmt = $conn->prepare('UPDATE posts SET status = ? WHERE id = ?');
    $stmt->execute(["approved", $post_id]);
    $stmt->execute();
    header("location: ../views/dashboard/index.php");
}

function rejectPost($post_id){
    include '../config/database.php';
    $stmt = $conn->prepare('UPDATE posts SET status = ? WHERE id = ?');
    $stmt->execute(["pending", $post_id]);
    $stmt->execute();
    header("location: ../views/dashboard/index.php");
}

if(isset($_GET['approve'])){
    if($_GET['approve'] == 1){
        approvePost($_GET['post_id']);
    }
    if($_GET['approve'] == 0){
        rejectPost($_GET['post_id']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Verify post</h1>
</body>
</html>