<?php

$servername = 'localhost'; // 127.0.0.1
$username = 'root'; // default admin
$password = ''; // default pass is nothing
$dbname = 'shopnest';

// create a connection
$db = new mysqli($servername, $username, $password, $dbname);

// check for any errors in connection

if($db->connect_error){
    die('Something is not right... we are exiting...');
}
