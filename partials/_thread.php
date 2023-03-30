<?php

include("_dbconnect.php");


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
    #jumbotron {
        margin: auto;
        width: 71vw;

    }
    #footer1{
        padding: 10px;
        text-align: center;
        justify-content: center;

    }
    
    </style>


    



    <!-- jumbotron starts here -->


    <?php
    include("_header.php");


    $id = $_GET['thread_id'];

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $solution_desc = $_POST['solution'];
        $solution_desc = str_replace("<","&lt;",$solution_desc);
        $solution_desc = str_replace(">","&gt;",$solution_desc);
        $sno = $_POST['user_id'];

       


   

    if($solution_desc==null){
        alert("warning","Please enter something!");
    }
    else{

        $sql = "INSERT INTO `solutions` (`solution_desc`, `thread_user_id`, `timestamp`, `thread_id`) VALUES ('$solution_desc', '$sno', current_timestamp(), '$id')";
        $result = mysqli_query($conn,$sql);

        alert("success","Your solution has been posted successfully");

    }
}

    ?>


    <?php

    $id = $_GET['thread_id'];

    $sql = "SELECT * FROM `threads` WHERE `thread_id`=$id";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_description'];

        echo '<div id="jumbotron" class="jumbotron my-4">
    <h1 class="display-4">' . $title . '</h1>
    <p class="lead">' . $desc . '</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  
  </div>';
    }



    ?>

    <!-- jumbotron ends here -->


    <div class="container my-4">

    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

            echo'<h1 class="my-4">Enter your solution</h1>
            <form action='.$_SERVER['REQUEST_URI'].' method="post">
                    <div class="form-group">
                        
                    <div class="form-floating">
                        <textarea class="form-control" name="solution" style="height: 200px;" id="solution"></textarea>
                        <label for="floatingTextarea">Solution</label>
                    </div>

                    <input type="hidden" name="user_id" value="' .$_SESSION["user_id"] . '"> 
        
        
                    </div>
                    
        
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>';
        }

        else{
            echo '  <div class="container">

            <p class="lead">You are not logged in. Please login to be able to post a solution.</p>
    
            </div>';
        }


        ?>
      





    

        <h2 class="my-4">Browse Solutions</h2>

        
        <!-- PHP to iterate data  -->
        <?php

        $id = $_GET['thread_id'];

        $sql = "SELECT * FROM `solutions` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
           $solution_desc = $row['solution_desc'];
           $th_user_id = $row['thread_user_id'];


           $sql2 = "SELECT user_email FROM `users` WHERE user_id=$th_user_id";
           $result2 = mysqli_query($conn,$sql2);

           $row2 = mysqli_fetch_assoc($result2);

            echo ' <div class="sol media my-4">
            <img class="mr-3" src="150-1503945_transparent-user-png-default-user-image-png-png.png" height="80px"
                alt="Error loading image">
            <div class="media-body">
            
                <h5 class="mt-0 text-dark">'. $row2['user_email'].' user</h5>
                ' . $solution_desc . '
            </div>
        </div>';
        }



        ?>



    </div>

























    <!-- Footer starts here -->

  <footer>
  <p id="footer1" class="text-light bg-dark" style="margin-bottom: 0px;">iDiscuss 2023 || copyright@ All Rights Reserved </p>
  </footer>








    <!-- Footer ends here -->




</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>