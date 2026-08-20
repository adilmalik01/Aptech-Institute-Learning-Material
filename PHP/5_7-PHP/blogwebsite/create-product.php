<?php


include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $author_name = $_POST["product_name"];
    $title =  $_POST["product_price"];
    $content =  $_POST["product_stock"];


    $sql = "INSERT INTO Blogs(author_name,title,content) VALUES ('$author_name','$title','$content')";


    if ($connection->query($sql)) {

        echo '
         <div class="alert alert-primary" role="alert">
           Post Created
         </div>
        ';
    } else {
        echo '
         <div class="alert alert-primary" role="alert">
           Product Not Created
         </div>
        ';
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
            align-items: center;
            flex-direction: column;
        }

        .container form {
            width: 70%;
            height: 60vh;
            background-color: white;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-direction: column;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        .container form input {
            width: 90%;
            height: 45px;
            border-radius: 10px;
            outline: none;
            border: 1px solid rgba(0, 0, 0, 0.5);
            padding: 0 4px;
            font-size: 18px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .btn-div {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 5px 10px;

        }

        .btn-div button {
            width: 30%;
            height: 40px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.5);

        }
    </style>
</head>

<body>
    <?php include("navbar.php") ?>


    <div class="container">
        <form action="./create-product.php" method="post">
            <input type="text" name="product_name" placeholder="Enter Author name.................">
            <input type="text" name="product_price" placeholder="Enter Title................">
            <input type="text" name="product_stock" placeholder="Enter Content................">
            <div class="btn-div">
                <button>Add Blog</button>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>