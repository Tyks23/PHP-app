<?php

session_start();

//TODO return these messages to anyone who got past the html restrictions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $sectors = $_POST["sectors"];
    $agree = isset($_POST["agree"]);

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($sectors)) {
        $errors[] = "Select at least one sector.";
    }

    if (!$agree) {
        $errors[] = "You must agree to the terms.";
    }

    if (empty($errors)) {
        if (!empty($_SESSION['currentId'])) {
            include('../user/update_user.php');
            exit();
        }
        include('../user/save_user.php');
        exit();
    } else {
        header('Location: ../index.php');
        exit();
    }
}

?>