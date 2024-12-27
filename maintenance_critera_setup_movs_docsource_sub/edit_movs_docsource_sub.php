<?php 
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM maintenance_critera_setup_movs_docsource_sub WHERE keyctr = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if (!$row) {
    die("Record not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Document Source Sub</title>
</head>
<body>
    <h1>Edit Document Source Sub</h1>
    <form action="update_movs_docsource_sub.php" method="POST">
        <input type="hidden" name="keyctr" value="<?= $row['keyctr'] ?>">
        <label for="setupmov_subkeyctr">Setup Mov Sub Keyctr:</label>
        <input type="number" name="setupmov_subkeyctr" value="<?= $row['setupmov_subkeyctr'] ?>" required>
        <br>
        <label for="srccode">Source Code:</label>
        <input type="text" name="srccode" value="<?= $row['srccode'] ?>" required>
        <br>
        <label for="trail">Trail:</label>
        <textarea name="trail" required><?= $row['trail'] ?></textarea>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="index_movs_docsource_sub.php">Back to List</a>
</body>
</html>
