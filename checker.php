<?php
session_start();
include 'database_insert.php';
require_once 'connection.php';

$error = array();
$username = "";
$useremail = "";

function user_input($data){
   return($data);
}

function sendPasswordResetLink($userMail, $token)
{
  mail($userMail, "Reset your Password", "Reset Password: http://localhost:8080/Camagru/recover_password.php?password-token=$token");
}
//signup.php
if(isset($_POST["signup_btn"])){
   $email = $_POST["email"];
   $username = $_POST["username"];
   $password = $_POST["passwd"];
   $Confirm_password = $_POST["confirmpasswd"];

     require 'email_validation.php';   
   if(empty($email)){
      $error["emailerror"] = "please enter  email adress";
   }else{
      $email = user_input($email);
   }
   if(empty($username)){
      $error["usernameerror"] = "please enter username";
   }else{
      $username = user_input($username);
   }
   if(empty($password)){
      $error["pwderror"] = "please enter password";
   }else{
      $password = user_input($password);
   }
   if($password !== $Confirm_password){
      $error["nomatch"] = "the passwords don't match";
   }
   if(count($error) == 0){ // checks if they are any items in an array and returns an int value
        //require 'database_insert.php';
        inserttotable($connect, $_POST['username'], $_POST['email'], $_POST['passwd']);
        header("location: index.php");
   }

}

//login.php

$email1 = "";
$password1 = "";
if(isset($_POST["login-btn"])) {
    $email1 = $_POST['email'];
    $password1 = $_POST['passwd'];
    if (empty($email1)) {
        $error['UserNameError'] = "Please enter an email ";
      }
      if (empty($password1)) {
        $error['PasswordError'] = "Please enter a password";
      }
      if (count($error) === 0) {
        $stmt = $connect->prepare('SELECT * FROM new_users WHERE email=:email');
        $stmt->bindParam(':email', $email1);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
       // echo "wowowowoww";
       // if($stmt->rowCount() > 0){
            if(password_verify($password1, $row['password'])){
                // session_regenerate_id();
                $_SESSION["id"] = $row['id'];
                // $_SESSION["authorized"] = true;
                $_SESSION["email"] = $row['email'];
                $_SESSION["password"] = $row['passwd'];
                // session_write_close();
                // echo "wowowowoww";
                header('location:index.php');
                exit();
            }else{
                $error['login_fail'] = "Wrong infomation";
            }
       // }
    }
}

//logout 
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: login.php');
    exit();
  }

  //

  //forgot_password.php
  $email = "";
  if(isset($_POST['recover-btn'])){
    $email = $_POST['recover-email'];
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error['EmailError'] =  "Email address is invalid";
 }
 if(empty($email)){
    $error['EmailError'] = "Please enter emaila address";
 }
 
 if(count($error) == 0){
    $sql = "SELECT * FROM new_users WHERE email = '$email' LIMIT 1";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $token = $user['token'];
    sendPasswordResetLink($email, $token);
    header('location: password_message.php');
    exit();
    }
 }
 
 if(isset($_POST['resetPassword-btn'])){
    $password = $_POST['passwd'];
    $passwordConf = $_POST['con-passwd'];
 
 if(empty($password) || empty($passwordConf)){
    $error['PasswordError'] = "Please enter a password";
 }
 if($passwordConf != $password){
    $error['ConfPasswordError'] = "Password does not match";
 }
 
 $password = password_hash($password, PASSWORD_DEFAULT);
 $email = $_SESSION['email'];
 
 if(count($error) == 0){
    $update_query = "UPDATE new_user SET password='$password' WHERE email='$email'";
    $result = $connect->prepare($update_query);
    $result->execute();
    if($result){
        header('location:password_message.php');
        exit();
        }
    }
 }

 function resetPassword($token)
{
    global $connect;
    $sql = "SELECT * FROM new_users WHERE token='$token' LIMIT 1";
    $result = $connect->prepare($sql);
    $result->execute();
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['email'] = $user['email'];
    header('location: recover_password.php');
    exit();
}

//verify token

function verifyUser($token)
{
   global $connect;
   $sql = "SELECT * FROM new_users WHERE to token='$token' LIMIT 1";
   $row = $connect->prepare($sql);
   $row = execute();
   $row_count = $row->fetchColumn();
   if($row_count > 0){
      $user = $row->fetch(PDO::FETCH_ASSOC);
      $update_query = "UPDATE new_users SET verified=1 WHERE token='$token'";
      if($connect->exec($update_query)){
         $_SESSION['id'] = $user['id'];
         $_SESSION['username'] = $user['username'];
         $_SESSION['email'] = $user['email'];
         $_SESSION['verified'] = 1;
         $_SESSION['message'] = "Your email adress was verified successfully";
         unset($_SESSION['message']);
         header('LOcation:index.php');
         exit();
      }
   }else{
         echo "The user was not found";
      }

   }
?>