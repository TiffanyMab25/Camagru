<?php
 session_start();
 include 'database_insert.php';
 $error = array();
 $username = "";
 $userEmail = "";
$email = "";

if(isset($_POST[recover-btn])){
    $email = $_POST['recover-email'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error['EmailError'] =  "Email address is invalid";
}
if(empty($email)){
    $error['EmailError'] = "Please enter emaila address";
}

if(count($error) == 0){
    $sql = "SELECT * FROM new_users WHERE email = '$email' LIMIT 1";
    $result = $connect->prepare($sql);
    $result->execute();
    $user = $result->fetch(PDO::FETCH_ASSOC);
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
    header('location: forgot_password.php');
    exit();
}
?>
