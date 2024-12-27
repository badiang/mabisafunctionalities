<?php
include 'db.php'; // I-include ang imong database connection

// Pagkuha sa datos alang sa setupmov_keyctr foreign key
$query = $pdo->prepare("SELECT keyctr, description FROM maintenance_critera_setup_movs");
$query->execute();
$setupmovOptions = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Document Source</title>
</head>
<body>
    <h1>Create Document Source</h1>
    <form action="store_movs_docsource.php" method="POST">
        <label for="setupmov_keyctr">Select Setup Movement:</label>
        <select name="setupmov_keyctr" id="setupmov_keyctr" required>
            <option value="">-- Select --</option>
            <?php foreach ($setupmovOptions as $option): ?>
                <option value="<?php echo $option['keyctr']; ?>"><?php echo $option['description']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="srccode">Source Code:</label>
        <input type="text" name="srccode" id="srccode" required>

        <label for="trail">Trail:</label>
        <textarea name="trail" id="trail" required></textarea>

        <input type="submit" value="Create">
    </form>
</body>
</html>
