<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM maintenance_criteria_setup");
$criteria = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Maintenance Criteria Setup</title>
</head>
<body>
    <h1>Maintenance Criteria Setup</h1>
    <a href="create.php">Add New Criteria</a>
    <table border="1">
        <tr>
            <th>Keyctr</th>
            <th>Version Keyctr</th>
            <th>Governance Keyctr</th>
            <th>Indicator Keyctr</th>
            <th>Indicator Code</th>
            <th>Indicator Description</th>
            <th>Min Reqscode</th>
            <th>Min Reqsdesc</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($criteria as $row): ?>
        <tr>
            <td><?php echo $row['keyctr']; ?></td>
            <td><?php echo $row['version_keyctr']; ?></td>
            <td><?php echo $row['governance_keyctr']; ?></td>
            <td><?php echo $row['indicator_keyctr']; ?></td>
            <td><?php echo $row['indicator_code']; ?></td>
            <td><?php echo $row['indicator_description']; ?></td>
            <td><?php echo $row['min_reqscode']; ?></td>
            <td><?php echo $row['min_reqsdesc']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['keyctr']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['keyctr']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
