<?php
$host = "localhost";
$db = "innventario_tienda"; 
$user = "root";
$pass = "";

try {
    // Conexión PDO a MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(" Error de conexión: " . $e->getMessage());
}
?>
