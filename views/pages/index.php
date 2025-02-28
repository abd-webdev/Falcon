<?php include 'header.php'; ?>

<?php 

include("../../config/database.php");

$limit = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit; 

 $count = $conn->prepare("SELECT COUNT(*) as total FROM posts");
 $count->execute();
 $totalResult = $count->fetch(PDO::FETCH_ASSOC);
 $totalRecords = $totalResult['total'];

$totalPages = ceil($totalRecords / $limit);

$query = $conn->prepare("SELECT posts.id, posts.title, posts.description, posts.created_at, posts.author_id, posts.image, 
                                users.name AS author_name FROM posts
                                JOIN users ON posts.author_id = users.id
                                ORDER BY posts.created_at DESC
                                LIMIT ? OFFSET ?
                                ");
                                
$query->bindValue(1, $limit, PDO::PARAM_INT);
$query->bindValue(2, $offset, PDO::PARAM_INT);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

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
                                                <a href='author.php?id={$post['author_id']}'>{$post['author_name']}</a>
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
                        
            <!-- Pagination -->
            <ul class='pagination'>
                <?php if ($page > 1) : ?>
                    <li><a href="?page=<?php echo ($page - 1); ?>">Previous</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages) : ?>
                    <li><a href="?page=<?php echo ($page + 1); ?>">Next</a></li>
                <?php endif; ?>
            </ul>

                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
