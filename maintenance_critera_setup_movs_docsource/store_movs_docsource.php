<?php
include 'db.php'; // I-include ang imong database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $setupmov_keyctr = $_POST['setupmov_keyctr'];
    $srccode = $_POST['srccode'];
    $trail = $_POST['trail'];

    // I-insert ang data sa maintenance_critera_setup_movs_docsource table
    $query = $pdo->prepare("INSERT INTO maintenance_critera_setup_movs_docsource (setupmov_keyctr, srccode, trail) VALUES (?, ?, ?)");
    $query->execute([$setupmov_keyctr, $srccode, $trail]);

    // Mag-redirect sa index page o ipakita ang success message
    header("Location: index_movs_docsource.php");
}
?>
