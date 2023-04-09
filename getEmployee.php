<?php
$stmt = $connection->prepare('SELECT * FROM employees');
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    echo "<option value='" . $row['employee_id'] . "'>" . $row['employee_name'] . "</option>";
?>