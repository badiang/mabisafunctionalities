<?php
require 'db.php';

$code = $_GET['code'];
$sql = "SELECT * FROM maintenance_forms_access WHERE code = :code";
$stmt = $pdo->prepare($sql);
$stmt->execute(['code' => $code]);
$form_access = $stmt->fetch();

// Fetch modules for dropdown
$modules = $pdo->query("SELECT mod, `description` FROM maintenance_module_form")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $module = $_POST['module'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $sql = "UPDATE maintenance_forms_access SET module = :module, description = :description, trail = :trail WHERE code = :code";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['module' => $module, 'description' => $description, 'trail' => $trail, 'code' => $code]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Form Access</title>
</head>
<body>
    <h1>Edit Form Access</h1>
    <form method="POST">
        <label>Module:</label>
        <select name="module" required>
            <?php foreach ($modules as $module): ?>
                <option value="<?= $module['mod']; ?>" <?= $form_access['module'] == $module['mod'] ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($module['description']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Code:</label>
        <input type="text" name="code" value="<?= htmlspecialchars($form_access['code']); ?>" readonly><br>

        <label>Description:</label>
        <textarea name="description" required><?= htmlspecialchars($form_access['description']); ?></textarea><br>

        <label>Trail:</label>
        <textarea name="trail"><?= htmlspecialchars($form_access['trail']); ?></textarea><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
