<?php

$db = new PDO('mysql:host=localhost;dbname=db_name', 'db_user', 'db_password');

$sql = "INSERT INTO people (username, gender, country) 
        VALUES (:username, 
                :gender, 
                :country)";

$statement = $db->prepare($sql);
$statement->bindParam(':username', $username);
$statement->bindParam(':gender', $gender);
$statement->bindParam(':country', $country);

$username = 'rvck';
$gender = 'male';
$country = 'France';

$statement->execute();

echo "Prepared statement have been executed...";
