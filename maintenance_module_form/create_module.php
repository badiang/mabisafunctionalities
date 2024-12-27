<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mod = $_POST['mod'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("INSERT INTO maintenance_module_form (mod, description, trail) VALUES (?, ?, ?)");
    $stmt->execute([$mod, $description, $trail]);

    header("Location: index.php");
    exit();
}
?>

<h1>Create New Module</h1>
<form method="POST">
    <label>Mod: <input type="text" name="mod" maxlength="2" required></label><br>
    <label>Description: <textarea name="description" required></textarea></label><br>
    <label>Trail: <textarea name="trail"></textarea></label><br>
    <button type="submit">Submit</button>
</form>
<a href="index.php">Back to List</a>
