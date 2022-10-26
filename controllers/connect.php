<?php
$dsn = "mysql:host=localhost;dbname=todoproject";
$userLog = "root";
$pass = "";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
try {
    $dbh = new PDO($dsn, $userLog, $pass, $options);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
