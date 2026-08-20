<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password =  $_POST["password"];



    echo "email : " . $email . "<br>";
    echo "password : " . $password . "<br>";
};





?>

