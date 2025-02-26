<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../config/database.php';
    include '../../middleware/authenticate.php';
    $user_id = authenticate($conn);

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
  
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo json_encode(["error" => "File is not an image."]);
        $uploadOk = 0;
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo json_encode(["error" => "Sorry, file already exists."]);
        $uploadOk = 0;
        exit(); 
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        echo json_encode(["error" => "Sorry, your file is too large."]);
        $uploadOk = 0;
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo json_encode(["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
        $uploadOk = 0;
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
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

    // Insert post data into the database
    $stmt = $conn->prepare("INSERT INTO posts (title, description, image, author_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$title, $description, $target_file, $user_id])) {
        $_SESSION['success'] = 'Post Added Successfully';
        echo json_encode(["message" => "Post added successfully"]);
        // header("Location: ../../views/dashboard/index.php");
        exit();
    } else {
        $_SESSION['error'] = 'Post not added!';
        header("Location: ../views/dashboard/index.php");
    }
}
?>
