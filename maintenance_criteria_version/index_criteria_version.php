<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Criteria Versions</title>
</head>
<body>

<h1>Maintenance Criteria Versions</h1>

<!-- Display success messages, if any -->
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>{$_SESSION['success']}</p>";
    unset($_SESSION['success']);
}
?>

<!-- Add new criteria version link -->
<a href="create_criteria_version.php">Add New Criteria Version</a>

<!-- Display criteria versions from the database -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Short Definition</th>
        <th>Description</th>
        <th>Active Year</th>
        <th>Active</th>
        <th>Trail</th>
        <th>Actions</th>
    </tr>

    <?php
    // Fetch criteria versions from the database
    $stmt = $pdo->query("SELECT * FROM maintenance_criteria_version");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['keyctr']}</td>
                <td>{$row['short_def']}</td>
                <td>{$row['description']}</td>
                <td>{$row['active_yr']}</td>
                <td>" . ($row['active_'] ? 'Yes' : 'No') . "</td>
                <td>{$row['trail']}</td>
                <td>
                    <a href='edit_criteria_version.php?keyctr={$row['keyctr']}'>Edit</a> | 
                    <a href='delete_criteria_version.php?keyctr={$row['keyctr']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
