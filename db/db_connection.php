<?php
$host = 'localhost';
$port = '3306';
$dbname = 'helmesdb';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} catch (PDOException $e) {
    echo $e->getMessage();
    return;
}
?>