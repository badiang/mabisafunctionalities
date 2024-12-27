<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Governance</title>
</head>
<body>

<h1>Maintenance Governance List</h1>

<!-- Display success messages, if any -->
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>{$_SESSION['success']}</p>";
    unset($_SESSION['success']);
}
?>

<!-- Add new governance entry link -->
<a href="create_governance.php">Add New Governance Entry</a>

<!-- Display governance entries from the database -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Category Code</th>
        <th>Area Keyctr</th>
        <th>Description Keyctr</th>
        <th>Description</th>
        <th>Trail</th>
        <th>Actions</th>
    </tr>

    <?php
    // Fetch governance entries from the database
    $stmt = $pdo->query("SELECT * FROM maintenance_governance");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['keyctr']}</td>
                <td>{$row['cat_code']}</td>
                <td>{$row['area_keyctr']}</td>
                <td>{$row['desc_keyctr']}</td>
                <td>{$row['description']}</td>
                <td>{$row['trail']}</td>
                <td>
                    <a href='edit_governance.php?keyctr={$row['keyctr']}'>Edit</a> | 
                    <a href='delete_governance.php?keyctr={$row['keyctr']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
