<?php
require './../newconnection.php';
function create_db($database){
    $sql = "CREATE DATABASE " . $database;
    $handle->exec($sql);
    echo "database created";
}
try{
    create_db(DB_NAME);
    require './../connection.php';
    $sql1 = "CREATE TABLE `users` (
        `ID` int(11) NOT NULL,
        `Email` varchar(255) NOT NULL,
        `Username` varchar(255) NOT NULL,
        `Password` varchar(255) NOT NULL,
        `Token` varchar(255) NOT NULL,
        `Verified` tinyint(4) NOT NULL
      )";
      $handle->exec($sql1);
    
}catch(PDOExeption $e){
    echo "you fail";
}


?> 