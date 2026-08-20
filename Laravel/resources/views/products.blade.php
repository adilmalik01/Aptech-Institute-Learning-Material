<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Cards</title>
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
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            margin-top: 40px;
            color: white;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            padding: 1rem 0;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #f0f2f5, #e1e8ed);
            border-radius: 15px;
            margin-bottom: 1.5rem;
            display: flex;

            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #667eea;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 300px;
        }


        .product-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .product-description {
            font-size: 0.95rem;
            color: #718096;
            margin-bottom: 1rem;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .product-category {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-stock {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #4a5568;
        }

        .stock-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #48bb78;
        }

        .stock-indicator.low {
            background: #ed8936;
        }

        .stock-indicator.out {
            background: #f56565;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: #667eea;
        }

        .add-to-cart {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .add-to-cart:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .product-card {
                padding: 1.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <x-navbar />
    <div class="container">
        <div class="header">
            <h1>Our Products</h1>
            <p>Discover amazing products crafted with care</p>
        </div>

        <div class="products-grid">
            @foreach ($productsData as $product)

                <div class="product-card">
                    <div class="product-image">
                        <img src={{ asset($product['product_image']) }} alt="">
                    </div>
                    <h2 class="product-name">{{$product['product_name']}}</h2>
                    <p class="product-description">{{$product['product_description']}}</p>
                    <div class="product-meta">
                        <span class="product-category">{{$product['product_category']}}</span>
                        <div class="product-stock">
                            <div class="stock-indicator"></div>
                            <span>{{$product['product_stock']}} in stock</span>
                        </div>
                    </div>
                    <div class="product-footer">
                        <div class="product-price">{{$product['product_price']}}</div>

                        <a href="/product/{{$product['id'] }}" class="add-to-cart"><i class="bi bi-eye"></i></a>

                        <a href="/delete/{{$product['id'] }}" class="add-to-cart"><i class="bi bi-trash-fill"></i></a>
                        <a href="/edit-product/{{$product['id'] }}" class="add-to-cart"><i
                                class="bi bi-pencil-fill"></i></a>


                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>