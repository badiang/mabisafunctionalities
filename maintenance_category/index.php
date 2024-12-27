<?php
// db.php should include the connection to your database
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Categories</title>
</head>
<body>

<h1>Maintenance Categories</h1>

<!-- Display success messages, if any -->
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>{$_SESSION['success']}</p>";
    unset($_SESSION['success']);
}
?>

<!-- Add new category link -->
<a href="create_category.php">Add New Category</a>

<!-- Display categories from the database -->
<table border="1">
    <tr>
        <th>Code</th>
        <th>Short Definition</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    <?php
    // Fetch categories from the database
    $stmt = $pdo->query("SELECT * FROM maintenance_category");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['code']}</td>
                <td>{$row['short_def']}</td>
                <td>{$row['description']}</td>
                <td>
                    <a href='edit_category.php?code={$row['code']}'>Edit</a> | 
                    <a href='delete_category.php?code={$row['code']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
