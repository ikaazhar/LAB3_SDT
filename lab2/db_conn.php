<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "lab2_db";
$port = "3307"; // Replace with the new port number

//create connection
$conn = mysqli_connect($servername, $username, $password, $database, $port);

//check connection
if(!$conn){
    die("<br>Note: Connection failed: " . mysqli_connect_error());
}else{
    echo "<br>Note: Connected successfully";
}

?>