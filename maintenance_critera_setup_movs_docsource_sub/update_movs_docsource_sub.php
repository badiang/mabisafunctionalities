<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keyctr = $_POST['keyctr'];
    $setupmov_subkeyctr = $_POST['setupmov_subkeyctr'];
    $srccode = $_POST['srccode'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("UPDATE maintenance_critera_setup_movs_docsource_sub SET setupmov_subkeyctr = ?, srccode = ?, trail = ? WHERE keyctr = ?");
    $stmt->execute([$setupmov_subkeyctr, $srccode, $trail, $keyctr]);

    header("Location: index_movs_docsource_sub.php");
}
?>
