<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    try {
        require_once("dbh.inc.php");

        $query = "SELECT *
        FROM user
        WHERE name = :name
        AND password = :password";

        $statement = $pdo->prepare($query);

        $statement->bindParam(":name", $name);
        $statement->bindParam(":password", $password);

        $statement->execute();

        if ($statement->rowCount() == 1) {
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION["userId"] = $user["userId"];
            $_SESSION["username"] = $user["name"];
            
            header("Location: ../index.php");

        } else {
            echo "Invalid username or password.";
        }

        $statement = null;
        $pdo = null;

    } catch (PDOException $e) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
