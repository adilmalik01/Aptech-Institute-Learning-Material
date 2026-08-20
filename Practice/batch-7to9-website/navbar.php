<?php



session_start();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradient Navbar</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            background: linear-gradient(to right, #6366f1, #a855f7, #ec4899);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #ddd;
        }

        .signup-btn {
            background: linear-gradient(to right, #6366f1, #a855f7, #4897ec);

            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">MyApp</div>

        <div class="nav-links">
            <a href="./index.php">Home</a>

            <?php if (!isset($_SESSION["isLogin"]) || $_SESSION["isLogin"] !== true): ?>

                <a href="./login.php">Login</a>
                <a href="./signup.php" class="signup-btn">Signup</a>

            <?php else: ?>

                <a href="./profile.php" class="signup-btn">Profile</a>

                <form action="./logout.php" method="post" style="display:inline;">
                    <button type="submit">Logout</button>
                </form>

            <?php endif; ?>
        </div>
    </div>

</body>

</html>