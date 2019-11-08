<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(empty($_POST["email"])){
  $emaiErr = "email is required";
}else{
$email = " ";
//$email = $_POST['email'];
$email = test_input($_POST['email']);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
$emailErr = "Invalid email format";  
}
}


?>