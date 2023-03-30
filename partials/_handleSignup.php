<?php

include('_dbconnect.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cPass= $_POST['signupcPassword'];

    if($email==null || $pass == null || $cPass==null){
        header("location:/forum/index.php?signupsuccess=false2");
        exit;

    }
    

    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn,$sql);

    $numRows = mysqli_num_rows($result);
    

    if($numRows>0){

        
        header("location:/forum/index.php?signupsuccess=false");

    }
    else{
        if($pass==$cPass){

            $hash = password_hash($pass,PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ('$email', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            header("location:/forum/index.php?signupsuccess=true");
        }
    
        else{
            header("location:/forum/index.php?signupsuccess=false1");
        }

    }

   
   

  

}



?>