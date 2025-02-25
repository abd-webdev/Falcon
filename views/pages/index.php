<?php include 'header.php'; ?>

<?php
include '../../config/database.php';
$stmt = $conn->prepare('SELECT posts.id, posts.title, posts.description, posts.image, posts.created_at, posts.author_id,
                               users.name AS author_name  from posts 
                               JOIN users on posts.author_id = users.id');
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <?php
                            if($posts){
                                  foreach($posts as $post){
                                      echo "<div class='post-content'>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <a class='post-img' href='post-details.php?id={$post['id']}'><img src='../{$post['image']}' alt=''/></a>
                                </div>
                                <div class='col-md-8'>
                                    <div class='inner-content clearfix'>
                                        <h3><a href='post-details.php?id={$post['id']}'>{$post['title']}</a></h3>
                                        <div class='post-information'>
                                            <span>
                                                <i class='fa fa-tags' aria-hidden='true'></i>
                                                <a href='category.php'>Post</a>
                                            </span>
                                            <span>
                                                <i class='fa fa-user' aria-hidden='true'></i>
                                                <a href='author.php'>{$post['author_name']}</a>
                                            </span>
                                            <span>
                                                <i class='fa fa-calendar' aria-hidden='true'></i>
                                                {$post['created_at']}
                                            </span>
                                        </div>
                                        <p class='description'>
                                              " . substr($post['description'], 0, 250) . "...
                                        </p>
                                        <a class='read-more pull-right' href='post-details.php?id={$post['id']}'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                                  }
                            }

                        ?>
                        
                        
                        <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
