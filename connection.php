<?php
    require "config/database.php";
    $DB_INFO = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    try{
        $handle = new PDO($DB_INFO,DB_USER,DB_PASS);
        $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // it alows you to use exeption
        echo "connected";
    }catch(PDOExeption $e) { // PD0Expetion is to handle the error in the connection of the database 
        die("unable to connect to the database"); //error message
    }
?>