<?php
$host_name = 'db5015551528.hosting-data.io';
$database = 'dbs12702503';
$user_name = 'dbu2052415';
$password = '7@wfcjV5bq#PDF';
$dbh = null;

try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
    echo "Fehler!:" . $e->getMessage() . "<br/>";
    die();
}
