<?php
session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            require_once("../includes/dbh.inc.php");
    
            $query = "SELECT *
            FROM cartItem
            WHERE userId = :userId";
    
            $statement = $pdo->prepare($query);
    
            $userId = $_SESSION["userId"];
            $statement->bindParam(":userId", $userId);
    
            $statement->execute();

            $cartItems = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    
            $statement = null;
            $pdo = null;
    
        } catch (PDOException $e) {
            echo"Query error";
        }
    } else {
        header("Location: ../index.php");
    }
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
    <h2>Winkelwagen</h2>
    <div class="cart-box">
        <?php 
            if(!isset($_SESSION["userId"])) {
                echo "Log in om je wagentje te zien";
            }
            else {
                foreach($cartItems as $item) {
                    echo "<div class='cart-item'>";
                    echo "<p>Domein: " . $item["domainName"] . "</p>";
                    echo "<p>Prijs: &#8364;" . $item["price"] . "</p>";
                    echo "</div>";
                }
            }
        ?>
    </div>
</body>

</html>