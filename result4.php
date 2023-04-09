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
	if(isset($_POST['employee']) && !empty($_POST['employee'])){
		$employee_id = $_POST['employee'];
		$stmt = $connection->prepare("
			SELECT s_days, start_times, end_times
			FROM schedule
			WHERE e_id = :employee_id
			AND DAYOFWEEK(s_days) NOT IN (1,7)
			ORDER BY s_days ASC
		");
		$stmt->bindParam(':employee_id', $employee_id);
		$stmt->execute();
		$rowCount = $stmt->rowCount();
		if ($rowCount > 0){
			echo "<table>";
			echo "<tr><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>";
				echo "<td>" . $row['s_days'] . "</td>";
				echo "<td>" . $row['start_times'] . "</td>";
				echo "<td>" . $row['end_times'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}else{
			echo "No schedule found for this employee on Monday-Friday.";
		}
	}else{
		echo "Please select an employee.";
	}
?>
</body>
</html>