<?php

$host = "localhost";
$user = "root";
$pwd = "";
$dbName = "registerapp";

$dsn = 'mysql:host=' . $host . '; dbname=' . $dbName;
try {

	$pdo = new PDO($dsn, $user, $pwd);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //OPTIONAL HOW YOU WANT TO PULL UP THE DATA AS ASSOC
	return $pdo;
} catch (Exception $e) {
	error_log($e->getMessage());
	exit('Something weird happened'); //something a user can understand
}
