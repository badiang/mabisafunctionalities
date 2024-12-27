<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $setupminreqs_subkeyctr = $_POST['setupminreqs_subkeyctr'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("INSERT INTO maintenance_critera_setup_movs_sub (setupminreqs_subkeyctr, description, trail) VALUES (?, ?, ?)");
    $stmt->execute([$setupminreqs_subkeyctr, $description, $trail]);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Maintenance Movs Sub</title>
</head>
<body>
    <h1>Add Maintenance Criteria Setup Movs Sub</h1>
    <form method="post">
        <label for="setupminreqs_subkeyctr">Setup Min Req Sub Key:</label>
        <input type="text" name="setupminreqs_subkeyctr" required><br>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        
        <label for="trail">Trail:</label>
        <textarea name="trail" required></textarea><br>
        
        <input type="submit" value="Add">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
