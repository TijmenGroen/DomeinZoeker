<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domainName = $_POST['domain-name'];

    if (empty($domainName)) {
        echo "Veld mag niet leeg zijn";
        exit;
    }

    $client = new Client([
        'base_uri' => 'https://dev.api.mintycloud.nl/api/v2.1/',
    ]);

    try {
        $tlds = ["nl", "com", "net", "org", "edu", "blog", "dev", "io", "info", "it"];
        $domainArray = [];
        for ($i = 0; $i < count($tlds); $i++) { 
            array_push($domainArray, [
                'name' => $domainName,
                'extension' => $tlds[$i]
            ]);
        };

        $response = $client->post('domains/search?with_price=true', [
            'headers' => [
                'Authorization' => 'Basic 072dee999ac1a7931c205814c97cb1f4d1261559c0f6cd15f2a7b27701954b8d',
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ],
            'json' => $domainArray
        ]);

        $responseArray = json_decode($response->getBody(), true);

    } catch (RequestException $e) {
        if ($e->hasResponse()) {
            echo "Error: " . $e->getResponse()->getBody();
        } else {
            echo "Request failed: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/resultPage.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Domein Zoeker</title>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="result-content">
       <?php
       foreach ($responseArray as $domain) {
        echo "<div class='result-item'>";
        echo "<p>Domein: " . $domain["domain"] . "</p>";
        echo "<p>Status: " . $domain["status"] . "</p>";
        echo "<p>Prijs: &#8364;" . $domain["price"]["product"]["price"] . "</p>";
        echo "</div>";
       }
        ?>
    </div>
</body>
</html>