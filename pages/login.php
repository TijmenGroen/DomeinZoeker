<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/loginRegister.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Domein Zoeker</title>
</head>

<body>
    <?php
    include("../components/header.php");
    ?>
    <div class="login-register-box">
        <h2>Login</h2>
        <form action="../includes/login.inc.php" method="post" class="login-register-form">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" />
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" />
            <button type="submit">Log in</button>
        </form>
        <a href="../pages/register.php">Nog geen account?</a>
    </div>
</body>

</html>