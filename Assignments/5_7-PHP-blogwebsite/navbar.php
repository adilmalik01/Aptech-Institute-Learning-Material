<style>
    /* Basic Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body Styling */
    body {
        font-family: Arial, sans-serif;
    }

    /* Navbar Styling */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #2d3e50;
        padding: 10px 20px;
    }

    .navbar .logo a {
        color: #fff;
        font-size: 24px;
        text-decoration: none;
    }

    .navbar .nav-links {
        list-style-type: none;
        display: flex;
    }

    .navbar .nav-links li {
        margin-right: 20px;
    }

    .navbar .nav-links li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .navbar .nav-links li a:hover {
        color: #00bcd4;
    }

    .navbar .cart a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .navbar .cart a:hover {
        color: #00bcd4;
    }
</style>

<nav class="navbar">
    <div class="logo">
        <a href="#">Inventory Store</a>
    </div>
    <ul class="nav-links">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./index.php">Products</a></li>
        <li><a href="./create-product.php">Add Products</a></li>
    </ul>
</nav>