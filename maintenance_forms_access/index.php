<?php
require 'db.php';

// Fetch all forms access
$forms_access = $pdo->query("SELECT * FROM maintenance_forms_access")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forms Access</title>
</head>
<body>
    <h1>Forms Access List</h1>
    <a href="create_forms_access.php">Add New Form Access</a>
    <table border="1">
        <tr>
            <th>Module</th>
            <th>Code</th>
            <th>Description</th>
            <th>Trail</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($forms_access as $form): ?>
        <tr>
            <td><?= htmlspecialchars($form['module']); ?></td>
            <td><?= htmlspecialchars($form['code']); ?></td>
            <td><?= htmlspecialchars($form['description']); ?></td>
            <td><?= htmlspecialchars($form['trail']); ?></td>
            <td>
                <a href="edit_forms_access.php?code=<?= htmlspecialchars($form['code']); ?>">Edit</a>
                <a href="delete_forms_access.php?code=<?= htmlspecialchars($form['code']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
