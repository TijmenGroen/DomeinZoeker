<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $password = $_POST["password"];

    try {
        require_once ("dbh.inc.php");

        $query = "INSERT INTO user (name, password) VALUES
        (:name, :password);";
    
        $statement = $pdo->prepare($query);

        $statement->bindParam(":name", $name);
        $statement->bindParam(":password", $password);

        $statement->execute();

        $_SESSION["userId"] = $pdo->lastInsertId();
        $_SESSION["username"] = $name;

        $statement = null;
        $pdo = null;

        header("Location: ../index.php");

        die();

    } catch(PDOException $e) {
        header("Location: ../index.php");
    }
    
} else {
    header("Location: ../index.php");
}
