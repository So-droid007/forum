<?php include 'partials/_dbconnect.php'  ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <?php
    include ("partials/_header.php");
    

    ?>
    



    <!-- Carousel starts here -->

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/random/?coding/coding" height="600px" width="2400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/random/?coding/java" height="600px" width="2400px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/random/?microsoft/products" height="600px" width="2400px" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Carousel ends here -->



    <div id="categoryHeading" class="container my-4 py-4">

        <h2>Browse Categories</h2>

    </div>



    <!-- Category container starts here -->

    <div class="row" id="categoryContainer">

    <?php

    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

        $title = $row['cat_title'];
        $desc = $row['cat_description'];
        $id = $row['category_id'];

        echo '  
        <div class="col-md-4 my-4">
        <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/random/?coding/'. $title.'" height ="200px" class="card-img-top" alt="Error loading">
            <div class="card-body">
                <h5 class="card-title">'.$title.'</h5>
                <p class="card-text">'.substr($desc,0,70) .'...</p>
                <a href="partials/_threadlist.php?catid='.$id.'" class="btn btn-primary">View threads</a>
            </div>
        </div>
    </div>
';



    }
    
    
    
    ?>
    </div>


      





    <!-- Category container ends here -->












    <!-- Footer starts here -->


   <?php include("partials/_footer.php")    ?>









    <!-- Footer ends here -->




</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>