<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestaurantDB</title>

    <link rel = "stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mulish:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <nav id="navbar-color" class="navbar border-white navbar-expand-small navbar-expand-md navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a id="navbarBrandStyles" class="navbar-brand" href="/cmpe332_web_assignment3/frontend/restaurant.php">RestaurantDB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a id="navLinkStyles" class="nav-link active" aria-current="page" href="/cmpe332_web_assignment3/frontend/restaurant.php">Home</a>
                    <a id="navLinkStyles" class="nav-link" href="reminders">Reminders</a>
                    <a id="navLinkStyles" class="nav-link" href="HowTo">How-To</a>
                    <a id="navLinkStyles" class="nav-link" href="support">Support</a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div id="welcome" class="container-fluid">
            <div id="welcome-title" class="container-fluid text-center">
                <h2 id="welcome-header">Welcome to RestaurantDB!</h2>
            </div>
            
            <div id="context-section" class="container-fluid text-center">
                <p id="context-style">This website can assist you with your restaurant database queries.
                    Feel free to select an option from any of the following options below.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col">
                <?php
                    //List all the orders made on a particular date. 
                    //The user should be asked for a date and you will list the first and last name of the customer, 
                    //the items ordered, the total amount of the order, the tip, 
                    //and the name of the delivery person who delivered the order.
                    include "connectDB.php";

                    $date = $_POST["date"];
                    $query = ;

                    $stmt = $connection -> prepare($query);
                    while($row = $result -> fetch()){
                        echo 'input ';
                        echo $row["cust_fname, cust_lname"];
                        echo ""
                    }
                ?>
                </div>

                <div class="col">

                </div>

                <div class="col">

                </div>

                <div class="col">

                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="back-to-top">
            <a id="normalButton" class="btn" href="#navbar-color">Back To Top ^</a>
        </div>
        <div class="copyright">
            <p class="container-fluid text-center">© 2023 | Zeerak Asim.</p>
        </div>
    </footer>
</body>
</html>