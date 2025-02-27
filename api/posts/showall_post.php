<?php 
header("Content-Type: application/json");
include("../../config/database.php");
include("../../utils/JsonResponse.php");

$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit; 

 $count = $conn->prepare("SELECT COUNT(*) as total FROM posts");
 $count->execute();
 $totalResult = $count->fetch(PDO::FETCH_ASSOC);
 $totalRecords = $totalResult['total'];

$totalPages = ceil($totalRecords / $limit);

$query = $conn->prepare("SELECT posts.id, posts.title, posts.description, posts.created_at, posts.image, 
                                users.name AS author_name FROM posts
                                JOIN users ON posts.author_id = users.id
                                ORDER BY posts.created_at DESC
                                LIMIT ? OFFSET ?
                                ");
                                
$query->bindValue(1, $limit, PDO::PARAM_INT);
$query->bindValue(2, $offset, PDO::PARAM_INT);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

$response = [
    "current_page" => $page,
    "total_pages" => $totalPages,
    "total_records" => $totalRecords
];

success($posts, "Post fetch successfully",$response);
?>
