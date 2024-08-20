<?php
ini_set('display_errors','off');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petrol_pump1";
date_default_timezone_set("Asia/Kolkata");

try {

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

	echo "Connection failed: " . $e->getMessage();
}
