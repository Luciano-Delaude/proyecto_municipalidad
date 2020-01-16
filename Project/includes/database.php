<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "proyecto muni";

//Connection to database
$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if (!$conn){
    die("Database connection failed!".mysqli_connect_error());
}
?>