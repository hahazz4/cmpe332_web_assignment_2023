<table>
<?php
    include 'connectDB.php';
    $date= $_POST["date"];
	//$date= '2008-01-22'; //debugging purpose
	$stmt = $connection->prepare(
	'SELECT c.f_name, c.l_name, o.items, o.order_price, o.order_tip, d1.f_name as delivery_f_name,
    d1.l_name as delivery_l_name 
    FROM orders o 
    JOIN customer c ON o.cust_email = c.email 
    JOIN delivery d2 ON o.delivery_person = d2.e_id 
    JOIN employee d1 ON d1.emp_id = d2.e_id 
    WHERE o.order_date = :date;'
	);
	$stmt->bindParam(':date', $date);
	$stmt->execute();
	
	$rowCount = $stmt->rowCount();
    if ($rowCount > 0){
		echo "<table>";
		echo "<tr><th>Customer Name</th><th>Items Ordered</th><th>Order Price</th><th>Order Tip</th><th>Delivery Person</th></tr>";
		while($row = $stmt->fetch()){
			echo "<tr>";
			echo "<td>" . $row["f_name"] . " " . $row["l_name"] . "</td>";
			echo "<td>" . $row["items"] . "</td>";
			echo "<td>" . $row["order_price"] . "</td>";
			echo "<td>" . $row["order_tip"] . "</td>";
			echo "<td>" . $row["delivery_f_name"] . " " . $row["delivery_l_name"] . "</td>";
			echo "</tr>";
		}
	}else
		echo "No Results Found :(";
	echo "</table>";
?>
</table>