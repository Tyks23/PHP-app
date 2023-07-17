<?php

session_start();

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$sessionSectors = isset($_SESSION['sectors']) ? $_SESSION['sectors'] : [];
$agree = isset($_SESSION['agree']) && $_SESSION['agree'] ? 'checked' : '';


require_once 'functions/select_functions.php';

$selectOptions = generateSelectOptions(buildHierarchy($sectors), $sessionSectors);

$selectHTML = '<select multiple size="20" name="sectors[]" required>' . PHP_EOL;
$selectHTML .= $selectOptions;
$selectHTML .= '</select>';
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h2>Please enter your name and pick the sectors you are currently involved in.</h2>
        <form action="utilities/validation.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $name ?>" required>
            </div>
            <div class="form-group sectors">
                <label for="sectors">Sectors:</label>
                <?= $selectHTML; ?>
            </div>
            <div class="form-group">
                <input type="checkbox" id="agree" name="agree" required <?= $agree ?>>
                <label for="agree">Agree to terms</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Save">
            </div>
        </form>
    </div>
</body>

</html>