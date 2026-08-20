<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail - Modern Store</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 30px 40px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .breadcrumb {
            opacity: 0.9;
            font-size: 1rem;
        }

        .product-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            padding: 60px 40px;
            align-items: start;
        }

        .product-image-section {
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.02);
        }

        .product-image::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            backdrop-filter: blur(10px);
        }

        .product-image::after {
            content: '📱';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 40px;
        }

        .image-thumbnails {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(45deg, #ff9a9e, #fecfef);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .thumbnail:hover,
        .thumbnail.active {
            border-color: #667eea;
            transform: scale(1.1);
        }

        .product-info {
            padding: 20px 0;
        }

        .product-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stars {
            color: #fbbf24;
            font-size: 1.2rem;
        }

        .rating-text {
            color: #64748b;
            font-size: 0.9rem;
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 25px;
        }

        .original-price {
            font-size: 1.2rem;
            color: #94a3b8;
            text-decoration: line-through;
            margin-left: 15px;
        }

        .product-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4a5568;
            margin-bottom: 30px;
            text-align: justify;
        }

        .product-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .meta-item {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            padding: 20px;
            border-radius: 16px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .meta-label {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .meta-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
        }

        .product-stock {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stock-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #10b981;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 40px;
        }

        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            flex: 1;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 2px solid #dc2626;
            min-width: 120px;
        }

        .btn-secondary:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-2px);
        }

        .product-tabs {
            background: #f8fafc;
            padding: 40px;
            border-top: 1px solid #e2e8f0;
        }

        .tabs {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .tab {
            padding: 12px 24px;
            background: transparent;
            border: none;
            font-size: 1.1rem;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .tab.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }

        .tab-content {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-radius: 12px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .product-detail {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 40px 20px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .product-name {
                font-size: 2rem;
            }

            .product-meta {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .tabs {
                flex-wrap: wrap;
                gap: 15px;
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container fade-in">
        <div class="header">
            <h1>Product Details</h1>
            <div class="breadcrumb">Home / Products /{{$product['product_name']}}</div>
        </div>

        <div class="product-detail">
            <div class="product-image-section">
                <div class="product-image"></div>
              
            </div>

            <div class="product-info">
                <h2 class="product-name">{{$product['product_name']}}</h2>

                <div class="product-rating">
                    <div class="stars">★★★★☆</div>
                    <span class="rating-text">(4.2 out of 5 - 127 reviews)</span>
                </div>

                <div class="product-price">
                   {{$product['product_price']}}
                </div>

                <p class="product-description">
                    {{$product['product_description']}}
                </p>

                <div class="product-meta">
                    <div class="meta-item">
                        <div class="meta-label">{{$product['product_category']}}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Availability</div>
                        <div class="meta-value">
                            <div class="product-stock">
                                <div class="stock-indicator"></div>
                                <span>{{$product['product_stock']}}</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>

</body>

</html>