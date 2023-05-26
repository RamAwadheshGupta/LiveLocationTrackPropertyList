<?php 
// local Database configuration 
date_default_timezone_set('Asia/Calcutta');
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "geolocation";

//Live database configuration 
/* $dbHost     = "localhost"; 
$dbUsername = "spacenoi_geoLocation"; 
$dbPassword = "ramUA@123456"; 
$dbName     = "spacenoi_geolocation"; */
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}