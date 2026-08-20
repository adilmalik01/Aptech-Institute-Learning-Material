<?php


session_start();




if (!isset($_SESSION["user_login"])) {
    header("Location:login.php");
}



$global_email = $_SESSION["user_email"];
$global_name  = $_SESSION["username"];








?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fafafa;
            display: flex;
        }

        .main-content {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 20px;
        }

        .heading-content {
            width: 100%;
            min-height: 40vh;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>

</head>

<body>

    <?php include("sidebar.php") ?>

    <div class="main-content">
<div class="heading-content">
            <h1> <?php echo $global_name ?> </h1>
            <h1> <?php echo $global_email ?> </h1>
        </div>


            </div>


</body>

</html>