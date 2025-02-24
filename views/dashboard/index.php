<?php include "header.php"; ?>
<?php
include '../../config/database.php';
session_start();

// Fetch all posts from the database
$stmt = $conn->prepare("SELECT id, title, created_at, author_id FROM posts WHERE author_id = ?");
$stmt->execute([$_SESSION["user_id"]]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
  <div id="admin-content">
      <div class="container">
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
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <?php
                          if ($posts) {
                              $serial = 1;
                              foreach ($posts as $post) {
                                  echo "<tr>
                                          <td class='id'>{$serial}</td>
                                          <td>{$post['title']}</td>
                                          <td>{$post['created_at']}</td>
                                          <td>{$post['author_id']}</td>
                                          <td class='edit'><a href='update-post.php?id={$post['id']}'><i class='fa fa-edit'></i></a></td>
                                          <td class='delete'><a href='delete-post.php?id={$post['id']}'><i class='fa fa-trash-o'></i></a></td>
                                        </tr>";
                                  $serial++;
                              }
                          } else {
                              echo "<tr><td colspan='7'>No posts found.</td></tr>";
                          }
                          ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>