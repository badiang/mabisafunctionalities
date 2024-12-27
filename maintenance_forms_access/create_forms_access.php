<?php
require 'db.php';

// Fetch modules for dropdown
$modules = $pdo->query("SELECT *` FROM maintenance_module_form")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $module = $_POST['module'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $sql = "INSERT INTO maintenance_forms_access (module, code, description, trail) VALUES (:module, :code, :description, :trail)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['module' => $module, 'code' => $code, 'description' => $description, 'trail' => $trail]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Form Access</title>
</head>
<body>
    <h1>Add New Form Access</h1>
    <form method="POST">
        <label>Module:</label>
        <select name="module" required>
            <?php foreach ($modules as $module): ?>
                <option value="<?= $module['mod']; ?>"><?= htmlspecialchars($module['description']); ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Code:</label>
        <input type="text" name="code" required><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br>

        <label>Trail:</label>
        <textarea name="trail"></textarea><br>

        <button type="submit">Add</button>
    </form>
</body>
</html>
