<!-- login.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <style>
    .main {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;

      background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .container {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      color: #fff;
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
      border-radius: 8px;
      border: none;
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
      border-radius: 8px;
      border: none;
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
      <h2>Welcome Back</h2>

      <form action="login_process.php" method="POST">
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Login</button>
      </form>

      <p>Don't have an account? <a href="signup.php">Signup</a></p>
    </div>
  </div>

</body>

</html>