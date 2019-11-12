<?php
require './../newconnection.php';

$new_users = "new_users";

function delete_db($database, $connect){
    $sql = "DROP DATABASE IF EXISTS " . $database;
    $connect->exec($sql);
    echo "database deleted...<br>";
}
function create_db($database, $connect){
    $sql = "CREATE DATABASE " . $database;
    $connect->exec($sql);
    echo "database created<br>";
}

function create_table($table_name, $connect)
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
    $connect->exec($sql);
    echo "Table $table_name created successfully<br>";
  } catch (PDOException $e) {
    echo "Table creation failed ".$e->getMessage();
  }
}
function delete_table($table_name, $connect)
{
  try {
    $sql = "DROP TABLE $table_name";
    $connect->exec($sql);
    echo "Table $table_name deleted successfully<br>";
  } catch (PDOException $e) {
    echo "Table drop failed ".$e->getMessage();
  }
}

delete_db(DB_NAME, $connect);
create_db(DB_NAME, $connect);
require '../connection.php';
create_table($new_users, $connect);
   
?> 