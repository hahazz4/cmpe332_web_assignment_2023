<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Orders</h1><hr>
        <table border = '2'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>The Order</th>
                <th>Tip</th>
                <th>Delivery Person</th>
            </tr>

        <?php
        while ($row = $query->fetch()) 
        {
            echo "<tr>";
            echo "<td>" . $row['cust'] ."</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </body>
</html>