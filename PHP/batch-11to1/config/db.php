<?php


$server_name= "localhost";
$username = "root";
$password = "";
$database = "contact";


$connection = mysqli_connect($server_name, $username, $password, $database);

if(!$connection){
    die("Connection Error". mysqli_connect_error());
}





?>