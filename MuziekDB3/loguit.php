<?php
// De sessie starten
session_start();
//En de sessie meteen verwijderen
session_destroy();

// En doorsturen naar login formulier
header( 'Location: index.php' );