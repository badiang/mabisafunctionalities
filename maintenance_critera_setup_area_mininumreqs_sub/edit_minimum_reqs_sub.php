<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM maintenance_critera_setup_area_mininumreqs_sub WHERE keyctr = ?");
$stmt->execute([$id]);
$minimumReqSub = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch options for criteria_minreqkeyctr
$criteria_stmt = $pdo->query("SELECT keyctr, some_field FROM maintenance_critera_setup_area_mininumreqs"); // Replace `some_field` with the actual field you want to display
$criteria_options = $criteria_stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch options for minreq_keyctr
$minreq_stmt = $pdo->query("SELECT keyctr, description FROM maintenance_area_mininumreqs"); // Use the appropriate field for display
$minreq_options = $minreq_stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $criteria_minreqkeyctr = $_POST['criteria_minreqkeyctr'];
    $minreq_keyctr = $_POST['minreq_keyctr'];
    $reqs_code = $_POST['reqs_code'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("UPDATE maintenance_critera_setup_area_mininumreqs_sub SET criteria_minreqkeyctr = ?, minreq_keyctr = ?, reqs_code = ?, description = ?, trail = ? WHERE keyctr = ?");
    $stmt->execute([$criteria_minreqkeyctr, $minreq_keyctr, $reqs_code, $description, $trail, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Minimum Requirement Sub</title>
</head>
<body>
    <h1>Edit Minimum Requirement Sub</h1>
    <form method="post">
        <label>Criteria Minreq Keyctr:</label>
        <select name="criteria_minreqkeyctr" required>
            <option value="">Select Criteria</option>
            <?php foreach ($criteria_options as $option): ?>
                <option value="<?php echo $option['keyctr']; ?>" <?php echo ($option['keyctr'] == $minimumReqSub['criteria_minreqkeyctr']) ? 'selected' : ''; ?>>
                    <?php echo $option['some_field']; ?>
                </option> <!-- Display the appropriate field -->
            <?php endforeach; ?>
        </select>
        <br>

        <label>Minreq Keyctr:</label>
        <select name="minreq_keyctr" required>
            <option value="">Select Minimum Requirement</option>
            <?php foreach ($minreq_options as $option): ?>
                <option value="<?php echo $option['keyctr']; ?>" <?php echo ($option['keyctr'] == $minimumReqSub['minreq_keyctr']) ? 'selected' : ''; ?>>
                    <?php echo $option['description']; ?>
                </option> <!-- Display the appropriate field -->
            <?php endforeach; ?>
        </select>
        <br>

        <label>Reqs Code:</label>
        <input type="text" name="reqs_code" value="<?php echo $minimumReqSub['reqs_code']; ?>" required>
        <br>

        <label>Description:</label>
        <textarea name="description" required><?php echo $minimumReqSub['description']; ?></textarea>
        <br>

        <label>Trail:</label>
        <textarea name="trail" required><?php echo $minimumReqSub['trail']; ?></textarea>
        <br>

        <button type="submit">Update Minimum Requirement Sub</button>
    </form>
</body>
</html>
