<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM maintenance_criteria_setup WHERE keyctr = ?");
$stmt->execute([$id]);

header("Location: index.php");
?>
