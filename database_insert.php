<?php
    require "config/database.php";
    $connect = "";

   // $server = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
   // $token = bin2hex(random_bytes(50));
   // $verify = 0; // by default if someone hasnt verfied ther email they cant use ther account
  //  $hiddenpassword = password_hash($userpass, PASSWORD_DEFAULT);
    function inserttotable($connect, $userdata, $emaildata, $userpass){
        try{
            $server = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $token = bin2hex(random_bytes(50));
            $verify = 0; // by default if someone hasnt verfied ther email they cant use ther account
            $hiddenpassword = password_hash($userpass, PASSWORD_DEFAULT);

            $connect = new PDO($server, DB_USER, DB_PASS);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // it alows you to use exeption 
            $stmt = $connect->prepare("INSERT INTO new_users (Email, Username, Password, Token, Verified) VALUES (:Email, :Username, :Password, :Token, :Verified)");// We put the semicolon so we dont manually insert data

        $stmt->bindParam(':Email', $_POST["email"]);
        $stmt->bindParam(':Username', $_POST["username"]);
        $stmt->bindParam(':Password', $hiddenpassword);
        $stmt->bindParam(':Token', $token);
        $stmt->bindParam(':Verified', $verify);
        //$stmt->execute();
        //echo "New user created successfully";
        if ($stmt->execute()){  //inserts the data into the database 
            $user_id = $connect->lastInsertId();
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $userdata;
            $_SESSION['email']= $emaildata;
            $_SESSION['verified'] = $verify;
        
           mail($_SESSION['email'], "Verify your email adress", "http://localhost:8080/Camagru/index.php?token=$token"); //sends verification email to the user 
            $_SESSION['message'] = "You are now logged in";
            //header('Location:index.php');
            exit();
        }
        if($stmt->rowCount() == 1){
            echo "Registred Successful";
        }
        }catch(PDOException $e)
        {
            echo "Failed to insert data into the database " . $e->getMessage();

        }
    }
    // inserttotable($connect, $_POST['username'], $_POST['email'], $_POST['passwd']);

?>