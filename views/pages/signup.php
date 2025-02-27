<?php
// $pageContent = "auth/signup-content.php"; // Include the signup content file
include("header.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5" style="width: 400px">
        <h2 class="my-5">Signup to your account</h2>
    <form action="<?php echo htmlspecialchars("../../actions/register.php") ?>" method="POST" autocomplete="off">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" name="name" id="form3Example1" class="form-control" />
        <label class="form-label" for="form2Example2">Name</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" name="email" id="form3Example3" class="form-control"/>
    <label class="form-label" for="form2Example2">Email</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="password" id="form3Example4" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <label for="role">Select Role:</label>
    <select name="role_id">
        <option value="1">Author</option>
        <option value="2">Admin</option>
    </select>

  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>or sign up with:</p>
    <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
    </div>

    <?php
        include("footer.php");
         ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>