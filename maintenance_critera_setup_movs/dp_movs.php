<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyctr = $_POST['keyctr']; // Assuming you have an input field with this name
    $setupminreqs_keyctr = $_POST['setupminreqs_keyctr'];
    $description = $_POST['description'];
    $trail = $_POST['trail'];

    $stmt = $pdo->prepare("UPDATE maintenance_critera_setup_movs 
                            SET setupminreqs_keyctr = ?, description = ?, trail = ? 
                            WHERE keyctr = ?");
    $stmt->execute([$setupminreqs_keyctr, $description, $trail, $keyctr]);

    header("Location: index_movs.php");
    exit();
}
