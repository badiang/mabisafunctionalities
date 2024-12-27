<?php
include 'db.php';

$query = $pdo->query("SELECT * FROM maintenance_critera_setup_movs_sub");
$movs_subs = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Criteria Setup Movs Sub</title>
</head>
<body>
    <h1>Maintenance Criteria Setup Movs Sub</h1>
    <a href="create.php">Add New</a>
    <table border="1">
        <tr>
            <th>Key</th>
            <th>Setup Min Req Sub Key</th>
            <th>Description</th>
            <th>Trail</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($movs_subs as $movs_sub): ?>
            <tr>
                <td><?= $movs_sub['keyctr'] ?></td>
                <td><?= $movs_sub['setupminreqs_subkeyctr'] ?></td>
                <td><?= $movs_sub['description'] ?></td>
                <td><?= $movs_sub['trail'] ?></td>
                <td>
                    <a href="edit.php?keyctr=<?= $movs_sub['keyctr'] ?>">Edit</a>
                    <a href="delete.php?keyctr=<?= $movs_sub['keyctr'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
