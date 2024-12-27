<?php
require 'db.php';

$code = $_GET['code'];

$sql = "DELETE FROM maintenance_forms_access WHERE code = :code";
$stmt = $pdo->prepare($sql);
$stmt->execute(['code' => $code]);

header('Location: index.php');
?>
