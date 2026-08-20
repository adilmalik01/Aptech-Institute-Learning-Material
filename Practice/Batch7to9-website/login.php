<?php



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}




include "./auth.php";
include "./db.php";

redirect_if_logged_in();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    $safe_email = mysqli_real_escape_string($connection, $email);
    $check_user = "SELECT `id`, `name`, `email`, `password`, `isAdmin` FROM `users` WHERE `email` = '$safe_email'";
    $check_user_result = mysqli_query($connection, $check_user);

    if (mysqli_num_rows($check_user_result) == 0) {
        echo "Email Not Found";
    } else {
        $user = mysqli_fetch_assoc($check_user_result);

        if (password_verify($password, $user["password"])) {
            login_user($user);

            if (is_admin()) {
                redirect_to('/admin/index.php');
            }

            redirect_to('/index.php');
        } else {
            echo "Invalid Email Or Password";
        }
    }
}






?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background: #6366f1;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php include "navbar.php"  ?>

    <div class="form-box">
        <h2>Login</h2>

        <form method="POST" action="./login.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>
    </div>


</body>

</html>