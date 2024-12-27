<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $setupmov_subkeyctr = $_POST['setupmov_subkeyctr'];
    $srccode = $_POST['srccode'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("INSERT INTO maintenance_critera_setup_movs_docsource_sub (setupmov_subkeyctr, srccode, trail) VALUES (?, ?, ?)");
    $stmt->execute([$setupmov_subkeyctr, $srccode, $trail]);

    header("Location: index_movs_docsource_sub.php");
}
?>
