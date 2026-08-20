<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - ShopHub</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-logo::before {
            content: '🛍️';
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .nav-links a.active {
            background: rgba(255, 255, 255, 0.25);
            font-weight: 600;
        }

        .nav-cta {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white !important;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.3);
        }

        .nav-cta:hover {
            background: linear-gradient(135deg, #38a169, #2f855a) !important;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(72, 187, 120, 0.4);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        /* Main Content */
        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            padding: 2rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .form-subtitle {
            text-align: center;
            color: #718096;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .form-grid {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            background: #ffffff;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-select {
            cursor: pointer;
        }

        .form-submit {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 1.25rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .form-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .form-submit:active {
            transform: translateY(-1px);
        }

        .required-asterisk {
            color: #e53e3e;
            margin-left: 2px;
        }

        /* Success Animation */
        .success-feedback {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #48bb78;
            color: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .success-feedback.show {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                background: rgba(102, 126, 234, 0.95);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 2rem 0;
                transition: all 0.3s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                margin: 0.5rem 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .nav-container {
                padding: 0 1rem;
            }

            .main-content {
                padding: 1rem;
            }

            .form-container {
                padding: 2rem 1.5rem;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-row {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="nav-logo">ShopHub</a>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="/">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="#">Service</a></li>

                <li><a href="#" class="nav-cta active">Add Product</a></li>
            </ul>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        </div>
    </nav>

    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">Add New Product</h1>
            <p class="form-subtitle">Create a new product listing for your store</p>
            
            <form class="form-grid" method="POST" action="/update-product/{{ $product['id'] }}" id="productForm">
                @csrf
                <div class="form-group">
                    <label for="product_name" class="form-label">
                        Product Name <span class="required-asterisk">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="product_name" 
                        id="product_name" 
                        value={{ $product['product_name'] }}
                        class="form-input"
                        placeholder="e.g., Premium Wireless Headphones" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="product_description" class="form-label">
                        Product Description <span class="required-asterisk">*</span>
                    </label>
                    <textarea 
                        name="product_description" 
                        id="product_description" 
                        value={{ $product['product_description'] }}
                        class="form-textarea"
                        placeholder="Describe your product features, benefits, and specifications..."
                        required
                    ></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="product_category" class="form-label">
                            Category <span class="required-asterisk">*</span>
                        </label>
                        <select name="product_category" id="product_category" class="form-select" required>
                            <option disabled selected value={{ $product['product_category'] }}>{{ $product['product_category'] }}</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Appliances">Appliances</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Fitness">Fitness</option>
                            <option value="Kitchen">Kitchen</option>
                            <option value="Books">Books</option>
                            <option value="Home & Garden">Home & Garden</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_price" class="form-label">
                            Price ($) <span class="required-asterisk">*</span>
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            min="0" 
                            value={{ $product['product_price'] }}
                            name="product_price" 
                            id="product_price" 
                            class="form-input"
                            placeholder="199.99" 
                            required
                        >
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="product_stock" class="form-label">
                            Stock Quantity <span class="required-asterisk">*</span>
                        </label>
                        <input 
                            type="number" 
                            step="1" 
                            min="0" 
                            name="product_stock" 
                            value={{ $product['product_stock'] }}
                            id="product_stock" 
                            class="form-input"
                            placeholder="50" 
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="form-submit">
                    Update Product
                </button>
            </form>

        </div>
    </div>

</body>
</html>