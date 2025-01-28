<?php

require_once realpath(__DIR__ . "/../vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$dbhost = $_ENV["DB_HOST"];
$dbname = $_ENV["DB_NAME"];

$dsn = "mysql:host=$dbhost;dbname=$dbname";
$dbusername = $_ENV["DB_USERNAME"];
$dbpassword = $_ENV["DB_PASSWORD"];

$pdo = new PDO($dsn, $dbusername, $dbpassword);