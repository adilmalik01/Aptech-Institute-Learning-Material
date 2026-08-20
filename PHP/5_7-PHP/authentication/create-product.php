<?php

session_start();
if (!isset($_SESSION["user_login"])) {
    header("Location:login.php");
}



include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author_name = $_POST["product_name"];
    $title = $_POST["product_price"];
    $content = $_POST["product_stock"];

    $sql = "INSERT INTO Blogs(author_name,title,content) VALUES ('$author_name','$title','$content')";

    if ($connection->query($sql)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Blog - Inventory Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .main-content {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .form-title {
            text-align: center;
            margin-bottom: 25px;
            color: #262626;
            font-size: 24px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            height: 50px;
            border-radius: 8px;
            border: 1px solid #dbdbdb;
            padding: 0 15px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #0095f6;
            box-shadow: 0 0 0 2px rgba(0, 149, 246, 0.2);
            outline: none;
        }

        .form-control::placeholder {
            color: #8e8e8e;
        }

        textarea.form-control {
            height: 120px;
            padding: 15px;
            resize: none;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #262626;
        }

        .btn-submit {
            width: 100%;
            height: 48px;
            background-color: #0095f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0085e0;
        }

        .alert {
            margin-bottom: 20px;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
        }
    </style>
</head>

<body>
    <?php include("sidebar.php") ?>

    <div class="main-content">
        <div class="form-container">
            <?php if (isset($success)) : ?>
                <div class="alert alert-success" role="alert">
                    Blog post created successfully!
                </div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    Failed to create blog post. Please try again.
                </div>
            <?php endif; ?>

            <h2 class="form-title">Create New Blog Post</h2>
            <form action="./create-product.php" method="post">
                <div class="form-group">
                    <label for="product_name" class="form-label">Author Name</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Enter author name..." required>
                </div>

                <div class="form-group">
                    <label for="product_price" class="form-label">Blog Title</label>
                    <input type="text" id="product_price" name="product_price" class="form-control" placeholder="Enter blog title..." required>
                </div>

                <div class="form-group">
                    <label for="product_stock" class="form-label">Blog Content</label>
                    <textarea id="product_stock" name="product_stock" class="form-control" placeholder="Enter blog content..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="bi bi-plus-circle"></i> Create Blog Post
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>