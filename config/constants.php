<?php

session_start();



define('SITEURL', 'http://localhost:8082');
define('LOCALHOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'food_order');

$connect = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($connect, DB_NAME) or die(mysqli_error($connect)); //SElecting Database


?>
