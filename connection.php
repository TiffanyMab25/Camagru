<?php
    require_once "config/database.php"; //require once call the script once
    $DB_INFO = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    try{
        $handle = new PDO($DB_INFO,DB_USER,DB_PASS);
        $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // it alows you to use exeption
    }catch(PDOExeption $e) { // PD0Expetion is to handle the error in the connection of the database 
        echo "Connection failed: " . $e->getMessage(); //error message
    }
?>