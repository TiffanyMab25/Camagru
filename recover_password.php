<?php
require_once "checker.php";
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
         <form action="recover_password.php" method="post">
         <?php
         echo "<ul>"; // unordered list
         foreach($error as $errors){
            echo "<li>"; //list item
            echo $errors;
            echo "</li>";
         }
         echo "</ul>";
         ?>
         <!-- pattern = "[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" -->
         <input type="password" name="passwd" maxlength="15" value="" placeholder="Password"><br>
         <input type="password" name="confirmpasswd" maxlength="15" value="" placeholder="Confirm Password"><br>
         <input type="submit" name="resetPassword-btn" value="Signup"><br>
            <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
         <p>Have an account? <a href="login.php">Login</a></p>
         </form>
      </div>
   </body>
</html>