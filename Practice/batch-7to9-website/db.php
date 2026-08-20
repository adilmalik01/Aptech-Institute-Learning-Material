<?php

$server_name = "localhost";
$username = "root"; 
$password = "";
$database = "blog_website";

$connection = mysqli_connect($server_name, $username, $password, $database);


if(mysqli_connect_error()){
    die("Connection failed: " . mysqli_connect_error());
}
