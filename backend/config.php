<?php

define("DB_SERVER","localhost");
define("DB_USERNAME","admin");
define("DB_PASSWORD","");
define("DB_NAME","cus_dashboard_db");
define("DB_CHARSET","utf8mb4");

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
	die("ERROR: Could not Connect. " . mysqli_connect_error());
}
$user='admin';
$pass='';
$local='localhost';
$dbna='cus_dashboard_db';
$dsn = "mysql:host=$local;dbname=$dbna;";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>