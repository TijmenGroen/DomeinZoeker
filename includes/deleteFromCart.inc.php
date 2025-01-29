<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $itemId = $_POST["cartItemId"];

    try {
        require_once ("dbh.inc.php");

        $query = "DELETE FROM cartitem
        WHERE itemId = :itemId
        AND userId = :userId";
    
        $statement = $pdo->prepare($query);

        $statement->bindParam(":itemId", $itemId);
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
