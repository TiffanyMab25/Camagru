<?php
    require_once 'checker.php';
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        verifyUser($token);
    }
    
    session_start();
    if (isset($_SESSION['id'])){

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   hi  <?php //echo $_SESSION['username']?>
</body>
</html>