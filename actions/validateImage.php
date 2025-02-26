<?php

function validateImage($check, $target_file, $imageFileType)  {
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo json_encode(["error" => "File is not an image."]);
        $uploadOk = 0;
        exit();
    }

    if (file_exists($target_file)) {
        echo json_encode(["error" => "Sorry, file already exists."]);
        $uploadOk = 0;
        exit(); 
    }

    if(isset($_FILES["image"]["size"])){
        if ($_FILES["image"]["size"] > 5000000) {
            echo json_encode(["error" => "Sorry, your file is too large."]);
            $uploadOk = 0;
            exit();
        }
    } else{
        if ($_FILES["new-image"]["size"] > 5000000) {
            echo json_encode(["error" => "Sorry, your file is too large."]);
            $uploadOk = 0;
            exit();
        }
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif") {
        echo json_encode(["error" => "Sorry, only JPG, JPEG, PNG & JFIF files are allowed."]);
        $uploadOk = 0;
        exit();
    }
}

?>