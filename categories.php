<?php
include 'db.php';
 
// Add new category
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    if ($conn->query($sql)) {
        echo "<p style='color:green;'>✅ Category added successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }
}
 
$result = $conn->query("SELECT * FROM categories");
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>
</head>
<body>
    <h2>Manage Categories</h2>
 
    <form method="POST" action="categories.php">
        <label>New Category Name</label><br>
        <input type="text" name="name" required>
        <button type="submit">Add Category</button>
    </form>
 
    <h3>Existing Categories</h3>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li><?= $row['name']; ?></li>
        <?php endwhile; ?>
    </ul>
 
    <p><a href="create.php">⬅ Back to Create Post</a></p>
</body>
</html>
 
