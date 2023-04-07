<?php
    include 'connectDB.php';
    //List all the orders made on a particular date. 
    //The user should be asked for a date and you will list the first and last name of the customer, 
    //the items ordered, the total amount of the order, the tip, 
    //and the name of the delivery person who delivered the order.
    // $date = $_POST["date"];
    //$query = "SELECT * FROM 'restaurant'";
    // SELECT customers.first_name, customers.last_name, orders.order_id, orders.order_date, 
    // orders.total_amount, orders.tip, delivery_people.name FROM orders
    //     INNER JOIN customers ON orders.customer_id = customers.customer_id
    //         INNER JOIN delivery_people ON orders.delivery_person_id = delivery_people.delivery_person_id
    //             WHERE orders.order_date = ?;
    $stmt = $connection->query("SELECT * FROM restaurant;");
    while($row = $stmt->fetch()){
        // echo 'input ';
        // echo $row["cust_fname, cust_lname"];
        // echo "";
        var_dump($row);
        echo "<br>";
    }
?>