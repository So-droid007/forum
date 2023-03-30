<?php

include '_dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];


    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn,$sql);

    $numRows = mysqli_num_rows($result);
    

    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_password'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['userEmail'] = $email;

            header("location:/forum/index.php?loggedin=true");
            
    
            

        }
        else{

            header("location:/forum/index.php?login=false");
        }

       
      
    }
    else{

        header("location:/forum/index.php?login=false1");
    }
   
}


?>