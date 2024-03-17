<?php
function connectToDatabase() {
    $host_name = 'db5015551528.hosting-data.io';
    $database = 'dbs12702503';
    $user_name = 'dbu2052415';
    $password = '7@wfcjV5bq#PDF';

    try {
        $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        return $dbh;
    } catch (PDOException $e) {
        echo "Fehler!:" . $e->getMessage() . "<br/>";
        die();
    }
}

function closeDatabaseConnection(&$dbh) {
    $dbh = null;
}
?>
