<?php

include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = $_POST["username"];
    $email = $_POST["email"];
    $password =  password_hash($_POST["password"], PASSWORD_BCRYPT);


    $sql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);


    if (mysqli_num_rows($result) > 0) {
        echo "Email Already Exist";
    } else {
        $sql = "INSERT INTO users(username,email,password) VALUES ('$username','$email','$password')";

        if ($connection->query($sql)) {

            echo '
             <div class="alert alert-primary" role="alert">
               Signup 
             </div>
            ';
            header("Location:login.php");
        } else {
            echo '
             <div class="alert alert-primary" role="alert">
               Invalid
             </div>
            ';
        }
    }
}











?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        .main {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 350px;
            min-height: 50vh;
            display: flex;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            flex-direction: column;
            border-radius: 8px;
            align-items: center;
            justify-content: center;
            gap: 30px;
        }

        .main form input {
            width: 70%;
            height: 35px;
            border-radius: 4px;
            outline: none;
            border: 1px solid gray;
            padding: 2px 4px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .main form button {
            width: 40%;
            height: 35px;
            border-radius: 4px;
            outline: none;
            background-color: #0866ff;
            cursor: pointer;
            color: white;
            border: 1px solid gray;
        }
    </style>
</head>

<body>

<?php include("navbar.php") ?>


    <div class="main">
        <form method="post" action="./signup.php">
            <h1>Sign up</h1>
            <input type="text" placeholder="Enter your username" name="username" id="">
            <input type="text" placeholder="Enter your email" name="email" id="">
            <input type="text" placeholder="Enter your password" name="password" id="">
            <button>Signup</button>
        </form>
    </div>




</body>

</html>