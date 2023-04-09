<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>

    <link rel = "stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Mulish:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include 'connectDB.php';
    ?>

    <nav id="navbar-color" class="navbar border-white navbar-expand-small navbar-expand-md navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a id="navbarBrandStyles" class="navbar-brand" href="restraurant.php">RestaurantDB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a id="navLinkStyles" class="nav-link active" aria-current="page" href="restraurant.php">Home</a>
                    <a id="navLinkStyles" class="nav-link" href="about.php">About</a>
                    <a id="navLinkStyles" class="nav-link" href="support.php">Support</a>
                </div>
            </div>
        </div>
    </nav>
    
    <div id="result-banner" class="container-fluid">
        <div id="welcome" class="container-fluid">
            <div id="welcome-title" class="container-fluid text-center">
                <h2 id="welcome-header">Result</h2>
            </div>
            
            <div id="context-section" class="container-fluid text-center">
                <p id="context-style">
                </p>
            </div>
        </div>
    </div>

<?php
    include 'connectDB.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){        //Checking if the form has been submitted from user
        $email = $_POST["email"];                   //Collecting the input values from form
        $phone = $_POST["phone"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $zip = $_POST["zip"];
        $related_employee_id = $_POST["related_employee_id"];
        
        $stmt = $connection->prepare('SELECT * FROM customer WHERE email = :email;');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        
        //If the customer already exists
        if ($rowCount > 0){
            echo "Error! This email address is already associated with an account. Please enter a different one.";
        }else{
            if (!empty($email)){
                $stmt = $connection->prepare('INSERT INTO customer (email, phone_num, f_name, l_name, street, city, pc, e_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?);'
                );
                $stmt->execute([$email, $phone, $firstName, $lastName, $address, $city, $zip, $related_employee_id]);
            }else
                echo "Error! Email field cannot be empty.";            

            //Creating the new account with the $5 credit
            $stmt = $connection->prepare('INSERT INTO account (cust_email, credits, date_, order_id, payments) VALUES (?, ?, NULL, NULL, ?);');     
            $stmt->execute([$email, 'loyalty points', 5.00]);

            //If Customer was added successfully, display success message
            if ($stmt->rowCount() > 0)
                echo "Successfully added customer to the database!";
            else
                echo "Error! Failed to add customer to the database. Please try again...";
        }
    }
?>
</body>
</html>