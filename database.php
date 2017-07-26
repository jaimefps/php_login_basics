<?php

// had I created an actual DB in mysql, this would be the code:

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'auth';

try {
	$connection = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $error) {
	die( "Connection falied: " . $e->getMessage());
}

?>