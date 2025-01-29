<?php
session_start();
$subtotal = 0;
$tax = 0;
$total = 0;
try {
    require_once("../includes/dbh.inc.php");

    $query = "SELECT *
            FROM cartItem
            WHERE userId = :userId";

    $statement = $pdo->prepare($query);

    if(isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];
    }
    $statement->bindParam(":userId", $userId);

    $statement->execute();

    $cartItems = $statement->fetchAll(PDO::FETCH_ASSOC);


    $statement = null;
    $pdo = null;
} catch (PDOException $e) {
    echo $e;
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
        $disabled = "";
        if (!isset($_SESSION["userId"])) {
            echo "Log in om je wagentje te zien";
            $disabled = "disabled";
        } else if (count($cartItems) < 1) {
            echo "<p>Geen producten in wagentje</p>";
            $disabled = "disabled";
        }
        else {
            foreach ($cartItems as $item) {
                echo "<div class='cart-item'>";
                echo "<p>Domein: " . $item["domainName"] . "</p>";
                echo "<p>Prijs: &#8364;" . $item["price"] . "</p>";
                echo "<form action='../includes/deleteFromCart.inc.php' method='post'>";
                echo "<input type='hidden' name='cartItemId' id='cartItemId' value='" . $item["itemId"] . "'>";
                echo "<button type='submit'>Verwijder</button>";
                echo "</form>";
                echo "</div>";
                $subtotal = $subtotal + $item["price"];
            }
        }
        ?>
        <hr>
        <div class="cart-item">
            <p>Prijs: &#8364;<?php echo $subtotal ?></p>
            <p>Btw(21%): &#8364;<?php
                                $tax = $subtotal * 0.21;
                                echo round($tax, 2);
                                ?></p>
            <p>Totaal: &#8364;<?php
                                $total = $subtotal + $tax;
                                echo round($total, 2);
                                ?> </p>
            <form action="../includes/orderItems.inc.php" method="post" class="order-form">
                <input type="hidden" name="items" value='<?php echo json_encode($cartItems); ?>'>
                <button type="submit" <?php echo $disabled ?>>Bestel</button>
            </form>
        </div>
    </div>
</body>

</html>