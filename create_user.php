<?php
include 'db.php';
$dbh = connectToDatabase();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {

        $stmt = $dbh->prepare("INSERT INTO benutzer (username, passwort, email) VALUES (:username, :passwort, :email)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':passwort', $passwordHash);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();

// Weiterleiten
        echo "Benutzerkonto erfolgreich erstellt.";
    } catch (PDOException $e) {
        echo "Fehler bei der Kontoerstellung: " . $e->getMessage();
    }

    closeDatabaseConnection($dbh);

}
