<?php
include 'db.php';
$dbh = connectToDatabase();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Benutzername = $_POST['Benutzername'];

    $passwordHash = password_hash($_POST['Passwort'], PASSWORD_DEFAULT);
}

    try {

        $stmt = $dbh->prepare("INSERT INTO Benutzer (Benutzername, Passwort, Email) VALUES (:Benutzername, :Passwort, :Email)");
        $stmt->bindParam(':Benutzername', $Benutzername);
        $stmt->bindParam(':Passwort', $passwordHash);
        $stmt->bindParam(':Email', $_POST['Email']);
        $stmt->execute();

// Weiterleiten
        echo "Benutzerkonto erfolgreich erstellt.";
    } catch (PDOException $e) {
        echo "Fehler bei der Kontoerstellung: " . $e->getMessage();
    }

    closeDatabaseConnection($dbh);


