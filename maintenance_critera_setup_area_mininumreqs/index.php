<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM maintenance_critera_setup_area_mininumreqs");
$minRequirements = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Minimum Requirements</title>
</head>
<body>
    <h1>Minimum Requirements</h1>
    <a href="create_minimum_reqs.php">Add Minimum Requirement</a>
    <table border="1">
        <thead>
            <tr>
                <th>Keyctr</th>
                <th>Criteria Keyctr</th>
                <th>Indicator Keyctr</th>
                <th>Min Reqs Keyctr</th>
                <th>Reqs Code</th>
                <th>Description</th>
                <th>Sub Minimum Reqs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($minRequirements as $req): ?>
                <tr>
                    <td><?php echo $req['keyctr']; ?></td>
                    <td><?php echo $req['criteria_keyctr']; ?></td>
                    <td><?php echo $req['indicator_keyctr']; ?></td>
                    <td><?php echo $req['minreqs_keyctr']; ?></td>
                    <td><?php echo $req['reqs_code']; ?></td>
                    <td><?php echo $req['description']; ?></td>
                    <td><?php echo $req['sub_mininumreqs'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <a href="edit_minimum_reqs.php?id=<?php echo $req['keyctr']; ?>">Edit</a>
                        <a href="delete_minimum_reqs.php?id=<?php echo $req['keyctr']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
