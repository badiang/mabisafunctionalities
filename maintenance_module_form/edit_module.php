<?php
require 'db.php';

$mod = $_GET['mod'];

$stmt = $pdo->prepare("SELECT * FROM maintenance_module_form WHERE mod = ?");
$stmt->execute([$mod]);
$module = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("UPDATE maintenance_module_form SET description = ?, trail = ? WHERE mod = ?");
    $stmt->execute([$description, $trail, $mod]);

    header("Location: index.php");
    exit();
}
?>

<h1>Edit Module</h1>
<form method="POST">
    <label>Description: <textarea name="description" required><?= $module['description']; ?></textarea></label><br>
    <label>Trail: <textarea name="trail"><?= $module['trail']; ?></textarea></label><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back to List</a>
