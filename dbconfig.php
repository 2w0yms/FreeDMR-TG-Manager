<?php 
// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "freedmr_talkgroups"; 
$dbPassword = "password"; 
$dbName     = "freedmr_talkgroups"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$db->set_charset("utf8");

// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
