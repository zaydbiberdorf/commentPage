<?php
  // Initialize database variables
  $host = 'localhost';
  $user = 'zayd';
  $password = 'Biberdorf123';
  $dbname = 'commentPage';
 
  // Set DSN (Data Source Name) with database variables
  $dsn = 'mysql:host='. $host .';dbname='. $dbname;
 
  // Store some database options for various attributes
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
  ];
 
  // Create a PDO instance with dsn, username and password 
  // Use options to set various database attributes
  $pdo = new PDO($dsn, $user, $password, $options);

?>
