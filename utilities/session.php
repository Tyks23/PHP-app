<?php
session_start();

if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['sectors'] = $_POST['sectors'];
    $_SESSION['agree'] = isset($_POST['agree']) ? true : false;

    header('Location: ../user/save_user.php');
    exit();
}
?>