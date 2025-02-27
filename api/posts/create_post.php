<?php
header("Content-Type: application/json");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../config/database.php';
    include '../../middleware/authenticate.php';
    include '../../actions/validateImage.php';
    include '../../utils/JsonResponse.php';

    $user_id = authenticate($conn);

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);

    $target_dir = "../../uploads/";

    $originalFilename = pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME);
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    $timestamp = time(); 
    $newFilename = $originalFilename . "_" . $timestamp . "." . $imageFileType;
    $target_file = $target_dir . $newFilename;

    $uploadOk = 1;
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    validateImage($check, $target_file, $imageFileType);

    if ($uploadOk == 0) {
        error($response, 'Sorry, your post is not uploaded!');
        exit();
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
            error($response, 'There is an error uploading your post!');
            exit();
        }
    }

    $imagePath = "uploads/" . $newFilename;

    $response = [
        "title" => $title,
        "description" => $description,
        "image" => $imagePath, 
    ];

    $stmt = $conn->prepare("INSERT INTO posts (title, description, image, author_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$title, $description, $imagePath, $user_id])) {
        $_SESSION['success'] = 'Post Added Successfully';
        success($response, "Post added successfully");
        exit();
    } else {
        $_SESSION['error'] = 'Post not added!';
        error($response, 'There is an error adding your post!');
    }
}
?>
