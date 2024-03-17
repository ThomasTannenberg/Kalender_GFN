<?php
session_start();
include 'connect.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {

        $stmt = $dbh->prepare("SELECT * FROM benutzer WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['passwort'])) {

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                // Weiterleiten
                header('Location:dashboard.php');
                exit;
            } else {
                echo "<p>Falscher Benutzername oder Passwort!</p>";
            }
        } else {
            echo "<p>Falscher Benutzername oder Passwort!</p>";
        }
    } catch (PDOException $e) {
        echo "Fehler bei der Anmeldung: " . $e->getMessage();
    }
}


