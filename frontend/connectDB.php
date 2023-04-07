<?php
try{
    $connection = new PDO('mysql:host=localhost;dbname=cisc332', "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Connection Error! ". $e->getMessage(). "<br/>";
	die();
}
?>