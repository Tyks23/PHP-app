<?php

require_once '../db/db_connection.php';

if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['sectors'] = $_POST['sectors'];
    $_SESSION['agree'] = isset($_POST['agree']) ? true : false;
}

$sector = $_POST['sectors'];
$agree = isset($_POST['agree']) ? 1 : 0;

$db->beginTransaction();

try {
    $sql = "UPDATE users SET user_name = :name, agrees_to_terms = :agrees WHERE user_id = :userId";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':agrees', $agree, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $_SESSION['currentId'], PDO::PARAM_INT);
    $stmt->execute();

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $userSectorDeleteStmt = $db->prepare('DELETE FROM user_sectors WHERE user_id = :userId');
    $userSectorDeleteStmt->bindParam(':userId', $_SESSION['currentId']);
    $userSectorDeleteStmt->execute();

    $userSectorInsertStmt = $db->prepare('INSERT INTO user_sectors (user_id, sector_id) VALUES (:userId, :sectorId)');
    foreach ($sector as $sectorId) {
        $userSectorInsertStmt->bindParam(':userId', $_SESSION['currentId']);
        $userSectorInsertStmt->bindParam(':sectorId', $sectorId);
        $userSectorInsertStmt->execute();
    }
    $db->commit();

} catch (PDOException $e) {
    $db->rollBack();
    throw $e;
}

header('Location: ../index.php');
exit();
?>