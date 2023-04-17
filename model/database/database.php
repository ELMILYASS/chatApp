<?php
$servername = "localhost";
$username = "root";
$password = "ilyass2002@-@-";
$dbname = "chatapp";
$dsn = "mysql:host=$servername;dbname=$dbname";
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = "Database Error " . $e->getMessage();
    include("../view/error.php");
    exit();
}
