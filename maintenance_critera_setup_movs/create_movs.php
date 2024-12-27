<?php
include 'db.php';

// Fetch options for the foreign key from maintenance_critera_setup_area_mininumreqs
$minreqs_stmt = $pdo->query("SELECT keyctr, description FROM maintenance_critera_setup_area_mininumreqs");
$minreqs_options = $minreqs_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Maintenance Criteria Setup Movs</title>
</head>
<body>
    <h1>Create Maintenance Criteria Setup Movs</h1>
    <form action="dp_movs.php" method="POST">
        <label for="setupminreqs_keyctr">Minimum Requirements:</label>
        <select name="setupminreqs_keyctr" required>
            <option value="">Select...</option>
            <?php foreach ($minreqs_options as $option): ?>
                <option value="<?php echo $option['keyctr']; ?>"><?php echo $option['description']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>

        <label for="trail">Trail:</label>
        <textarea name="trail" required></textarea>
        <br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
