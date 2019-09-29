<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
