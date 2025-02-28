<?php
include "header.php";
?>

<?php
include '../../config/database.php';
include "../../middleware/checkRole.php";


if(checkRole($conn) == 'admin') {
    $limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit; 

 $count = $conn->prepare("SELECT COUNT(*) as total FROM posts");
 $count->execute();
 $totalResult = $count->fetch(PDO::FETCH_ASSOC);
 $totalRecords = $totalResult['total'];

$totalPages = ceil($totalRecords / $limit);

$query = $conn->prepare("SELECT posts.id, posts.title, posts.description, posts.created_at, posts.author_id, posts.status, posts.image, 
                                users.name AS author_name FROM posts
                                JOIN users ON posts.author_id = users.id
                                ORDER BY posts.created_at DESC
                                LIMIT ? OFFSET ?
                                ");
                                
$query->bindValue(1, $limit, PDO::PARAM_INT);
$query->bindValue(2, $offset, PDO::PARAM_INT);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

}else{

    // Fetch all posts from the database
    $stmt = $conn->prepare("SELECT posts.id, posts.title, posts.created_at, posts.author_id, posts.status, users.name AS author_name FROM posts
                               JOIN users ON posts.author_id = users.id
                               WHERE posts.author_id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
  <div id="admin-content">
      <div class="container">

            <?php if(isset($_SESSION['success']) && $_SESSION['success'] != ''): ?>
            <h5 class='alert alert-success' id='destroySession'><?= $_SESSION['success']; ?></h5>
            <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['error']) && $_SESSION['error'] != ''): ?>
            <h5 class='alert alert-danger' id='destroySession'><?= $_SESSION['error']; ?></h5>
            <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          <?php
                          if(checkRole($conn) == "admin"){
                            echo "<th>Actions</th>";
                        }  
                          ?>
                      </thead>
                      <tbody>
                          <?php
                          if ($posts) {
                              $serial = 1;
                              foreach ($posts as $post) {
                                  echo "<tr>
                                          <td class='id'>{$serial}</td>
                                          <td>{$post['title']}</td>
                                          <td>{$post['status']}</td>
                                          <td>{$post['author_name']}</td>
                                          <td class='edit'><a href='update-post.php?id={$post['id']}'><i class='fa fa-edit'></i></a></td>
                                          <td class='delete'><a href='delete-post.php?id={$post['id']}'><i class='fa fa-trash-o'></i></a></td>
                                        ";
                                    if(checkRole($conn) == "admin"){
                                        if($post['status'] == "pending") {
                                        echo "<td class='edit'><a class='btn btn-primary' href='../../actions/verifyPost.php?approve=1&post_id={$post['id']}'>Approve</a></td>";
                                    } else{
                                        echo "<td class='edit'><a class='btn btn-danger' href='../../actions/verifyPost.php?approve=0&post_id={$post['id']}'>Reject</a></td>";
                                    }   
                                }
                                  $serial++;
                              }
                          } else {
                              echo "<tr><td colspan='7'>No posts found.</td></tr>";
                          }
                          ?>
                      </tbody>
                  </table>
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
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
<script>
    // Wait for 3 seconds, then fade out the error message
    setTimeout(function() {
        let alertBox = document.getElementById("destroySession");
        if(alertBox) {
            alertBox.style.transition = "opacity 0.5s";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.style.display = "none", 500); // Hide completely after fading out
        }
    }, 3000);
</script>