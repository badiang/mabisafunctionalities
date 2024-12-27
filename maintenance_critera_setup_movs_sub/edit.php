<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyctr = $_POST['keyctr'];
    $setupminreqs_subkeyctr = $_POST['setupminreqs_subkeyctr'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("UPDATE maintenance_critera_setup_movs_sub SET setupminreqs_subkeyctr=?, description=?, trail=? WHERE keyctr=?");
    $stmt->execute([$setupminreqs_subkeyctr, $description, $trail, $keyctr]);

    header("Location: index.php");
} else {
    $keyctr = $_GET['keyctr'];
    $stmt = $pdo->prepare("SELECT * FROM maintenance_critera_setup_movs_sub WHERE keyctr=?");
    $stmt->execute([$keyctr]);
    $movs_sub = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Maintenance Movs Sub</title>
</head>
<body>
    <h1>Edit Maintenance Criteria Setup Movs Sub</h1>
    <form method="post">
        <input type="hidden" name="keyctr" value="<?= $movs_sub['keyctr'] ?>">
        
        <label for="setupminreqs_subkeyctr">Setup Min Req Sub Key:</label>
        <input type="text" name="setupminreqs_subkeyctr" value="<?= $movs_sub['setupminreqs_subkeyctr'] ?>" required><br>
        
        <label for="description">Description:</label>
        <textarea name="description" required><?= $movs_sub['description'] ?></textarea><br>
        
        <label for="trail">Trail:</label>
        <textarea name="trail" required><?= $movs_sub['trail'] ?></textarea><br>
        
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
