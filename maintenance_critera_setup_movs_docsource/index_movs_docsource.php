<?php
include 'db.php'; // I-include ang imong database connection

// Pagkuha sa tanang document sources
$query = $pdo->prepare("SELECT m.keyctr, m.srccode, m.trail, s.description FROM maintenance_critera_setup_movs_docsource m JOIN maintenance_critera_setup_movs s ON m.setupmov_keyctr = s.keyctr");
$query->execute();
$docsources = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Sources</title>
</head>
<body>
    <h1>Document Sources</h1>
    <a href="create_movs_docsource.php">Add New Document Source</a>
    <table border="1">
        <thead>
            <tr>
                <th>Setup Movement</th>
                <th>Source Code</th>
                <th>Trail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($docsources as $docsource): ?>
                <tr>
                    <td><?php echo $docsource['description']; ?></td>
                    <td><?php echo $docsource['srccode']; ?></td>
                    <td><?php echo $docsource['trail']; ?></td>
                    <td>
                        <a href="edit_movs_docsource.php?id=<?php echo $docsource['keyctr']; ?>">Edit</a>
                        <a href="delete_movs_docsource.php?id=<?php echo $docsource['keyctr']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
