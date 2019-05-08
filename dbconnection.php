<?php

$dsn = "mysql:dbname=eenmaalandermaal;host=localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>