<?php
session_start();
include 'database_insert.php';
require_once 'connection.php';
$error = array();
$username = "";
$userEmail = "";
$email = "";

function sendPasswordResetLink($userMail, $token)
{
  mail($userMail, "Reset your Password", "Reset Password: http://localhost:8080/Camagru/index.php?password-token=$token");
}

  /*if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userEmail = $_POST['user-email'];
    $password = $_POST['passwd'];
    $confPass = $_POST['confPasswd'];

    if (empty($username)) {
      $error['UserNameError'] = "Please enter a username";
    }else {
      $username = test_user_input($username);
    }
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
      $error['EmailError'] = "Email address is invalid";
    }
    if (empty($userEmail)) {
      $error['EmailError'] = "Please enter an email address";
    }else {
      $userEmail = test_user_input($userEmail);
    }
    if (empty($password)) {
      $error['PasswordError'] = "Please enter a password";
    }else {
      $password = test_user_input($password);
    }
    if ($confPass !== $password) {
      $error['ConfPasswordError'] = "Password does no match";
    }
   
    insert2table($connect, $username, $userEmail, $password);
  }*/


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
       header('location:login.php');
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
    header('location: password_message.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
  </head>
  <body>
  <div class = "error message">
  <?php 
  if (count ($error)>0){
    echo "<ul>";
    foreach ($error as $errors){
      echo "<li>" . $errors . "</li><br>";
    }
    echo "</ul>";
  }
  ?>
    <div class="form-container">
      <form class="sign" action="forgot_password.php" method="POST">
        <h3>Reset Password</h3>
        <input type="email" name="recover-email" value="" placeholder="email"><br>
        <input type="submit" name="recover-btn" value="Recover my Password"><br>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </form>
    </div>
  </body>
</html>
