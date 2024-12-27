<?php
include 'db.php'; // I-include ang imong database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyctr = $_POST['keyctr'];
    $setupmov_keyctr = $_POST['setupmov_keyctr'];
    $srccode = $_POST['srccode'];
    $trail = $_POST['trail'];

    // I-update ang data sa maintenance_critera_setup_movs_docsource table
    $query = $pdo->prepare("UPDATE maintenance_critera_setup_movs_docsource SET setupmov_keyctr = ?, srccode = ?, trail = ? WHERE keyctr = ?");
    $query->execute([$setupmov_keyctr, $srccode, $trail, $keyctr]);

    // Mag-redirect sa index page o ipakita ang success message
    header("Location: index_movs_docsource.php");
}
?>
