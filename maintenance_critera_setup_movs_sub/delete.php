<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyctr = $_POST['keyctr'];

    $stmt = $pdo->prepare("DELETE FROM maintenance_critera_setup_movs_sub WHERE keyctr=?");
    $stmt->execute([$keyctr]);

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
    <title>Delete Maintenance Movs Sub</title>
</head>
<body>
    <h1>Delete Maintenance Criteria Setup Movs Sub</h1>
    <p>Are you sure you want to delete this record?</p>
    <p>Key: <?= $movs_sub['keyctr'] ?></p>
    <p>Description: <?= $movs_sub['description'] ?></p>
    <form method="post">
        <input type="hidden" name="keyctr" value="<?= $movs_sub['keyctr'] ?>">
        <input type="submit" value="Delete">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
