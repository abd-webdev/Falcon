<?php
    header("Content-Type: application/json");
    include '../../config/database.php';
    include '../../middleware/checkRole.php';
    include '../../utils/JsonResponse.php';
    include '../../middleware/authenticate.php';
    
    $user_id = authenticate($conn);
    if(checkRole($conn) == 'admin') {
        
        $post_id = $_GET['id'];
        
        $stmt = $conn->prepare('SELECT id FROM posts WHERE id = ?');
        $stmt->execute([$post_id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($post){
            $stmt = $conn->prepare('UPDATE posts SET status = ? WHERE id = ?');
            $stmt->execute(["pending", $post_id]);
            $stmt->execute();
            success($post, "Post status successfully updated");
        }
    else{
            error($post, "Post not found");
        }
    } else {
            error(null, "Unauthorized! you cannot update the post");
    }

        
?>


