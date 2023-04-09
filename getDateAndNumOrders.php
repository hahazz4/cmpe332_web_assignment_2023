<table>
<?php
    include 'connectDB.php';
	$stmt = $connection->prepare(
	'SELECT DATE(order_date) AS order_date, COUNT(*) AS num_orders 
        FROM orders GROUP BY order_date'
    );
	$stmt->execute();
	$rowCount = $stmt->rowCount();
    if ($rowCount > 0){
        echo "<table>";
        echo "<tr><th>Order Date</th><th>Number of Orders</th></tr>";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row['order_date'] . "</td>";
            echo "<td>" . $row['num_orders'] . "</td>";
            echo "</tr>";
        }
    }else
        echo "No Results Found :(";
	echo "</table>";
?>
</table>