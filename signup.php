<?php

// ini_set('display_error', 1);
// ini_set('display_startup_error', 1);
// error_reporting(E_ALL);



$error = array();

function user_input($data){
   return($data);
}

if(isset($_POST["login_btn"])){
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
   if(count($error) === 0){ // checks if they are any items in an array and returns an int value
      require 'database_insert.php';
      header("location: index.php");
   }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Signup</title>
   </head>
   <body>
      <div class="">
         <h3>Signup<h3>
         <form action="signup.php" method="post">
         <?php
         echo "<ul>"; // unordered list
         foreach($error as $errors){
            echo "<li>"; //list item
            echo $errors;
            echo "</li>";
         }
         echo "</ul>";
         ?>
         <input type="email" name="email" value="" placeholder="Email"><br>
         <input type="text" name="username" value="" placeholder="Username"><br>
         <input type="password" name="passwd" value="" placeholder="Password"><br>
         <input type="password" name="confirmpasswd" value="" placeholder="Confirm Password"><br>
         <input type="submit" name="login_btn" value="Signup"><br>
            <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
         <p>Have an account? <a href="login.php">Login</a></p>
         </form>
      </div>
   </body>
</html>