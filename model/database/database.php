<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "chatapp";
$dsn = "mysql:host=$servername;dbname=$dbname";
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = "Database Error " . $e->getMessage();
    include("../../error.php");
    exit();
}
