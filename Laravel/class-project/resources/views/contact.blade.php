<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Contact Form</title>
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
            max-width: 1400px;
            margin: 0 auto;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
        }

        .header {
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 0;
        }

        .form-section {
            padding: 40px 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }

        .required {
            color: #e74c3c;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafbfc;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2196F3;
            background: white;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
            transform: translateY(-2px);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input[type="checkbox"] {
            width: auto;
            margin: 0;
            transform: scale(1.2);
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-item input[type="radio"] {
            width: auto;
            margin: 0;
            transform: scale(1.2);
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: block;
            padding: 15px;
            border: 2px dashed #2196F3;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9ff;
        }

        .file-upload-label:hover {
            background: #e3f2fd;
            border-color: #1976d2;
        }

        .file-list {
            margin-top: 10px;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 8px;
            display: none;
        }

        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

        .file-item:last-child {
            border-bottom: none;
        }

        .remove-file {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .submit-btn {
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            color: white;
            padding: 18px 50px;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(33, 150, 243, 0.3);
            margin-right: 15px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(33, 150, 243, 0.4);
        }

        .reset-btn {
            background: #6c757d;
            color: white;
            padding: 18px 30px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .reset-btn:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .map-section {
            background: #f8f9fa;
            padding: 40px 30px;
            border-left: 1px solid #e1e8ed;
        }

        .map-container {
            width: 100%;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
        }

        .map-placeholder::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 20px,
                    rgba(255, 255, 255, 0.1) 20px,
                    rgba(255, 255, 255, 0.1) 40px);
            animation: mapAnimation 10s linear infinite;
        }

        @keyframes mapAnimation {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .contact-info {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .contact-info h3 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #666;
        }

        .contact-icon {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
        }

        .success-message {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: none;
            animation: slideIn 0.5s ease;
        }

        .error-message {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
            font-size: 0.9rem;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e1e8ed;
            border-radius: 4px;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            width: 0%;
            transition: width 0.3s ease;
            border-radius: 4px;
        }

        .section-title {
            font-size: 1.4rem;
            color: #333;
            margin: 30px 0 20px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #2196F3;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: #21CBF3;
        }

        @media (max-width: 1024px) {
            .content {
                grid-template-columns: 1fr;
            }

            .map-section {
                border-left: none;
                border-top: 1px solid #e1e8ed;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 2.2rem;
            }

            .form-section,
            .map-section {
                padding: 30px 20px;
            }

            .radio-group,
            .checkbox-group {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <x-navbar />
    <div class="container">
        <div class="header">
            <h1>Complete Contact Form</h1>
            <p>Fill out our comprehensive form to get in touch. We'll respond within 24 hours.</p>
        </div>

        <div class="content">
            <div class="form-section">
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>

                <div class="success-message" id="successMessage">
                    <h3>✅ Thank you for your submission!</h3>
                    <p>We've received your information and will get back to you within 24 hours.</p>
                </div>

                <div class="error-message" id="errorMessage"></div>

                <form id="contactForm" action="/submit-contact" method="post">

                    @csrf
                    <div class="section-title">Personal Information</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567">
                        </div>

                    </div>





                    <div class="form-group">
                        <label for="message">Detailed Message <span class="required">*</span></label>
                        <textarea id="message" name="message"
                            placeholder="Please provide detailed information about your inquiry..." required></textarea>
                    </div>







                    <div style="margin-top: 40px;">
                        <button type="submit" class="submit-btn">Send Complete Form</button>
                    </div>
                </form>
            </div>

            <div class="map-section">
                <div class="map-container">
                    <div class="map-placeholder">
                        <div style="text-align: center; z-index: 1;">
                            <div style="font-size: 2rem; margin-bottom: 10px;">📍</div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.6657476767673!2d67.11858447541567!3d24.90938057789754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb339203217ff53%3A0xb7f4cf18c2c07151!2sAPTECH%20COMPUTER%20EDUCATION!5e0!3m2!1sen!2s!4v1750245690398!5m2!1sen!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <div class="contact-info">
                    <h3>Contact Information</h3>

                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div>123 Business Street<br>Suite 456<br>City, State 12345</div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div>+1 (555) 123-4567</div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">✉️</div>
                        <div>contact@yourbusiness.com</div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">🌐</div>
                        <div>www.yourbusiness.com</div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">🕒</div>
                        <div>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM<br>Sun: Closed</div>
                    </div>
                </div>

                <div class="contact-info" style="margin-top: 20px;">
                    <h3>Emergency Contact</h3>

                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div>+1 (555) 987-6543</div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">✉️</div>
                        <div>urgent@yourbusiness.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>