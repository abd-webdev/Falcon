<?php
include '../../config/database.php';
$stmt = $conn->prepare('SELECT posts.id, posts.title, posts.description, posts.image, posts.created_at, posts.author_id,
                               users.name AS author_name  from posts 
                               JOIN users on posts.author_id = users.id');
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_posts = count($posts);

if($posts){
    echo json_encode(array('status'=> 'success',
                                  'message'=> $total_posts . ' Posts Successfully display',
                                  'posts'=> $posts));
}else{
    echo json_encode(array('error'=> 'No post found'));
}

?>