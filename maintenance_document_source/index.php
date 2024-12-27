<?php
require 'db.php';

// Fetch all document sources
$document_sources = $pdo->query("SELECT * FROM maintenance_document_source")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document Sources</title>
</head>
<body>
    <h1>Document Sources List</h1>
    <a href="create_document_source.php">Add New Document Source</a>
    <table border="1">
        <tr>
            <th>Keyctr</th>
            <th>Source Code</th>
            <th>Source Description</th>
            <th>Trail</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($document_sources as $source): ?>
        <tr>
            <td><?= htmlspecialchars($source['keyctr']); ?></td>
            <td><?= htmlspecialchars($source['srccode']); ?></td>
            <td><?= htmlspecialchars($source['srcdesc']); ?></td>
            <td><?= htmlspecialchars($source['trail']); ?></td>
            <td>
                <a href="edit_document_source.php?keyctr=<?= htmlspecialchars($source['keyctr']); ?>">Edit</a>
                <a href="delete_document_source.php?keyctr=<?= htmlspecialchars($source['keyctr']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
