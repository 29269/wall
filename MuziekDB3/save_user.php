<?php
 require 'includes2/functions.php';

$gebruikersnaam = $_POST['gebruikersnaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$herww = $_POST['herwachtwoord'];

if ($wachtwoord != $herww) {
   echo("Error... Passwords do not match<br> <a href='register.php'>Ga terug</a>");
   exit;
   }


$safe_password = password_hash("$wachtwoord", PASSWORD_DEFAULT);


$stmt = $connection->prepare("INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord) VALUES (:gebruikersnaam, :email, :wachtwoord)");
$stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':wachtwoord', $safe_password);


// Voer het SQL statement uit
$stmt->execute();

header('location: login.php');

   
   
  ?>