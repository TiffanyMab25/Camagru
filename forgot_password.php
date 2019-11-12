<?php
require_once 'checker.php';
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
