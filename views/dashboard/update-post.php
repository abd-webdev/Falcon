<?php 
include "checkAuth.php";
include "header.php";
?>

<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->

        <?php include "../../config/database.php";
           $post_id = $_GET["id"];
           $stmt = $conn->prepare('SELECT title, description, image, created_at from posts where id = ?');
           $stmt->execute([$post_id]);
           $post = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="../../actions/update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
            <input type="hidden" name="post_id"  class="form-control" value="<?php echo $post_id  ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="title"  class="form-control" id="exampleInputUsername" value="<?php echo $post['title']  ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="description" class="form-control"  required rows="5">
                <?php echo $post['description']  ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img class="my-2" src="../<?php echo $post['image']  ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $post['image']  ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
