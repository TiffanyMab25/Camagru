<?php
    require "config/database.php";
    $server = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $token = bin2hex(random_bytes(50));
    $verify = 0; // by default if someone hasnt verfied ther email they cant use ther account
    $hiddenpassword = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

try{
    
    $connect = new PDO($server, DB_USER, DB_PASS);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // it alows you to use exeption 
    $stmt = $connect->prepare("INSERT INTO new_users (Email, Username, Password, Token, Verified) VALUES (:Email, :Username, :Password, :Token, :Verified)");// We put the semicolon so we dont manually insert data

   $stmt->bindParam(':Email', $_POST["email"]);
   $stmt->bindParam(':Username', $_POST["username"]);
   $stmt->bindParam(':Password', $hiddenpassword);
   $stmt->bindParam(':Token', $token);
   $stmt->bindParam(':Verified', $verify);
   $stmt->execute();
   echo "New user created successfully";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();

}
?>