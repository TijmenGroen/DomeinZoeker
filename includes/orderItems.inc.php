<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $items = json_decode($_POST["items"], true);

    try {
        require_once ("dbh.inc.php");

        $query = "INSERT INTO `order` (userId) VALUES
        (:userId);";
    
        $statement = $pdo->prepare($query);

        $statement->bindParam(":userId", $_SESSION["userId"]);

        $statement->execute();

        $orderId = $pdo->lastInsertId();

        $statement = null;

        foreach($items as $item) {
            echo $item["domain"];

        $query = "INSERT INTO ordereditems (domainName, price, orderId) VALUES
        (:domainName, :price, :orderId);";
    
        $statement = $pdo->prepare($query);

        $statement->bindParam(":domainName", $item["domainName"]);
        $statement->bindParam(":price", $item["price"]);
        $statement->bindParam(":orderId", $orderId);

        $statement->execute();

        $statement = null;
    }

    $pdo = null;

        header("Location: ../pages/account.php");

        die();

    } catch(PDOException $e) {
        echo $e;
    }
    
} else {
    header("Location: ../index.php");
}
