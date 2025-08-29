 
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Post</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$id = intval($_GET['id']);
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
 
echo "<h1>".$post['title']."</h1>";
echo "<p>".$post['content']."</p>";
?>
 
<hr>
<h3>Comments</h3>
<form method="POST">
    <input type="text" name="username" placeholder="Your name" required><br>
    <textarea name="comment" placeholder="Write a comment" required></textarea><br>
    <button type="submit" name="add_comment">Submit</button>
</form>
 
<?php
if(isset($_POST['add_comment'])){
    $username = $conn->real_escape_string($_POST['username']);
    $comment  = $conn->real_escape_string($_POST['comment']);
    $conn->query("INSERT INTO comments (post_id, username, comment) VALUES ($id, '$username', '$comment')");
    header("Location: post.php?id=$id");
    exit;
}
$comments = $conn->query("SELECT * FROM comments WHERE post_id=$id ORDER BY created_at DESC");
while($c = $comments->fetch_assoc()){
    echo "<p><b>".$c['username']."</b>: ".$c['comment']."</p>";
}
?>
</body>
</html>
 
