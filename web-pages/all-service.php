<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Rachana Diagnostic and Health Care</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #ff6b35;
            --green-accent: #a8d5a8;
            --text-dark: #333;
            --text-light: #666;
            --card-bg: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Top Header */
        .top-header {
            background: #8bc34a;
            padding: 8px 0;
            font-size: 14px;
        }

        .top-header .contact-info {
            color: var(--text-dark);
        }

        .top-header .social-links a {
            color: var(--text-dark);
            margin: 0 8px;
            text-decoration: none;
        }

        .submit-feedback-btn {
            background: #e74c3c;
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 12px;
        }

        /* Navigation */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .navbar-brand img {
            height: 50px;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 15px;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link.active {
            color: var(--secondary-color) !important;
            border-bottom: 2px solid var(--secondary-color);
        }

        /* Hero Section */
        .hero-section {
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/back-all.png");
            background-size: cover;
            background-position: center;
            height: 67.5vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-content {
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--secondary-color);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .breadcrumb-custom {
            background: none;
            color: white;
            justify-content: center;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: white;
            text-decoration: none;
        }

        .services-section {
            background-color: #F5FCFF;
            /* Light blue background for services section */
            padding: 40px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }

        .services-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #212121;
            margin-bottom: 20px;
        }

        .services-text {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            padding: 0 15px;
        }

        .services-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .services-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .services-title {
                font-size: 1.8rem;
            }

            .services-text {
                font-size: 1rem;
            }
        }

        /* Services Section */
        .service-card {
            display: flex;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: relative;
            min-height: 220px;
        }

        .service-image {
            width: 50%;
            object-fit: cover;
        }

        .service-content {
            padding: 25px 20px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 4px solid #e2f2ea;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .service-icon img {
            width: 28px;
            height: 28px;
        }

        .service-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .service-text {
            color: #6c757d;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .service-card {
                flex-direction: column;
                min-height: auto;
            }

            .service-image,
            .service-content {
                width: 100%;
            }

            .service-icon {
                top: 90px;
            }
        }



        /* Health CTA Section */
 .health-cta-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 0;
            overflow: hidden;
            position: relative;
        }

        .health-cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(52, 152, 219, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
        }

        .health-cta-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 107, 53, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
        }

        .content-wrapper {
            position: relative;
            z-index: 2;
        }

        /* Doctor Image Styles */
        .doctor-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .doctor-image {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .doctor-image:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        /* Floating Elements */
        .floating-icon {
            position: absolute;
            background: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
        }

        .floating-icon.icon-1 {
            top: 20%;
            right: 10%;
            animation-delay: 0s;
        }

        .floating-icon.icon-2 {
            bottom: 30%;
            left: 5%;
            animation-delay: 1s;
        }

        .floating-icon.icon-3 {
            top: 60%;
            right: 20%;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Content Card Styles */
        .content-card {
            background:#F5801E66;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        }

        /* Typography */
        .main-heading {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .main-heading::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--secondary-color);
            margin-top: 15px;
            border-radius: 2px;
        }

        .subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .description {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 15px;
            line-height: 1.7;
        }

        .highlight-text {
            font-size: 1.1rem;
            color: var(--text-dark);
            font-weight: 600;
            margin-top: 20px;
        }


        /* Responsive Design */
        
        /* Large Devices (1200px and up) */
        @media (min-width: 1200px) {
            .main-heading {
                font-size: 2.8rem;
            }
            
            .content-card {
                padding: 50px;
            }
        }

        /* Medium Devices (768px to 1199px) - Tablets */
        @media (min-width: 768px) and (max-width: 1199.98px) {
            .health-cta-section {
                padding: 60px 0;
            }
            
            .main-heading {
                font-size: 2.2rem;
            }
            
            .content-card {
                padding: 35px;
                margin-top: 30px;
            }
            
        }

        /* Small Devices (576px to 767px) - Mobile Landscape */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .health-cta-section {
                padding: 50px 0;
            }
            
            .main-heading {
                font-size: 2rem;
                text-align: center;
            }
            
            .subtitle {
                font-size: 1.1rem;
                text-align: center;
            }
            
            .description {
                text-align: center;
            }
            
            .content-card {
                padding: 30px;
                margin-top: 30px;
                text-align: center;
            }
        
        }


        /* FAQ Section */
 .faq-section {
            padding: 60px 0;
            background-color: #f0f4f8;
        }

        .faq-title {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 50px;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .faq-question {
            padding: 20px 25px;
            background: white;
            cursor: pointer;
            border: none;
            width: 100%;
            text-align: left;
            font-size: 16px;
            font-weight: 500;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .faq-question:hover {
            background-color: #f8f9fa;
        }

        .faq-question.active {
            background-color: #f8f9fa;
        }

        .faq-icon {
            font-size: 18px;
            color: #666;
            transition: transform 0.3s ease;
        }

        .faq-question.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 25px;
            background: white;
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-answer.show {
            max-height: 200px;
            padding: 20px 25px;
        }

        .plus-icon::before {
            content: "+";
        }

        .minus-icon::before {
            content: "×";
        }

        @media (max-width: 768px) {
            .faq-section {
                padding: 40px 0;
            }
            
            .faq-title {
                font-size: 28px;
                margin-bottom: 30px;
            }
            
            .faq-question {
                padding: 15px 20px;
                font-size: 15px;
            }
            
            .faq-answer {
                padding: 0 20px;
                font-size: 14px;
            }
            
            .faq-answer.show {
                padding: 15px 20px;
            }
        }
        .book-now-section {
            text-align: center;
            margin: 50px 0;
        }

        .book-now-btn {
            background: var(--primary-color);
            color: white;
            padding: 15px 40px;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .book-now-btn:hover {
            background: #1e3d6f;
            color: white;
            text-decoration: none;
        }

        /* Visit Lab Section */
        .visit-lab-section {
            background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/lab.png');
            padding: 100px 0;
            text-align: center;
            position: relative;
            margin-bottom: 5%;
        }

        .visit-lab-title {
            font-size: 3rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Footer */

        .footer-section {
            background-color: #b8d4a0;
            padding: 50px 0 20px 0;
        }

        .footer-bottom {
            background-color: #8bc34a;
            padding: 15px 0;
            text-align: center;
        }

        .section-title {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
        }

        .location-info {
            color: #333;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #333;
            font-size: 14px;
        }

        .contact-item i {
            margin-right: 10px;
            width: 20px;
            font-size: 16px;
        }

        .quick-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .quick-links li {
            margin-bottom: 12px;
        }

        .quick-links li a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .quick-links li a:hover {
            color: #666;
        }

        .quick-links li a::before {
            content: "▶";
            margin-right: 10px;
            font-size: 10px;
            color: #666;
        }

        .hours-info {
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }

        .hours-info strong {
            font-weight: bold;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .footer-logo {
            height: 80px;
        }

        .logo-blue {
            color: #2196f3;
        }

        .logo-red {
            color: #ff6b35;
        }

        .logo-subtitle {
            font-size: 12px;
            color: #666;
            font-weight: normal;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
        }

        .facebook {
            background-color: #1877f2;
        }

        .youtube {
            background-color: #ff0000;
        }

        .instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }

        .copyright-text {
            color: #333;
            font-size: 13px;
            margin: 0;
        }

        .copyright-text a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }

        .copyright-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .footer-section {
                padding: 30px 0 15px 0;
            }

            .section-title {
                font-size: 18px;
                margin-bottom: 20px;
            }

            .footer-logo {
                height: 30px;
            }

            .social-icons {
                margin-top: 15px;
            }
        }



        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .services-title {
                font-size: 2rem;
            }

            .health-cta-content {
                flex-direction: column;
                text-align: center;
            }

            .health-cta-image {
                flex: none;
            }

            .health-cta-title {
                font-size: 2rem;
            }

            .visit-lab-title {
                font-size: 2rem;
            }
            .image-used{
                width: 100%;
                margin-left:auto;
            }
        }

        .image-used{
            margin-left: 12%;
        }
    </style>
</head>
<!-- Top Header -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="contact-info">
                    <i class="fas fa-envelope me-2"></i>rachanalabs.in
                    <span class="ms-4">
                        <i class="fas fa-clock me-2"></i>Mon - Sat: 7:00 am - 9:00 pm | Sun: 7:00 am - 1:00 pm
                    </span>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="social-links d-inline-block me-3">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <a href="#" class="submit-feedback-btn">Submit Feedback</a>
            </div>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
       

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown">Service</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="all-service.php">All Service</a></li>
                        <li><a class="dropdown-item" href="blood-test.php">Blood Test</a></li>
                        <li><a class="dropdown-item" href="droppler-imaging-service.php">Droppler Imaging</a></li>
                        <li><a class="dropdown-item" href="ecg-test.php">ECG Test</a></li>
                        <li><a class="dropdown-item" href="physiotherapy-test.php">Physiotherapy Test</a></li>
                        <li><a class="dropdown-item" href="nursing-services.php">Nursing Services</a></li>
                        <li><a class="dropdown-item" href="ultrasound-scan.php">Ultrasound Scan</a></li>
                        <li><a class="dropdown-item" href="vaccination-services.php">Vaccination Services</a></li>
                        <li><a class="dropdown-item" href="health-packages.php">Health Packages</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="video-consultation.php">Video Consultation</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="book-a-test.php">Book A Test</a>
                </li>
                <a class="navbar-brand" href="#">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/logo.png" class="logo" alt="Logo"></a>
                    <li class="nav-item">
                    <a class="nav-link" href="doctors.php">Our Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="careers.php">Careers</a>
                </li>
            </ul>
            <div class="d-flex ms-3">
                <input class="form-control" type="search" placeholder="Search">
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">ALL SERVICES</h1>
            <nav class="breadcrumb-custom">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">Service</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Services Section -->
<div class="services-section">
    <h2 class="services-title">Services We Provide</h2>
    <p class="services-text">We provide excellent services for your ultimate good health. We have included all the services provided by us for your reference.</p>
    <p class="services-text">To check the list of tests we provide and the corresponding prices please <a href="#" class="services-link">click here.</a></p>

    <div class="container my-5">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser3.png" alt="ECG" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">ECG</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ecg.png" alt="ECG Icon">
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser2.png" alt="Blood Test" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">Blood Test</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/blood.png" alt="Blood Icon">
                    </div>

                </div>

            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser1.png" alt="Ultrasound" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">Ultrasound</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/drop.png" alt="Ultrasound Icon">
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser4.png" alt="Vaccination" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">Vaccination</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ultra.png" alt="Vaccination Icon">
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser2.png" alt="X-Ray" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">X-Ray</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/vacc.png" alt="X-Ray Icon">
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser1.png" alt="Consultation" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">Consultation</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/nur.png" alt="Consultation Icon">
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser5.png" alt="Emergency Care" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">Emergency Care</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
                        <button type="button" class="btn btn-danger">Click for Details</button>
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/health.png" alt="Emergency Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/Frame-27.png" alt="Nurse pointing" class="image-used" > -->
  <section class="health-cta-section">
        <div class="container content-wrapper">
            <div class="row align-items-center">
                <!-- Doctor Image Column -->
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="doctor-image-container fade-in">
                        <!-- Using a placeholder image that represents the healthcare professional -->
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/nurse.png" 
                             alt="Healthcare Professional" 
                             class="doctor-image">
                        
                        <!-- Floating Medical Icons -->
                        <div class="floating-icon icon-1">
                            <i class="fas fa-heartbeat text-danger"></i>
                        </div>
                        <div class="floating-icon icon-2">
                            <i class="fas fa-user-md text-primary"></i>
                        </div>
                        <div class="floating-icon icon-3">
                            <i class="fas fa-stethoscope text-success"></i>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="content-card fade-in">
                        <h1 class="main-heading">Don't Let Your Health Take a Backseat!</h1>
                        
                        <p class="subtitle">Schedule an appointment with Rachana Healthcare and Diagnostic today!</p>
                        
                        <p class="description">
                            Our team of experienced medical professionals is dedicated to providing you with quality care and accurate diagnostics.
                        </p>
                        
                        <p class="description">
                            We offer a wide range of healthcare services tailored to meet your needs.
                        </p>
                        
                        <p class="highlight-text">
                            Your health is our priority—book your visit with us now!
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="faq-title">FAQ</h2>
            
            <div class="faq-container">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>What types of samples can be collected from home?</span>
                        <span class="faq-icon plus-icon"></span>
                    </button>
                    <div class="faq-answer">
                       Samples like blood, urine, and swabs can be collected from the comfort of your home by trained phlebotomists.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <button class="faq-question active" onclick="toggleFAQ(this)">
                        <span>Is home sample collection safe and hygienic?</span>
                        <span class="faq-icon minus-icon"></span>
                    </button>
                    <div class="faq-answer show">
                        Yes, all our staff follow strict hygiene and safety protocols using sterilized equipment and PPE kits.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>Do I need to fast before giving a blood sample?</span>
                        <span class="faq-icon plus-icon"></span>
                    </button>
                    <div class="faq-answer">
                       Some tests require fasting. Our team will guide you on the pre-test instructions while scheduling.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>How do I schedule a home sample collection?</span>
                        <span class="faq-icon plus-icon"></span>
                    </button>
                    <div class="faq-answer">
                        You can schedule via our website, mobile app, or by calling our support center.
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>When will I get the test reports?</span>
                        <span class="faq-icon plus-icon"></span>
                    </button>
                    <div class="faq-answer">
                       Most reports are available within 24-48 hours. You’ll be notified as soon as they are ready.
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>Is there an extra charge for home sample collection?</span>
                        <span class="faq-icon plus-icon"></span>
                    </button>
                    <div class="faq-answer">
                       There may be a minimal fee based on your location. Our team will inform you beforehand.
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Footer -->
<!-- Footer Section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <!-- Location Column -->
                        <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="section-title">Location</h4>
                    <div class="location-info">
                        <div class="contact-item">
                            <div>
                                <i class="fas fa-map-marker-alt"></i>

                                Location 1 :No 1 & 2 Ground Floor, 1st <br>
                                Cross,Sri Manjunatha Layout, Kodigehalli,<br>
                                (Opp to Radiant Silver Bell apartment)<br>
                                Bengaluru, Karnataka 560067
                                <br>
                                <i class="fas fa-map-marker-alt"></i>

                                Location 2 : 2nd floor, Lift Available,<br>
                                Vikayth Aeris, no 1, ayyapanagar main<br>
                                road, above Kanti sweets Kodgehalli, Alfa<br>
                                Gardens, Krishnarajapuram, Bangalore,<br>
                                Bengaluru, Karnataka 560036
                                <br>
                                <i class="fas fa-map-marker-alt"></i>

                                Location 3 : Shop No 134,5th cross, ITPL,<br>
                                Main Rd, next to SANGEETHA MOBILES,<br>
                                opp. MAYURA SAGAR, Kundalahalli Colony<br>
                                Brookefield, Bengaluru, Karnataka 560037
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>+91 7299886984</div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>rachanalabs.in</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="section-title">Quick Links</h4>
                    <ul class="quick-links">
                        <li><a href="about-us.php">About</a></li>
                        <li><a href="all-service.php">Services</a></li>
                        <li><a href="video-consultation.php">Video Consultation</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="book-a-test.php">Book a Test</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
                        <li><a href="terms.php">Terms & Conditions</a></li>
                        <li><a href="return.php">Return & Refund Policy</a></li>
                    </ul>
                </div>
            

            <!-- Open Hours Column -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h4 class="section-title">Open Hours</h4>
                <div class="hours-info">
                    <p><strong>Monday to Saturday:</strong> 7:00 am - 9:00 pm</p>
                    <p><strong>Sunday:</strong> 7:00 am - 1:00 pm</p>
                </div>
            </div>

            <!-- Logo and Social Media Column -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="logo-section">

                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/logo.png" class="footer-logo" alt="Logo" alt="Rachana">

                    <div class="logo-subtitle">Diagnostics and Health care</div>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-icon instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Bottom -->
<div class="footer-bottom">
    <div class="container">
        <p class="copyright-text">
            <b> Copyright © 2025 Rachana. All Rights Reserved. &nbsp;&nbsp;
                Designed & Developed by Pixelmax Softech</b>
        </p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
        function toggleFAQ(element) {
            const answer = element.nextElementSibling;
            const icon = element.querySelector('.faq-icon');
            
            // Close all other FAQs
            document.querySelectorAll('.faq-question').forEach(question => {
                if (question !== element) {
                    question.classList.remove('active');
                    question.querySelector('.faq-icon').className = 'faq-icon plus-icon';
                    question.nextElementSibling.classList.remove('show');
                }
            });
            
            // Toggle current FAQ
            element.classList.toggle('active');
            answer.classList.toggle('show');
            
            if (element.classList.contains('active')) {
                icon.className = 'faq-icon minus-icon';
            } else {
                icon.className = 'faq-icon plus-icon';
            }
        }
    </script>
</body>

</html>