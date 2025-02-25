<?php include 'header.php'; 

include("../../config/database.php");

$post_id = $_GET['id'];
$stmt = $conn->prepare("SELECT posts.id, posts.title, posts.description, posts.created_at, posts.image, users.name AS author_name FROM posts
                               JOIN users ON posts.author_id = users.id
                               WHERE posts.id = ?");
$stmt->execute([$post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $post['title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $post['author_name'] ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'>Admin</a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $post['created_at'] ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="../<?php echo $post['image']  ?>" alt=""/>
                            <p class="description">
                              <?php echo $post['description'] ?>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
