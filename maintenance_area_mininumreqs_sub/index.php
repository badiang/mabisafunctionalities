<?php
require 'db.php';

$query = $pdo->query("SELECT * FROM maintenance_area_mininumreqs_sub");
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <thead>
        <tr>
            <th>KeyCtr</th>
            <th>MininumReq KeyCtr</th>
            <th>Indicator KeyCtr</th>
            <th>Reqs Code</th>
            <th>Description</th>
            <th>Trail</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= $row['keyctr']; ?></td>
            <td><?= $row['mininumreq_keyctr']; ?></td>
            <td><?= $row['indicator_keyctr']; ?></td>
            <td><?= $row['reqs_code']; ?></td>
            <td><?= $row['description']; ?></td>
            <td><?= $row['trail']; ?></td>
            <td>
                <a href="edit_mininumreqs_sub.php?keyctr=<?= $row['keyctr']; ?>">Edit</a>
                <a href="delete_mininumreqs_sub.php?keyctr=<?= $row['keyctr']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="create_mininumreqs_sub.php">Add New</a>
