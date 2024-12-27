<?php
include 'db.php';

$id = $_GET['id'];

// Fetch the existing record
$stmt = $pdo->prepare("SELECT * FROM maintenance_critera_setup_movs WHERE keyctr = ?");
$stmt->execute([$id]);
$mov = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch options for the foreign key
$minreqs_stmt = $pdo->query("SELECT keyctr, description FROM maintenance_critera_setup_area_mininumreqs");
$minreqs_options = $minreqs_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Maintenance Criteria Setup Movs</title>
</head>
<body>
    <h1>Edit Maintenance Criteria Setup Movs</h1>
    <form action="dp_movs.php?id=<?php echo $mov['keyctr']; ?>" method="POST">
        <input type="hidden" name="keyctr" value="<?php echo $mov['keyctr']; ?>">

        <label for="setupminreqs_keyctr">Minimum Requirements:</label>
        <select name="setupminreqs_keyctr" required>
            <option value="">Select...</option>
            <?php foreach ($minreqs_options as $option): ?>
                <option value="<?php echo $option['keyctr']; ?>" <?php echo $mov['setupminreqs_keyctr'] == $option['keyctr'] ? 'selected' : ''; ?>>
                    <?php echo $option['description']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $mov['description']; ?></textarea>
        <br>

        <label for="trail">Trail:</label>
        <textarea name="trail" required><?php echo $mov['trail']; ?></textarea>
        <br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
