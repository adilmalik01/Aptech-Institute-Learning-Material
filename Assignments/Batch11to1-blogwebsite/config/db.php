<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "blogwebsite";


$connection = mysqli_connect($server_name, $user_name, $password, $database);



if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}



?>