<?php
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $email = test_input($_POST['email']);
  if(empty($email)){
    $error['emaiErr'] = "email is required";
  }else{
    $email = " ";
    //$email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format";  
    }
  }

?>