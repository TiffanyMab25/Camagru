<?php
require './../newconnection.php';
function delete_db($database, $handle){
    $sql = "DROP DATABASE IF EXISTS " . $database;
    $handle->exec($sql);
    echo "database deleted...<br>";
}
function create_db($database, $handle){
    $sql = "CREATE DATABASE " . $database;
    $handle->exec($sql);
    echo "database created";
}
delete_db(DB_NAME, $handle);
create_db(DB_NAME, $handle);
    
?> 