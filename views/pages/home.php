<?php
session_start();
include_once "layout.php";

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLogger - Your blogs are here!</title>
</head>
<body>

    <header>
  <!-- Intro settings -->
  <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
  </style>

  <!-- Background image -->
  <div
    id="intro-example"
    class="p-5 text-center bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');"
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Welcome to Bloggers</h1>
          <h5 class="mb-4">Convey your thoughts</h5>
          <a
            data-mdb-ripple-init
            class="btn btn-outline-light btn-lg m-2"
            href="https://www.youtube.com/watch?v=c9B4TPnak1A"
            role="button"
            rel="nofollow"
            target="_blank"
          >Getting Started</a
          >
          <a
            data-mdb-ripple-init
            class="btn btn-outline-light btn-lg m-2"
            href="https://mdbootstrap.com/docs/standard/"
            target="_blank"
            role="button"
          >See BLogs</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
</body>
</html>

