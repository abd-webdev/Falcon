<?php
// $pageContent = "auth/login-content.php"; // Include the login content file
include("pages/layout.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container my-5" style="width: 400px">
        <h2 class="my-5">Login to your account</h2>
    <form action="/actions/authenticate.php" method="POST" autocomplete="off">
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Enter email"/>
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" class="form-control" placeholder="Enter password"/>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                <label class="form-check-label" for="form2Example34"> Remember me </label>
            </div>
            </div>

            <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="/views/signup.php">Register</a></p>
            <p>or sign up with:</p>
            <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
            </button>

            <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
            <i class="fab fa-google"></i>
            </button>

            <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
            <i class="fab fa-twitter"></i>
            </button>

            <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
            <i class="fab fa-github"></i>
            </button>
        </div>
        </form>
    </div>

</body>
</html>
