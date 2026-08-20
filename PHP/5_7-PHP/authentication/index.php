<?php

session_start();

if (!isset($_SESSION["user_login"])) {
    header("Location:login.php");
}

include("db.php");

$sql = "SELECT * FROM Blogs";
$result = mysqli_query($connection, $sql);
$final_result = mysqli_fetch_all($result);

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
    <title>Inventory Store - Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

        .container {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 25px;
            padding: 20px;
        }

        .card {
            width: 300px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid grey;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-height: 200px;
        }

        .content h2 {
            font-size: 18px;
            color: #262626;
            margin-bottom: 5px;
            text-align: center;
        }

        .content p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
            text-align: center;
            flex-grow: 1;
        }

        .content h3 {
            font-size: 16px;
            color: #0095f6;
            margin-top: 5px;
            text-align: center;
        }

        .icon-div {
            padding: 15px;
            border-top: 1px solid #f1f1f1;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .icon-div a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .icon-div a:hover {
            background-color: #f1f1f1;
        }

        .icon-div a:nth-child(1) {
            color: #ed4956;
        }

        .icon-div a:nth-child(2) {
            color: #0095f6;
        }

        .icon-div i {
            font-size: 18px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
        }
    </style>
</head>

<body>
    <?php include("sidebar.php") ?>

    <div class="main-content">
        <div class="container">
            <?php foreach ($final_result as $item): ?>
                <div class="card">
                    <div class="content">
                        <h2><?php echo $item[1] ?></h2>
                        <p><?php echo $item[2] ?></p>
                        <h3><?php echo $item[3] ?></h3>
                    </div>
                    <div class="icon-div">
                        <a href="./index.php?id=<?php echo $item[0] ?>">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                        <a href="./update.php?id=<?php echo $item[0] ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>