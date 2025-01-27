<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domainName = $_POST['domain-name'];
    $domainExtension = $_POST['domain-extension'];

    if (empty($domainName) || empty($domainExtension)) {
        echo "Both fields are required.";
        exit;
    }

    $client = new Client([
        'base_uri' => 'https://dev.api.mintycloud.nl/api/v2.1/',
    ]);

    try {
        $response = $client->post('domains/search?with_price=true', [
            'headers' => [
                'Authorization' => 'Basic 072dee999ac1a7931c205814c97cb1f4d1261559c0f6cd15f2a7b27701954b8d',
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ],
            'json' => [
                [
                    'name' => $domainName,
                    'extension' => $domainExtension,
                ]
            ]
        ]);

        echo "<h1>API Response:</h1>";
        echo "<p>" . $response->getBody() . "</p>";

    } catch (RequestException $e) {
        if ($e->hasResponse()) {
            echo "Error: " . $e->getResponse()->getBody();
        } else {
            echo "Request failed: " . $e->getMessage();
        }
    }
}
