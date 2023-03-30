<?php include 'partials/_dbconnect.php'  ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <style>
        .container{
            min-height: 100vh;
        }
    </style>

    <?php
    include("partials/_header.php");


    ?>

<!-- Search results starts here -->

<div class="container my-3">
    <h1>Search results for <em>"<?php echo $_GET['search']; ?>"</em></h1>

    <?php

    $noResult = true;
    $query = $_GET['search'];

    $sql = "SELECT * FROM `threads` WHERE MATCH(`thread_title`,`thread_description`) AGAINST('$query')";
    $result = mysqli_query($conn,$sql);

    while($row= mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $description = $row['thread_description'];
        $thread_id = $row['thread_id'];
        $url = "partials/_thread.php?thread_id=".$thread_id;
        $noResult=false;

        echo '   <div class="searchResults my-3">
        <a href="'.$url.'" class="text-dark"><h3>'.$title.'</h3></a> 
        <p>'.$description.'</p>
    </div>';
    }

    if($noResult){
        echo'<div class="jumbotron jumbotron-fluid">
        <div class="container">
        <p class="display-5 my-3">
        No results found
        </p>
        <p class="lead">Suggestions:

        <ul><li>Make sure that all words are spelled correctly.</li>
        <li>.Try different keywords.</li>
        <li>Try more general keywords.</li></ul>
        </p>
        </div>
        </div>';
    }



?>
 
    
</div>






<!-- Search results ends here -->





   


   










    <!-- Footer starts here -->


    <?php include("partials/_footer.php")    ?>









    <!-- Footer ends here -->




</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>