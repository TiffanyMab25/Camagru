<?php
require_once 'checker.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<div class="error_message">
<?php
    if(count($error)>0){
        echo "<ul>";
        foreach ($error as $errors){
            echo "<li>" . $errors . "</li><br>";
        }
        echo "</ul>";
}
?>
</div>
<div class = "form-container">
<h3>Login<h3>
<form action="login.php" method="post">
 <input type="text" name="email" value="" placeholder="email"><br>
 <input type="password" name="passwd" maxlength="15" value="" placeholder="password"><br>
<input type="submit" name="login-btn" value="Login"><br>
<a href="forgot_password.php">Forgot Password?</a>
 <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</form>
</div>
</body>
</html>