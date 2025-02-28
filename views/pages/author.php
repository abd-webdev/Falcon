<?php include 'header.php'; ?>

<?php
include '../../config/database.php';

$author_id = $_GET['id'];
$stmt = $conn->prepare('SELECT posts.id, posts.title, posts.description, posts.image, posts.created_at, posts.status, posts.author_id,
                               users.name AS author_name  FROM posts 
                               JOIN users ON posts.author_id = users.id
                               WHERE posts.author_id = ?');
$stmt->execute([$author_id]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
    <div id='main-content'>
      <div class='container'>
        <div class='row'>
            <div class='col-md-8'>
                <!-- post-container -->
                <div class='post-container'>
                    <?php   
                       if (!empty($posts)) {
                        echo '<h2 class="page-heading">' . htmlspecialchars($posts[0]['author_name']) . '</h2>';
                        }
                    ?>
                    <?php   
                    foreach ($posts as $post) {
                   echo "<div class='post-content'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <a class='post-img' href='single.php'><img src='../{$post['image']}' alt=''/></a>
                            </div>
                            <div class='col-md-8'>
                                <div class='inner-content clearfix'>
                                    <h3><a href='post-details.php?id={$post['id']}'>{$post['title']}</a></h3>
                                    <div class='post-information'>
                                        <span>
                                            <i class='fa fa-tags' aria-hidden='true'></i>
                                            <a href='category.php'>{$post['status']}</a>
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
                                      {$post['description']}    
                                    </p>
                                    <a class='read-more pull-right' href='single.php'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                ?>

                    <ul class='pagination'>
                        <li class='active'><a href=''>1</a></li>
                        <li><a href=''>2</a></li>
                        <li><a href=''>3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
