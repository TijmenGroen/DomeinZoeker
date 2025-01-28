<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/accountCart.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Domein Zoeker</title>
</head>

<body>
    <?php
    include("../components/header.php");
    ?>
    <h2>Account</h2>
    <div class="account-box">
        <form action="../includes/logout.inc.php" method="post">
            <button type="submit">Log uit</button>
        </form>
    </div>
</body>
</html>