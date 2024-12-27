<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM maintenance_critera_setup_area_mininumreqs WHERE keyctr = ?");
$stmt->execute([$id]);
$minimumReq = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $criteria_keyctr = $_POST['criteria_keyctr'];
    $indicator_keyctr = $_POST['indicator_keyctr'];
    $minreqs_keyctr = $_POST['minreqs_keyctr'];
    $reqs_code = $_POST['reqs_code'];
    $description = $_POST['description'];
    $sub_mininumreqs = isset($_POST['sub_mininumreqs']) ? 1 : 0; // Convert checkbox to 1 or 0
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("UPDATE maintenance_critera_setup_area_mininumreqs SET criteria_keyctr = ?, indicator_keyctr = ?, minreqs_keyctr = ?, reqs_code = ?, description = ?, sub_mininumreqs = ?, trail = ? WHERE keyctr = ?");
    $stmt->execute([$criteria_keyctr, $indicator_keyctr, $minreqs_keyctr, $reqs_code, $description, $sub_mininumreqs, $trail, $id]);

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
    <title>Edit Minimum Requirements</title>
</head>
<body>
    <h1>Edit Minimum Requirements</h1>
    <form method="POST">
        <label>Criteria Keyctr:</label>
        <select name="criteria_keyctr" required>
            <option value="">Select Criteria</option>
            <?php foreach ($criteria as $item): ?>
                <option value="<?php echo $item['keyctr']; ?>" <?php if ($minimumReq['criteria_keyctr'] == $item['keyctr']) echo 'selected'; ?>><?php echo $item['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Indicator Keyctr:</label>
        <select name="indicator_keyctr" required>
            <option value="">Select Indicator</option>
            <?php foreach ($indicators as $item): ?>
                <option value="<?php echo $item['keyctr']; ?>" <?php if ($minimumReq['indicator_keyctr'] == $item['keyctr']) echo 'selected'; ?>><?php echo $item['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Min Reqs Keyctr:</label>
        <select name="minreqs_keyctr" required>
            <option value="">Select Minimum Requirement</option>
            <?php foreach ($minreqs as $item): ?>
                <option value="<?php echo $item['keyctr']; ?>" <?php if ($minimumReq['minreqs_keyctr'] == $item['keyctr']) echo 'selected'; ?>><?php echo $item['keyctr']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Reqs Code:</label>
        <input type="text" name="reqs_code" value="<?php echo $minimumReq['reqs_code']; ?>" required>
        <br>

        <label>Description:</label>
        <textarea name="description" required><?php echo $minimumReq['description']; ?></textarea>
        <br>

        <label>Sub Minimum Requirements:</label>
        <input type="checkbox" name="sub_mininumreqs" value="1" <?php if ($minimumReq['sub_mininumreqs']) echo 'checked'; ?>>
        <br>

        <label>Trail:</label>
        <textarea name="trail" required><?php echo $minimumReq['trail']; ?></textarea>
        <br>

        <button type="submit">Update Minimum Requirement</button>
    </form>
</body>
</html>
