<?php
require 'db.php';

$query = $pdo->query("SELECT * FROM maintenance_module_form");
$modules = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Module List</h1>
<a href="create_module.php">Add New Module</a>
<table border="1">
    <tr>
        <th>Mod</th>
        <th>Description</th>
        <th>Trail</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($modules as $module): ?>
    <tr>
        <td><?= $module['mod']; ?></td>
        <td><?= $module['description']; ?></td>
        <td><?= $module['trail']; ?></td>
        <td>
            <a href="edit_module.php?mod=<?= $module['mod']; ?>">Edit</a> | 
            <a href="delete_module.php?mod=<?= $module['mod']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
