<?php
session_start();
include("../../config/database.php");
include("../../middleware/authenticate.php");

$user_id = authenticate($conn);
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(array('status' => 'error', 'message' => 'Post ID not found.'));
    exit();
}

$post_id = $_GET['id'];

$post = $conn->prepare('SELECT id, title, description, image FROM posts WHERE id = ?');
$post->execute([$post_id]);
$post = $post->fetch(PDO::FETCH_ASSOC);

if ($post) {

        if (!empty($post['image'])) {
            $image_path = $post['image']; 
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$post['id']]);
    
    echo json_encode(array(
        'status' => 'success',
        'message' => 'Deleted successfully',
        'post' => $post
    ));
    exit();
}

echo json_encode(array('status' => 'error', 'message' => 'Post does not exist.'));
exit();
?>
