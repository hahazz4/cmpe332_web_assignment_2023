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
    
    <div id="welcome-Banner" class="container-fluid">
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

    <div id="cardsContainer" class="container-fluid">
        <div id="resultCard" class="card">
            <div class="row">
                <div class="col">
                    <h2>Orders Made on Desired Date</h2>
                    <form action="result1.php" method="post">
                        <input type="date" id="date" name="date" required><br>
                        <input type="submit" value="Submit Date">
                    </form>
                </div>
            </div>
        </div>

        <div id="resultCard" class="card">
            <div class="row">
                <div class="col">
                    <h2>Date & Number of Orders</h2>
                    <form action="result2.php" method="post">
                        <label for="date">Enter the order date here:</label>
                        <input type="date" id="date" name="date" required><br>
                        <input type="submit" value="Submit Order">
                    </form>
                </div>
            </div>
        </div>

        <div id="resultCard" class="card">
            <div class="row">
                <div class="col">
                    <h2>New Customer</h2>
                    <form method="post" action="result3.php">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>
                        
                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" name="phone" required><br>

                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" required><br>
                        
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" required><br>
                        
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required><br>
                        
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" required><br>
                        
                        <label for="zip">Zip Code:</label>
                        <input type="text" id="zip" name="zip" required><br>

                        <label for="related_employee_id">Know an employee? Enter their employee ID:</label>
                        <input type="text" id="related_employee_id" name="related_employee_id" required><br>
                        
                        <input type="submit" value="Add Customer">
                    </form>
                </div>
            </div>
        </div>

        <div id="resultCard" class="card">
            <div class="row">
                <div class="col">
                    <h2>Employee Schedule</h2>
                    <form method="POST" action="result4.php">
                        <select name="employee">
                        <option value="">Select An Employee</option>
                        <?php
                            include 'connectDB.php';
                            $stmt = $connection->prepare('SELECT * FROM employee');
                            $stmt->execute();
                            
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                echo "<option value='" . $row['emp_id'] . "'>" . $row["f_name"] . " " . $row["l_name"] . "</option>";
                        ?>
                        </select>
                        <br><br>
                        <input type="submit" value="View Schedule">
	                </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="back-to-top">
            <a id="normalButton" class="btn btn-primary" href="#navbar-color">Back To Top ^</a>
        </div>
        <div class="copyright">
            <p class="container-fluid text-center">© 2023 | Zeerak Asim.</p>
        </div>
    </footer>
</body>
</html>