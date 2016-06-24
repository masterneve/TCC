<?php
  
 
  $username = 'root';
    $password = "";
    $database = "loja";
    $dbport = 3306;

    // Create connection
    $db = new mysqli('127.0.0.1', $username, $password, $database, $dbport);
            if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
     } 
  /*https://web-masterneve.c9users.io/phpmyadmin*/
?>


