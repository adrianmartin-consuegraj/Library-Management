<?php

$servername = "localhost";
$username = "biblio";
$password = "biblio";
$dbname = "biblioteca";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);

}

//echo "Connected succesfully <br>";
?>