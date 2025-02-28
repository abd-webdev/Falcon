<?php
session_start();
include '../config/database.php';

if (empty($_FILES['new-image']['name'])) {
    $target_file = $_POST['old-image'];
} else {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["new-image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["new-image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (max 5MB)
    if ($_FILES["new-image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only JPG, JPEG, PNG & GIF
    $allowedTypes = ["jpg", "jpeg", "png", "jfif"];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Upload file if no errors
    if ($uploadOk == 1) {
        if (!move_uploaded_file($_FILES["new-image"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }
}

$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];

// ✅ Corrected SQL Query with Proper Parameterization
$stmt = $conn->prepare('UPDATE posts SET title = ?, description = ?, image = ?, author_id = ? WHERE id = ?');
if ($stmt->execute([$title, $description, $target_file, $user_id, $post_id])) {
    $_SESSION["success"] = "Post updated successfully";
    header("Location: ../views/dashboard/index.php");
    exit();
} else {
    $_SESSION['error'] = "Error updating post";
    header("Location: ../views/dashboard/index.php");
}
?>
