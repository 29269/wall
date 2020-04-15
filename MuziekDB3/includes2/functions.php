<?php 
session_start();

function dbConnect()
{
 
   // Database inloggegevens
   $hostname = '127.0.0.1';
   $username = 'c4998thewall';
   $password = 'wallpassword';
   $database = 'c4998thewall';
 
    try {
        // Verbinding maken met gebruik van de database instellingen die in de variabelen zijn opgeslagen
        $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        return $connection;
 
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
 
    return false;
 
}
$connection = dbConnect();

// Deze verbinding kun je weer gebruiken voor queries
try {
    $statement = $connection->query('SELECT * FROM `post`');
}catch (PDOException $e){
    echo $e->getMessage();
    exit();
}




?>
