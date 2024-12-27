<?php
include 'db.php'; // I-include ang imong database connection

// Pagkuha sa data sa document source para sa pag-edit
$id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM maintenance_critera_setup_movs_docsource WHERE keyctr = ?");
$query->execute([$id]);
$docsource = $query->fetch(PDO::FETCH_ASSOC);

// Pagkuha sa data alang sa setupmov_keyctr foreign key
$querySetup = $pdo->prepare("SELECT keyctr, description FROM maintenance_critera_setup_movs");
$querySetup->execute();
$setupmovOptions = $querySetup->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Document Source</title>
</head>
<body>
    <h1>Edit Document Source</h1>
    <form action="update_movs_docsource.php" method="POST">
        <input type="hidden" name="keyctr" value="<?php echo $docsource['keyctr']; ?>">
        
        <label for="setupmov_keyctr">Select Setup Movement:</label>
        <select name="setupmov_keyctr" id="setupmov_keyctr" required>
            <option value="">-- Select --</option>
            <?php foreach ($setupmovOptions as $option): ?>
                <option value="<?php echo $option['keyctr']; ?>" <?php echo $option['keyctr'] == $docsource['setupmov_keyctr'] ? 'selected' : ''; ?>><?php echo $option['description']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="srccode">Source Code:</label>
        <input type="text" name="srccode" id="srccode" value="<?php echo $docsource['srccode']; ?>" required>

        <label for="trail">Trail:</label>
        <textarea name="trail" id="trail" required><?php echo $docsource['trail']; ?></textarea>

        <input type="submit" value="Update">
    </form>
</body>
</html>
