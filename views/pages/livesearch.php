<?php
include '../../config/database.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q != '') {
    $stmt = $conn->prepare("SELECT id, title FROM posts WHERE title LIKE ? OR description LIKE ? LIMIT 5");
    $searchTerm = "%$q%";
    $stmt->execute([$searchTerm, $searchTerm]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $post) {
            echo "<p class='font-size: 8px'><a href='post-details.php?id=" . $post['id'] . "'>" . htmlspecialchars($post['title']) . "</a></p>";
        }
    } else {
        echo "<p>No results found</p>";
    }
}
?>
