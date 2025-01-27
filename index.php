<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/index.css">
    <title>Domein Zoeker</title>
</head>

<body>
    <?php
    include("header.php");
    ?>
<div class="search-content">
        <div class="search-header">
            <h1>Domein Zoeker</h1>
        </div>
        <div class="search-body">
            <div class="search-bar-container">
                <form action="resultPage.php" method="POST">
                    <label for="domain-name">Domein naam:</label>
                    <input type="text" name="domain-name" id="domain-name" class="search-bar" placeholder="Enter domain name">                    
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
</body>
</html>