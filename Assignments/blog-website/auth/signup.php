<?php

include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $dob = $_POST["dob"];
  $password = $_POST["password"];

  echo "<script>console.log('Received data: " . json_encode($_POST) . "');</script>";

  $check_query = "SELECT * FROM users WHERE email='$email'";
  $check_result = mysqli_query($connection, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('Email already exists. Please use a different email.');</script>";
  } else {

    $insert_query = "INSERT INTO users (fullname, email, dob, password) VALUES ('$fullname', '$email', '$dob', '$password')";

    if (mysqli_query($connection, $insert_query)) {
      echo "<script>alert('Signup successful! You can now login.'); window.location.href='login.php';</script>";
    } else {
      echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
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
    .main {
      margin: 0;
      height: 90vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;

      /* 🔥 Gradient Background */
      background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .container {
      width: 100%;
      max-width: 400px;
      padding: 30px;

      /* Glass effect */
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      color: black;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-box {
      margin-bottom: 15px;
    }

    .input-box input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      outline: none;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .input-box input::placeholder {
      color: #ddd;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #fff;
      color: #764ba2;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #f1f1f1;
    }

    p {
      text-align: center;
      margin-top: 15px;
    }

    a {
      color: #fff;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <?php include '../navbar.php'; ?>

  <div class="main">

    <div class="container">
      <h2>Create Account</h2>

      <form action="./signup.php" method="POST">
        <div class="input-box">
          <input type="text" name="fullname" placeholder="Full Name" required>
        </div>

        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
          <input type="date" name="dob" required>
        </div>

        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Signup</button>
      </form>

      <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>

</body>

</html>