
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../../css/style.css">
        <!-- MDBootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" />
<!-- Font Awesome (for icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">
                    <a href="index.php" id="logo"><img src="../../images/news.jpg"></a>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class='menu'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='#'>About</a></li>
                        <li><a href='#'>Contact us</a></li>
                        <li><a href='#'>Politics</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
            <?php
            session_start();
                    if (isset($_SESSION["user_id"])) {
                        echo '<ul class="menu">
                        <li><a href="../../actions/logout.php">Logout</a></li>
                        </ul>';
                        // exit();
                    }
                    else{
                        echo '<ul class="menu">
                        <li><a href="signup.php">Sign up</a></li>
                        <li><a href="login.php">Login</a></li>
                        </ul>';
                        //  exit();
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
 
     <!-- MDBootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

