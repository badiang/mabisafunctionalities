<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM maintenance_critera_setup_movs_docsource_sub WHERE keyctr = ?");
$stmt->execute([$id]);

header("Location: index_movs_docsource_sub.php");
?>
