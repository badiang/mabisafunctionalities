<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Document Source Sub</title>
</head>
<body>
    <h1>Create Document Source Sub</h1>
    <form action="store_movs_docsource_sub.php" method="POST">
        <label for="setupmov_subkeyctr">Setup Mov Sub Keyctr:</label>
        <input type="number" name="setupmov_subkeyctr" required>
        <br>
        <label for="srccode">Source Code:</label>
        <input type="text" name="srccode" required>
        <br>
        <label for="trail">Trail:</label>
        <textarea name="trail" required></textarea>
        <br>
        <button type="submit">Create</button>
    </form>
    <a href="index_movs_docsource_sub.php">Back to List</a>
</body>
</html>
