<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Source Sub List</title>
</head>
<body>
    <h1>Document Source Sub List</h1>
    <a href="create_movs_docsource_sub.php">Add New</a>
    <table border="1">
        <tr>
            <th>Keyctr</th>
            <th>Setup Mov Sub Keyctr</th>
            <th>Source Code</th>
            <th>Trail</th>
            <th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM maintenance_critera_setup_movs_docsource_sub");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['keyctr']}</td>
                <td>{$row['setupmov_subkeyctr']}</td>
                <td>{$row['srccode']}</td>
                <td>{$row['trail']}</td>
                <td>
                    <a href='edit_movs_docsource_sub.php?id={$row['keyctr']}'>Edit</a>
                    <a href='delete_movs_docsource_sub.php?id={$row['keyctr']}'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
