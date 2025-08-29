<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Post</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Create New Post</h1>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="content" placeholder="Content" required></textarea><br>
    <select name="category_id">
        <?php
        $cats = $conn->query("SELECT * FROM categories");
        while($c = $cats->fetch_assoc()){
            echo "<option value='".$c['id']."'>".$c['name']."</option>";
        }
        ?>
    </select><br>
    <button type="submit" name="save">Publish</button>
</form>
 
<?php
if(isset($_POST['save'])){
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $category_id = intval($_POST['category_id']);
    $user_id = 1; // default
    $conn->query("INSERT INTO posts (title, content, category_id, user_id) 
                  VALUES ('$title', '$content', $category_id, $user_id)");
    header("Location: index.php");
    exit;
}
?>
</body>
</html>
 
