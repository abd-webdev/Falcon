<?php

include '../../config/database.php';
include '../../actions/validateImage.php';
include '../../middleware/authenticate.php';

$user_id = authenticate($conn);

if (empty($_FILES['new-image']['name'])) {
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["old-image"]["name"]);
    
} else {
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["new-image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["new-image"]["tmp_name"]);
 
    validateImage($check, $target_file, $imageFileType);

    if ($uploadOk == 1) {
        if (!move_uploaded_file($_FILES["new-image"]["tmp_name"], $target_file)) {
            echo json_encode(array("error"=> "Sorry, there is an issue uploading your image"));
            exit();
        }
    }
}

$title = $_POST['title'];
$description = $_POST['description'];
$post_id = $_GET['id'];

$stmt = $conn->prepare('UPDATE posts SET title = ?, description = ?, image = ?, author_id = ? WHERE id = ?');
if ($stmt->execute([$title, $description, $target_file, $user_id, $post_id])) {
    echo json_encode(array("message"=> "Post updated successfully"));
    exit();
} else {
    echo json_encode(array("error"=> "Error updating the post!"));
}
?>
