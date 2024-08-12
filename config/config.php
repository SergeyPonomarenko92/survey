<?php

use Dotenv\Dotenv;

if (version_compare(phpversion(), '8.2.0', '<')) {
    exit('Check PHP version, please. PHP 8.2+ Required');
}

$dotenv = Dotenv::createImmutable(__DIR__ . '../../');
$dotenv->load();
session_start();
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');


$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$port = $_ENV['DB_PORT'];


try {
    global $db;
    $db = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("conection failed " . $e->getMessage());
}

