<?php


$server = "localhost";
$database = "Blog_website";
$username = "root";
$password = "";

$connection = mysqli_connect($server, $username, $password, $database);


if ($connection->connect_error) {
    die("Connection Failed");
}

?>