<div id="sidebar" class="col-md-4">
    <!-- search box -->

    <?php
    include("../../config/database.php");
    $stmt = $conn->prepare('SELECT posts.id, posts.title, posts.description, posts.image, posts.created_at, posts.status, posts.author_id,
                                users.name AS author_name  from posts 
                                JOIN users on posts.author_id = users.id
                                WHERE posts.status = ?
                                ORDER BY created_at DESC limit 5');
    $stmt->execute(["approved"]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="search-box-container">
        <h4>Search</h4>
        <div class="input-group">
            <input type="text" id="search" name="search" class="form-control" placeholder="Search ....." onkeyup="liveSearch()">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-danger">Search</button>
            </span>
        </div>
        <div id="search-results" style="font-size: 12px;"></div>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php 
        if($posts){
            foreach($posts as $post){
                echo "
                    <div class='recent-post'>
                    <a class='post-img' href=''>
                    <img src='../{$post['image']}' alt=''/>
                    </a>
                    <div class='post-content'>
                        <h5><a href='post-details.php?id={$post['id']}'>{$post['title']}</a></h5>
                        <span>
                        <i class='fa fa-tags' aria-hidden='true'></i>
                        <a href='category.php'>{$post['author_name']}</a>
                        </span>
                        <span>
                        <i class='fa fa-calendar' aria-hidden='true'></i>
                        {$post['created_at']}
                        </span>
                        <a class='read-more' href='single.php'>read more</a>
                        </div>
                        </div>
                ";
            }
        }  
        ?>
       
       
    </div>
    <!-- /recent posts box -->
</div>

<script>
function liveSearch() {
    let query = document.getElementById("search").value;
    
    if (query.length == 0) { 
        document.getElementById("search-results").innerHTML = "";
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("search-results").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "livesearch.php?q=" + query, true);
    xhr.send();
}
</script>
