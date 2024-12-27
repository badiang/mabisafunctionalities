<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $version_keyctr = $_POST['version_keyctr'];
    $governance_keyctr = $_POST['governance_keyctr'];
    $indicator_keyctr = $_POST['indicator_keyctr'];
    $indicator_code = $_POST['indicator_code'];
    $indicator_description = $_POST['indicator_description'];
    $min_reqscode = $_POST['min_reqscode'];
    $min_reqsdesc = $_POST['min_reqsdesc'];

    $stmt = $pdo->prepare("INSERT INTO maintenance_criteria_setup (version_keyctr, governance_keyctr, indicator_keyctr, indicator_code, indicator_description, min_reqscode, min_reqsdesc) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$version_keyctr, $governance_keyctr, $indicator_keyctr, $indicator_code, $indicator_description, $min_reqscode, $min_reqsdesc]);

    header("Location: index.php");
}

// Fetch foreign keys for dropdowns
$versions = $pdo->query("SELECT keyctr FROM maintenance_criteria_version")->fetchAll();
$governances = $pdo->query("SELECT keyctr FROM maintenance_governance")->fetchAll();
$indicators = $pdo->query("SELECT keyctr FROM maintenance_area_indicators")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Criteria</title>
</head>
<body>
    <h1>Add Criteria</h1>
    <form method="POST">
        <label>Version Keyctr:</label>
        <select name="version_keyctr" required>
            <option value="">Select Version</option>
            <?php foreach ($versions as $version): ?>
                <option value="<?php echo $version['keyctr']; ?>"><?php echo $version['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Governance Keyctr:</label>
        <select name="governance_keyctr" required>
            <option value="">Select Governance</option>
            <?php foreach ($governances as $governance): ?>
                <option value="<?php echo $governance['keyctr']; ?>"><?php echo $governance['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Indicator Keyctr:</label>
        <select name="indicator_keyctr" required>
            <option value="">Select Indicator</option>
            <?php foreach ($indicators as $indicator): ?>
                <option value="<?php echo $indicator['keyctr']; ?>"><?php echo $indicator['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Indicator Code:</label>
        <input type="number" name="indicator_code" required>
        <br>

        <label>Indicator Description:</label>
        <textarea name="indicator_description" required></textarea>
        <br>

        <label>Min Reqscode:</label>
        <input type="text" name="min_reqscode" required>
        <br>

        <label>Min Reqsdesc:</label>
        <textarea name="min_reqsdesc" required></textarea>
        <br>

        <button type="submit">Add Criteria</button>
    </form>
</body>
</html>
