<?php
include 'db.php';

// Fetch all records
$stmt = $pdo->query("SELECT * FROM maintenance_critera_setup_area_mininumreqs_sub");
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Criteria Setup Area Minimum Requirements Sub</title>
</head>
<body>
    <h1>Maintenance Criteria Setup Area Minimum Requirements Sub</h1>
    <a href="create_minimum_reqs_sub.php">Create New Record</a>
    <table border="1">
        <tr>
            <th>Keyctr</th>
            <th>Criteria Minreq Keyctr</th>
            <th>Minreq Keyctr</th>
            <th>Reqs Code</th>
            <th>Description</th>
            <th>Trail</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($records as $record): ?>
        <tr>
            <td><?php echo $record['keyctr']; ?></td>
            <td><?php echo $record['criteria_minreqkeyctr']; ?></td>
            <td><?php echo $record['minreq_keyctr']; ?></td>
            <td><?php echo $record['reqs_code']; ?></td>
            <td><?php echo $record['description']; ?></td>
            <td><?php echo $record['trail']; ?></td>
            <td>
                <a href="edit_minimum_reqs_sub.php?id=<?php echo $record['keyctr']; ?>">Edit</a>
                <a href="delete_minimum_reqs_sub.php?id=<?php echo $record['keyctr']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
