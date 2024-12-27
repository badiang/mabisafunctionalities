<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM maintenance_critera_setup_area_mininumreqs_sub WHERE keyctr = ?");
$stmt->execute([$id]);

header("Location: index.php");
