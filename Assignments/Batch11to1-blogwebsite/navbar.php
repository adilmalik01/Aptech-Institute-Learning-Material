<!-- navbar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #f5f7fa;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 17px 25px;

      /* 🔥 Gradient Background */
      background: linear-gradient(135deg, #667eea, #764ba2);

      color: #fff;
      position: relative;

      /* Glass effect */
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .logo {
      font-size: 22px;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .nav-links a {
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      padding: 6px 10px;
      border-radius: 6px;
      transition: 0.3s ease;
    }

    /* 🔥 Hover effect */
    .nav-links a:hover {
      background: rgba(255,255,255,0.2);
    }

    /* Buttons style */
    .nav-links a:last-child {
      background: #fff;
      color: #764ba2;
      font-weight: bold;
    }

    .nav-links a:last-child:hover {
      background: #f1f1f1;
    }

    /* Mobile menu button */
    .menu-toggle {
      display: none;
      font-size: 26px;
      cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links {
        position: absolute;
        top: 65px;
        right: 0;
        width: 100%;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;

        background: linear-gradient(135deg, #667eea, #764ba2);

        display: none;
      }

      .nav-links.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }
    }
  </style>
</head>
<body>

<nav class="navbar">
  <div class="logo">MyWebsite</div>

  <div class="menu-toggle" onclick="toggleMenu()">☰</div>

  <ul class="nav-links" id="navLinks">
    <li><a href="./auth/login.php">Login</a></li>
    <li><a href="./auth/signup.php">Signup</a></li>
  </ul>
</nav>

<script>
  function toggleMenu() {
    document.getElementById("navLinks").classList.toggle("active");
  }
</script>

</body>
</html>