<?php 
session_start();
if(isset($_SESSION["userId"])) {
    $registerName = $_SESSION["username"];
} else {
    $registerName = "Registreer";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/index.css">
    <title>Domein Zoeker</title>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <a href="../index.php" class="navbar-link">Domein Zoeker</a>
            <a href="../pages/register.php" class="navbar-link"><?php echo $registerName ?></a>
        </div>
    </div>
</body>
</html>