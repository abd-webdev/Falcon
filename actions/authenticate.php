<?php
session_start();
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['error'] = "";
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['error'] = "";
        header("Location: ../views/dashboard/index.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid credentials.";
        header("Location: ../views/pages/login.php");
        echo "Invalid credentials.";
    }
}
?>

<script>

</script>