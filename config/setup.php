<?php
require './../newconnection.php';

$new_users = "new_users";

function delete_db($database, $handle){
    $sql = "DROP DATABASE IF EXISTS " . $database;
    $handle->exec($sql);
    echo "database deleted...<br>";
}
function create_db($database, $handle){
    $sql = "CREATE DATABASE " . $database;
    $handle->exec($sql);
    echo "database created<br>";
}

function create_table($table_name, $handle)
{
  try {
    $sql = "CREATE TABLE $table_name (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(255) NOT NULL UNIQUE,
      email VARCHAR(255) NOT NULL UNIQUE,
      password VARCHAR(255),
      verified TINYINT(4) NOT NULL,
      token VARCHAR(100) NOT NULL
    )";
    $handle->exec($sql);
    echo "Table $table_name created successfully<br>";
  } catch (PDOException $e) {
    echo "Table creation failed ".$e->getMessage();
  }
}
function delete_table($table_name, $handle)
{
  try {
    $sql = "DROP TABLE $table_name";
    $handle->exec($sql);
    echo "Table $table_name deleted successfully<br>";
  } catch (PDOException $e) {
    echo "Table drop failed ".$e->getMessage();
  }
}

delete_db(DB_NAME, $handle);
create_db(DB_NAME, $handle);
require '../connection.php';
create_table($new_users, $handle);
   
?> 