<?php
session_start();
$subtotal = 0;
$tax = 0;
$total = 0;

$orderedItems = [];

try {
    require_once("../includes/dbh.inc.php");

    $query = "SELECT oi.*
              FROM orderedItems oi
              JOIN `order` o ON oi.orderId = o.orderId
              WHERE o.userId = :userId
              ORDER BY oi.orderId ASC";

    $statement = $pdo->prepare($query);

    $userId = $_SESSION["userId"];
    $statement->bindParam(":userId", $userId, PDO::PARAM_INT);

    $statement->execute();

    $orderedItems = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement = null;
    $pdo = null;
} catch (PDOException $e) {
    echo $e;
}

$groupedOrders = [];
foreach ($orderedItems as $item) {
    $groupedOrders[$item["orderId"]][] = $item;
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
    <?php include("../components/header.php"); ?>
    <h2>Account</h2>
    <div class="cart-box">
        <?php
        if (empty($groupedOrders)) {
            echo "<p>Nog geen bestellingen</p>";
        } else {
            foreach ($groupedOrders as $orderId => $items) {
                echo "<div class='cart-item'>";
                echo "<h3>Order #$orderId</h3>";

                foreach ($items as $item) {
                    echo "<p>Domein: " . $item["domainName"]. "</p>";
                    echo "<p>Prijs: &#8364;" . $item["price"] . "</p>";
                    echo "<hr>";
                }

                echo "</div>";
            }
        }
        ?>
        <form action="../includes/logout.inc.php" method="post">
            <button type="submit">Log uit</button>
        </form>
    </div>
</body>

</html>