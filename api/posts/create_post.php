<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../config/database.php';
    include '../../middleware/authenticate.php';
    include '../../actions/validateImage.php';

    $user_id = authenticate($conn);

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
  
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
   
    // validating the images
    validateImage($check, $target_file,$imageFileType );

    if ($uploadOk == 0) {
        echo json_encode(["error" => "Sorry, your file was not uploaded."]);
        exit();
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO posts (title, description, image, author_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$title, $description, $target_file, $user_id])) {
        $_SESSION['success'] = 'Post Added Successfully';
        echo json_encode(["message" => "Post added successfully"]);
 
        exit();
    } else {
        $_SESSION['error'] = 'Post not added!';
        header("Location: ../views/dashboard/index.php");
    }
}
?>
