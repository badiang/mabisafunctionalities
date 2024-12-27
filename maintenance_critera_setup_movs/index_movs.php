<?php
include 'db.php';

$stmt = $pdo->query("SELECT m.keyctr, m.description, m.trail, r.description AS minreq_description 
                      FROM maintenance_critera_setup_movs m 
                      JOIN maintenance_critera_setup_area_mininumreqs r ON m.setupminreqs_keyctr = r.keyctr");
$movs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Criteria Setup Movs</title>
</head>
<body>
    <h1>Maintenance Criteria Setup Movs</h1>
    <a href="create_movs.php">Create New</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Minimum Requirement</th>
                <th>Description</th>
                <th>Trail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movs as $mov): ?>
                <tr>
                    <td><?php echo $mov['keyctr']; ?></td>
                    <td><?php echo $mov['minreq_description']; ?></td>
                    <td><?php echo $mov['description']; ?></td>
                    <td><?php echo $mov['trail']; ?></td>
                    <td>
                        <a href="edit_movs.php?id=<?php echo $mov['keyctr']; ?>">Edit</a>
                        <a href="delete_movs.php?id=<?php echo $mov['keyctr']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
