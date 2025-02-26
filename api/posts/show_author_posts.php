<?php

include("../../config/database.php");

$author_id = $_GET['id'];

$stmt = $conn->prepare("SELECT posts.id, posts.title, posts.description, posts.created_at, posts.image, posts.author_id,
                                users.name AS author_name,
                                COUNT(*) OVER() AS total_posts
                                FROM posts
                                JOIN users ON posts.author_id = users.id
                                WHERE posts.author_id = ?");
        
$stmt->execute([$author_id]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($posts){
echo json_encode(array("status"=> "success",
                              "message"=> "Posts retrieved successfully",
                              "posts"=>$posts));
}else{
    echo json_encode(array("status"=> "error",
                                  "message"=> "Posts not found"));
}

?>