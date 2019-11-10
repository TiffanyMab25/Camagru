<?php

session_start();
require_once 'connection.php';
$email1 = "";
$password1 = "";
if(isset($_POST["login-btn"])) {
    $email1 = $_POST['username-email'];
    $password1 = $_POST['passwd'];

    $stmt = $handle->prepare('SELECT * FROM new_users WHERE email=:email');
    $stmt->bindParam(':email', $email1);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0){
    if(password_verify($password1, $row['password'])){
        session_regenerate_id();
        // $_SESSION["authorized"] = true;
        $_SESSION["username-email"] = $row['email'];
        $_SESSION["name"] = $row['name'];
        session_write_close();
        header('location:index.php');
        
    }

    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr"
<head>
<meta charset="utf-8">
<title>Camagru</title>
</head>
<body>
<div class="">
<h3>Camagru<h3>
<form action="login.php" method="post">
 <input type="text" name="username-email" value="" placeholder="username or email"><br>
 <input type="text" name="passwd" value="" placeholder="password"><br>
<input type="submit" name="login-btn" value="Login"><br>
<a href="forgot.php">Forgot Password?</a>
 <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</form>
</div>
</body>
</html>