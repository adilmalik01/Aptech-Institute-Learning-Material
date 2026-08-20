<?php


include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];



    $password_hash = password_hash($password, PASSWORD_DEFAULT);



    $check_user = "SELECT `id`, `name`, `email`, `password` FROM `users` WHERE `email` = '$email'";

    $check_user_result = mysqli_query($connection, $check_user);


    if (mysqli_num_rows($check_user_result) > 0) {
        echo "User already exiswts!";
    } else {
        $sql_query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password_hash')";

        $result = mysqli_query($connection, $sql_query);

        if ($result) {
            echo "Signup successful!";
        } else {
            echo "Error: " . mysqli_error($connection);
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
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(to right, #6366f1, #a855f7, #ec4899);
        }

        .form-box {
            width: 350px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #a855f7;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>


    <?php include "navbar.php" ?>


    <div class="form-box">
        <h2>Signup</h2>

        <form method="POST" action="./signup.php">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Signup</button>
        </form>
    </div>


</body>

</html>