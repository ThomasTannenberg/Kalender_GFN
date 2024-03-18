<?php
include 'db.php';


$dbh = connectToDatabase();


$stmt = $dbh->prepare("SELECT * FROM Benutzer");


$stmt->execute();


$row = $stmt->fetch();
echo $row['Benutzername'] . " " . $row['Passwort'] . " " . $row['Email'] . "<br/>";


closeDatabaseConnection($dbh);
?>
