<?php

include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $BlogId = $_POST["id"];
    $author_name = $_POST["author_name"];
    $title =  $_POST["title"];
    $content =  $_POST["content"];



    $sql = "UPDATE Blogs SET Author_name = '$author_name', title = '$title', content = '$content' WHERE id = $BlogId";


    if ($connection->query($sql)) {
        header("Location:index.php");
    } else {
        echo '
         <div class="alert alert-primary" role="alert">
           Blog Not Updated
         </div>
        ';
    }

}

if (isset($_GET["id"])) {
    $Id = $_GET["id"];

    $sql = "Select * from Blogs WHERE id = $Id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>
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
        <form action="./update.php" method="post">
            <input type="hidden" name="id" value=<?php echo $row["id"] ?>>
            <input type="text" name="author_name" value=<?php echo $row["Author_name"] ?>>
            <input type="text" name="title" value=<?php echo $row["title"] ?>>
            <input type="text" name="content" value=<?php echo $row["content"] ?>>
            <div class="btn-div">
                <button>Update Blog</button>
            </div>
        </form>
    </div>




</body>

</html>