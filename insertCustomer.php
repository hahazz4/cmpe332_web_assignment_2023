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
