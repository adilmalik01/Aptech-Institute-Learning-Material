<style>
    * {
        margin: 0;
        padding: 0;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 220px;
        height: 100vh;
        background-color: white;
        border-right: 1px solid rgb(192, 192, 192);
        padding: 20px 0;
        position: fixed;
        display: flex;
        flex-direction: column;
    }

    .sidebar .logo {
        padding: 10px 20px 20px 20px;
        border-bottom: 1px solid #f1f1f1;
        margin-bottom: 15px;
    }

    .sidebar .logo a {
        color: #262626;
        font-size: 24px;
        text-decoration: none;
        font-weight: bold;
    }

    .sidebar .nav-links {
        list-style-type: none;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .sidebar .nav-links li {
        margin-bottom: 5px;
    }

    .sidebar .nav-links li a {
        color: #262626;
        text-decoration: none;
        font-size: 16px;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease;
        border-radius: 8px;
        margin: 0 10px;
    }

    .sidebar .nav-links li a:hover {
        background-color: #f1f1f1;
    }

    .sidebar .nav-links li a i {
        margin-right: 12px;
        font-size: 20px;
    }

    .sidebar .nav-links li a.active {
        font-weight: bold;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            width: 70px;
            padding: 15px 0;
        }

        .sidebar .logo {
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        .sidebar .logo a {
            font-size: 0;
        }

        .sidebar .logo a:before {
            content: 'IS';
            font-size: 22px;
        }

        .sidebar .nav-links li a span {
            display: none;
        }

        .sidebar .nav-links li a {
            padding: 12px;
            justify-content: center;
        }

        .sidebar .nav-links li a i {
            margin-right: 0;
        }
    }
</style>

<div class="sidebar">
    <div class="logo">
        <a href="#">Inventory Store</a>
    </div>
    <ul class="nav-links">
        <li><a href="./index.php" class="active"><i class="bi bi-house-door-fill"></i><span>Home</span></a></li>
        <li><a href="./index.php"><i class="bi bi-grid-fill"></i><span>Products</span></a></li>
        <li><a href="./create-product.php"><i class="bi bi-plus-square-fill"></i><span>Add Products</span></a></li>
        <li><a href="./profile.php"><i class="bi bi-person-circle"></i><span>Profile</span></a></li>
        <li><a href="./logout.php"><i class="bi bi-arrow-right"></i></i><span>Logout</span></a></li>
    </ul>
</div>