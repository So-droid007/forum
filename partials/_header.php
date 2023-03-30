<!-- Navbar starts here -->


<?php

session_start();



?>

<?php

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/forum">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/forum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top categories
                    </a>
                    <ul class="dropdown-menu">';

                   

                    $sql = "SELECT cat_title,category_id FROM `categories` LIMIT 4";
                    $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_assoc($result)){
                        echo ' <li><a class="dropdown-item" href="/forum/partials/_threadlist.php?catid='.$row['category_id'].'">'.$row['cat_title'].'</a></li> ';
                    }
                    
                    
                  
                    
                       

                echo '</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum/about.php">Contact</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="/forum/search.php" method="get">
                <input class="form-inline me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>';

            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

                echo'<div class="text-light mx-2">Welcome '.$_SESSION['userEmail'].'</div> 
                <a href="/forum/logout.php"><button type="button" class="btn btn-outline-success">
                Logout
            </button></a>';

            }

            else{

                        

            echo '
            <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">
                Sign Up
            </button>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
            </button>';

            }


   

            
       echo' </div>
    </div>
</nav>';

?>

<!-- Navbar ends here -->
<?php

$showAlert = false;

function capitalize($word){
    return ucfirst($word);
}


function alert($mode,$msg){
    echo '<div class="alert alert-'.$mode.' alert-dismissible fade show mb-0" role="alert">
    <strong>'.capitalize($mode).' !</strong> '.$msg.' .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){

    $showAlert=true;

   alert("success","You are signed up");

}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
    $showAlert=true;
    alert("danger","User already exists");

}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false1"){
    $showAlert=true;
    alert("danger","Password do not match");

}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false2"){
    $showAlert=true;
    alert("warning","Please enter something");

}
if(isset($_GET['logout']) && $_GET['logout']=="true"){
    $showAlert=true;
    alert("success","You are logged out");

}
if(isset($_GET['login']) && $_GET['login']=="false"){
    $showAlert=true;
    alert("danger","Invalid password");

}
if(isset($_GET['login']) && $_GET['login']=="false1"){
    $showAlert=true;
    alert("danger","User does not exist");

}



?>


<?php include('_signupmodal.php');   ?>
<?php include('_loginmodal.php');   ?>