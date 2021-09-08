<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "password";
$dbname = "login_db";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){


	die("connection failed:<");
}