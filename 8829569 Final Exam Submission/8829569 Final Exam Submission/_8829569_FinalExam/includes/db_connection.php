<?php

$servername = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'itdemo';

// creating the connection to database
$db = new mysqli($servername, $username, $password, $dbname);

// checking for errors

if($db->connect_error){
    die('Something is not right... we are exiting...');
}
