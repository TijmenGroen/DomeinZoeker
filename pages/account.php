<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Domein Zoeker</title>
</head>

<body>
    <?php
    include("../components/header.php");
    ?>
    <div class="result-content">
       <?php
       foreach ($responseArray as $domain) {
        echo "<div class='result-item'>";
        echo "<p>Domein: " . $domain["domain"] . "</p>";
        echo "<p>Status: " . $domain["status"] . "</p>";
        echo "<p>Prijs: &#8364;" . $domain["price"]["product"]["price"] . "</p>";
        echo "</div>";
       }
        ?>
    </div>
</body>
</html>