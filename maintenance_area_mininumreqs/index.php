<?php
include 'db.php';

// Fetch data
$sql = "SELECT * FROM maintenance_area_mininumreqs";
$stmt = $pdo->query($sql);
$mininumreqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Area Minimum Reqs</title>
</head>
<body>
    <h1>Maintenance Area Minimum Requirements</h1>
    <a href="create.php">Create New Requirement</a>
    <table border="1">
        <tr>
            <th>Keyctr</th>
            <th>Indicator Keyctr</th>
            <th>Reqs Code</th>
            <th>Description</th>
            <th>Sub Minimum Reqs</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($mininumreqs as $req): ?>
            <tr>
                <td><?= $req['keyctr'] ?></td>
                <td><?= $req['indicator_keyctr'] ?></td>
                <td><?= $req['reqs_code'] ?></td>
                <td><?= $req['description'] ?></td>
                <td><?= $req['sub_mininumreqs'] ?></td>
                <td>
                    <a href="edit.php?keyctr=<?= $req['keyctr'] ?>">Edit</a>
                    <a href="delete.php?keyctr=<?= $req['keyctr'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
