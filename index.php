<?php
    require_once 'checker.php';
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        verifyUser($token);
    }
    
  //  session_start();
  //  if (isset($_SESSION['id'])){

  //  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="header">
<div id="logo">
<h3>Camagru</h3>
</div>
<div id="nav">
 <?php if(!isset($_SESSION['id'])): ?>
    <a href="signup.php">Signup</a><br>
    <a href="login.php">Login</a><br>
  <?php endif; ?> 
  <?php if(isset($_SESSION['id'])): ?>
  <a href="images_form.php">My Profile</a><br>
  <a href="index.php?log=1">logout</a><br>
  <?php endif; ?>

  </div>
  </div>
  <div id= "container">
  <div>
</body>
</html>