<?php
require 'db.php';

$mod = $_GET['mod'];

$stmt = $pdo->prepare("DELETE FROM maintenance_module_form WHERE mod = ?");
$stmt->execute([$mod]);

header("Location: index.php");
exit();
?>
