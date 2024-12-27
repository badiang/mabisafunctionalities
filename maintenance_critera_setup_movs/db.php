<?php
$host = 'localhost'; // Hostname
$db = 'mabisa';      // Database name
$user = 'root';      // Database username
$pass = '';          // Database password

try {
    // Establishing the database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>
