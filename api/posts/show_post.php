<?php 
header("Content-Type: application/json");
include("../../config/database.php");

$post_id = $_GET['id'];
$post = $conn->prepare("SELECT posts.id, posts.title, posts.description, posts.created_at, posts.image, users.name AS author_name FROM posts
                               JOIN users ON posts.author_id = users.id
                               WHERE posts.id = ?");
$post->execute([$post_id]);
$post = $post->fetch(PDO::FETCH_ASSOC);

if($post){
  echo json_encode(array("status"=> "success",
                                "message"=>"Post details successfully display",
                                 "post"=> $post));
} else{
    echo json_encode(array("status"=>"error",
                            "message"=>"Post not found"));
}
?>