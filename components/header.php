<?php 
session_start();

if(isset($_SESSION["userId"])) {
    $registerName = $_SESSION["username"];
    $url = "account";
} else {
    $registerName = "Registreer";
    $url = "register";
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
            <a href="../pages/<?php echo $url ?>.php" class="navbar-link"><?php echo $registerName ?></a>
        </div>
    </div>
</body>
</html>