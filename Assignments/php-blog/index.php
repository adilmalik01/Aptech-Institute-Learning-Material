<?php

include("db.php");


$sql = "SELECT * FROM Blogs";
$result = mysqli_query($connection, $sql);
$final_result =  mysqli_fetch_all($result);


if (isset($_GET["id"])) {
    $Id = $_GET["id"];


    $sql = "DELETE FROM Blogs WHERE id = $Id";
    $del_result = mysqli_query($connection, $sql);
    header("Location:index.php");
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            margin: 20px;
            padding: 10px;
            border-radius: 20px;
            width: 300px;
            height: 280px;
            background-color: #f1f1f1;
            border: 1px solid grey;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }



        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
            min-height: 80%;
            text-align: center;
        }

        .icon-div {
            display: flex;
            justify-content: center;
            gap: 20px;
            font-size: 19px;
        }

        .icon-div :nth-child(1) {
            color: red;
            cursor: pointer;
        }

        .icon-div :nth-child(2) {
            cursor: pointer;

            color: green;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php include("navbar.php") ?>
    <div class="container">

        <?php foreach ($final_result as $item): ?>
            <div class="card">
                <div class="content">
                    <h2><?php echo $item[1] ?></h2>
                    <p><?php echo $item[2] ?></p>
                    <h3><?php echo $item[3] ?></h3>
                </div>
                <div class="icon-div">

                    <a href="./index.php?id=<?php echo $item[0] ?> ">
                        <i class="bi bi-trash-fill"></i>
                    </a>

                    <a href="./update.php?id=<?php echo $item[0] ?> ">
                        <i class="bi bi-pencil-fill"></i>
                    </a>

                </div>
            </div>
        <?php endforeach ?>






    </div>
</body>

</html>