<?php
include 'db.php'; // I-include ang imong database connection

$id = $_GET['id'];

// I-delete ang document source
$query = $pdo->prepare("DELETE FROM maintenance_critera_setup_movs_docsource WHERE keyctr = ?");
$query->execute([$id]);

// Mag-redirect sa index page o ipakita ang success message
header("Location: index_movs_docsource.php");
?>
