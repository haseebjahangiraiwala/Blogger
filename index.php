<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Blogger Clone</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Blogger Clone</h1>
<a href="new_post.php">+ Create New Post</a>
<hr>
 
<?php
$sql = "SELECT posts.*, categories.name AS category 
        FROM posts 
        LEFT JOIN categories ON posts.category_id=categories.id 
        ORDER BY posts.created_at DESC";
$result = $conn->query($sql);
 
while($row = $result->fetch_assoc()) {
    echo "<div class='post'>";
    echo "<h2><a href='post.php?id=".$row['id']."'>".$row['title']."</a></h2>";
    echo "<small>Category: ".$row['category']." | ".$row['created_at']."</small>";
    echo "<p>".substr($row['content'],0,150)."...</p>";
    echo "</div><hr>";
}
?>
</body>
</html>
