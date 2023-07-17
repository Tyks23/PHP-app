<?php

if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['sectors'] = $_POST['sectors'];
    $_SESSION['agree'] = isset($_POST['agree']);
}

require_once '../db/db_connection.php';

$sql = 'INSERT INTO users (user_name, agrees_to_terms) VALUES (:name, :agrees)';

$name = $_POST['name'];
$agrees = isset($_POST['agree']) ? 1 : 0;
$sector = $_POST['sectors'];

$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':agrees', $agrees);
$stmt->execute();

$userId = $db->lastInsertId();
$_SESSION['currentId'] = $userId;

$userSectorStmt = $db->prepare('INSERT INTO user_sectors (user_id, sector_id) VALUES (:userId, :sectorId)');
foreach ($sector as $sectorId) {
    $userSectorStmt->bindParam(':userId', $userId);
    $userSectorStmt->bindParam(':sectorId', $sectorId);
    $userSectorStmt->execute();
}

$db = null;

header('Location: ../index.php');
exit();
?>