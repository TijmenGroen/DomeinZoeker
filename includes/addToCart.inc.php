<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $domainName = $_POST["domainName"];
    $price = $_POST["price"];

    try {
        require_once ("dbh.inc.php");

        $query = "INSERT INTO cartitem (domainName, price, userId) VALUES
        (:domainName, :price, :userId);";
    
        $statement = $pdo->prepare($query);

        $statement->bindParam(":domainName", $domainName);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":userId", $_SESSION["userId"]);

        $statement->execute();

        $statement = null;
        $pdo = null;

        header("Location: ../pages/cart.php");

        die();

    } catch(PDOException $e) {
        header("Location: ../index.php");
    }
    
} else {
    header("Location: ../index.php");
}
