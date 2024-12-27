<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $criteria_keyctr = $_POST['criteria_keyctr'];
    $indicator_keyctr = $_POST['indicator_keyctr'];
    $minreqs_keyctr = $_POST['minreqs_keyctr'];
    $reqs_code = $_POST['reqs_code'];
    $description = $_POST['description'];
    $sub_mininumreqs = isset($_POST['sub_mininumreqs']) ? 1 : 0; // Convert checkbox to 1 or 0
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("INSERT INTO maintenance_critera_setup_area_mininumreqs (criteria_keyctr, indicator_keyctr, minreqs_keyctr, reqs_code, description, sub_mininumreqs, trail) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$criteria_keyctr, $indicator_keyctr, $minreqs_keyctr, $reqs_code, $description, $sub_mininumreqs, $trail]);

    header("Location: index.php");
}

// Fetch foreign keys for dropdowns
$criteria = $pdo->query("SELECT keyctr FROM maintenance_criteria_setup")->fetchAll();
$indicators = $pdo->query("SELECT keyctr FROM maintenance_area_indicators")->fetchAll();
$minreqs = $pdo->query("SELECT keyctr FROM maintenance_area_mininumreqs")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Minimum Requirements</title>
</head>
<body>
    <h1>Add Minimum Requirements</h1>
    <form method="POST">
        <label>Criteria Keyctr:</label>
        <select name="criteria_keyctr" required>
            <option value="">Select Criteria</option>
            <?php foreach ($criteria as $item): ?>
                <option value="<?php echo $item['keyctr']; ?>"><?php echo $item['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Indicator Keyctr:</label>
        <select name="indicator_keyctr" required>
            <option value="">Select Indicator</option>
            <?php foreach ($indicators as $item): ?>
                <option value="<?php echo $item['keyctr']; ?>"><?php echo $item['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Min Reqs Keyctr:</label>
        <select name="minreqs_keyctr" required>
            <option value="">Select Minimum Requirement</option>
            <?php foreach ($minreqs as $item): ?>
                <option value="<?php echo $item['keyctr']; ?>"><?php echo $item['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Reqs Code:</label>
        <input type="text" name="reqs_code" required>
        <br>

        <label>Description:</label>
        <textarea name="description" required></textarea>
        <br>

        <label>Sub Minimum Requirements:</label>
        <input type="checkbox" name="sub_mininumreqs" value="1">
        <br>

        <label>Trail:</label>
        <textarea name="trail" required></textarea>
        <br>

        <button type="submit">Add Minimum Requirement</button>
    </form>
</body>
</html>
