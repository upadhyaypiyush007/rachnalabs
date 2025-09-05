<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rachana - Medical Healthcare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-green: #8bc34a;
            --primary-orange: #ff9800;
            --primary-blue: #2196f3;
            --dark-text: #333;
            --light-text: #666;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/img1.png");

            background-size: cover;
            background-position: center;
            min-height: 67.5vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            z-index: 2;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("../Rachana-Healthcare/images/img1.png");
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            100% {
                transform: translateY(-20px) rotate(360deg);
            }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 300;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        @font-face {
            font-family: 'Ethnocentric';
            src: url('fonts/Ethnocentric.ttf') format('truetype');
        }

        .hero-subtitle {
            font-size: 4rem;
            font-weight: bold;
            font-family: 'Ethnocentric', sans-serif;
            color: #ff7f00;
            /* Bright orange like in your image */
            font-size: 60px;
            letter-spacing: 8px;
            text-transform: uppercase;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            line-height: 1.1;
        }

        .hero-description {
            font-size: 1.2rem;
            margin-bottom: 40px;
            max-width: 600px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-appointment {
            background: var(--primary-blue);
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-appointment:hover {
            background: #1976d2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
        }

        .btn-call {
            background: #dc3545;
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .btn-call:hover {
            background: #c82333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        /* Service Cards */
        .service-card {
            display: flex;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: relative;
            min-height: 220px;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: rgb(67, 67, 234);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: white;
            font-size: 24px;
        }






        .info-card {
            background-color: #dff2c3;
            border-radius: 20px;
            padding: 40px 30px 30px;
            position: relative;
            text-align: center;
            transition: box-shadow 0.3s ease;
            min-height: 250px;
        }

        .info-card:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: bold;
            margin-top: 30px;
        }

        .card-text {
            font-size: 15px;
            color: #333;
            margin-top: 10px;
        }

        /* About Section */

        .custom-image-wrapper {
            max-width: 500px;
        }

        .custom-img {
            width: 100%;
            border-radius: 20px;
            transform: rotate(-1.5deg);
            /* slight tilt */
            position: relative;
            z-index: 2;
        }

        /* Abstract shape styles */
        .bg-shape {
            position: absolute;
            background-color: #FDBE8D;
            /* Light orange shade */
            z-index: 1;
            border-radius: 20px;
        }

        /* Top-right square */
        .shape-top-right {
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            border-top-right-radius: 15px;
        }

        /* Bottom-left circle */
        .shape-bottom-left {
            bottom: -30px;
            left: -30px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }



        .appointment-box {
            max-width: 600px;
            margin: -121% -14%;
            padding: 16px;
            border-radius: 20px;
            background: transparent;
        }

        .appointment-box h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
            padding: 10px;
        }

        .upload-btn {
            border: 1px solid #ff6a00;
            color: #ff6a00;
            background-color: transparent;
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            font-weight: 500;
        }

        .upload-btn:hover {
            background-color: #ff6a00;
            color: #fff;
        }

        .submit-btn {
            background: linear-gradient(to right, #f44336, #e53935);
            color: white;
            padding: 12px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            width: 100%;
        }

        /* Services Grid */
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



        /* Testimonials */
        .testimonial-section {
            padding: 100px 0;
            background: #f8f9fa;
        }

        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            background: var(--success-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
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

        .logo {
            width: 9rem;
        }



        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .feedback-section {
            background-color: #eaf7fe;
            padding: 60px 0;
        }

        .feedback-text h3 {
            font-weight: 700;
        }

        .btn-red {
            background-color: #e53935;
            color: white;
            font-weight: 600;
        }

        .testimonial-section {
            padding: 80px 0;
            background-color: #f0f4f8;
            position: relative;
        }

        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 auto;
            max-width: 800px;
            position: relative;
            z-index: 2;
        }

        .testimonial-text {
            font-size: 18px;
            color: #333;
            line-height: 1.7;
            margin-bottom: 30px;
            font-style: italic;
        }

        .customer-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .customer-label {
            font-size: 16px;
            color: #8BC34A;
            font-weight: 500;
        }

        .navigation-section {
            text-align: center;
            margin-top: 40px;
        }

        .nav-arrow {
            background: none;
            border: none;
            font-size: 24px;
            color: #666;
            margin: 0 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .nav-arrow:hover {
            color: #333;
        }

        .slide-counter {
            font-size: 18px;
            color: #666;
            font-weight: 500;
        }

        /* Side Images */
        .side-images {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }

        .left-images {
            left: 50px;
        }

        .right-images {
            right: 50px;
        }

        .customer-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 3px solid white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            object-fit: cover;
            background-color: #ddd;
            position: relative;
        }

        .customer-avatar.active {
            border-color: #FF6B35;
            transform: scale(1.1);
        }

        /* Orange play/arrow icons */
        .avatar-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background-color: #FF6B35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 10px;
        }

        .avatar-container {
            position: relative;
            display: inline-block;
        }

        /* Stacked layout for side images */
        .left-images .avatar-container,
        .right-images .avatar-container {
            display: block;
            margin-bottom: 20px;
        }

        .left-images .avatar-container:nth-child(2) .customer-avatar {
            border-color: #FF6B35;
            transform: scale(1.1);
        }

        .right-images .avatar-container:nth-child(2) .customer-avatar {
            border-color: #FF6B35;
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .side-images {
                display: none;
            }

            .testimonial-card {
                margin: 0 20px;
                padding: 30px 20px;
            }

            .testimonial-text {
                font-size: 16px;
            }

            .customer-name {
                font-size: 20px;
            }
        }

        @media (max-width: 1200px) {
            .left-images {
                left: 20px;
            }

            .right-images {
                right: 20px;
            }

            .image-used {
                width: 100%;
                margin-left: auto;
            }
        }

        .stars {
            color: #ffa726;
            font-size: 24px;
            margin: 10px 0;
        }


        .carousel-caption {
            bottom: 20%;
            left: 10%;
            text-align: left;
        }

        .carousel-caption h1 {
            font-size: 48px;
            font-weight: bold;
            color: #ff6600;
        }

        .carousel-caption p {
            font-size: 18px;
            color: #fff;
        }

        .btn-custom {
            background-color: #ff5e5e;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            border-radius: 8px;
        }

        .carousel-indicators [data-bs-target] {
            background-color: #ff6600;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body>
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
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Service</a>
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
                        <a class="nav-link active" href="video-consultation.php">Video Consulation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book-a-test.php">Book A Test</a>
                    </li>
                    <a class="navbar-brand" href="#">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/logo.png" class="logo" alt="Logo"></a>
                    <li class="nav-item">
                        <a class="nav-link active" href="doctors.php">Our Doctors</a>
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





    <div id="labCarousel" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="4"></button>
        </div>

        <!-- Carousel items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="height:80vh;">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/img1.png" class="d-block w-100" alt="Lab Image 1">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <p>The Home of Your Hope</p>
                    <h1 class="hero-title">YOUR GOOD HEALTH IS OUR RESPONSIBILITY</h1>
                    <p>Get your appointment through online and remain safe at your home.<br>
                        Because your safety is our first priority.</p>
                    <button class="btn btn-primary ms-5 mt-3">Request Appointment</button>
                    <button class="btn btn-custom ms-3"><i class="bi bi-telephone-fill"></i> +91 7299886984</button>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="height:80vh;">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/img2.png" class="d-block w-100" alt="Lab Image 2">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <p>The Home of Your Hope</p>
                    <h1 class="hero-title">AFFORDABLE LAB TEST AT YOUR DOOR STEPS</h1>
                    <p>Book diagnostics with ease and get quick home sample collection.<br>
                        Fast, safe, and accurate results delivered.</p>
                    <button class="btn btn-primary ms-5 mt-3">Request Appointment</button>
                    <button class="btn btn-custom ms-3"><i class="bi bi-telephone-fill"></i> +91 7299886984</button>
                </div>
            </div>

            <div class="carousel-item" style="height:80vh;">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/img4.png" class="d-block w-100" alt="Lab Image 2">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <p>The Home of Your Hope</p>
                    <h1 class="hero-title">EXPERIENCE THE FUTURE OF HEALTHCARE</h1>
                    <p>Modern facilities and professional staff dedicated to your care.<br>
                        Stay confident with every diagnosis.</p>
                    <button class="btn btn-primary ms-5 mt-3">Request Appointment</button>
                    <button class="btn btn-custom ms-3"><i class="bi bi-telephone-fill"></i> +91 7299886984</button>
                </div>
            </div>

            <div class="carousel-item" style="height:80vh;">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/image 4.png" class="d-block w-100" alt="Lab Image 2">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <p>The Home of Your Hope</p>
                    <h1 class="hero-title">COMPASSIONATE CARE. MORDERN TECHNOLOGY</h1>
                    <p>Where care meets innovation to give you the best possible outcome.<br>
                        Your health journey begins here.</p>
                    <button class="btn btn-primary ms-5 mt-3">Request Appointment</button>
                    <button class="btn btn-custom ms-3"><i class="bi bi-telephone-fill"></i> +91 7299886984</button>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="height:80vh;">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/img3.png" class="d-block w-100" alt="Lab Image 3">
                <div class="overlay"></div>
                <div class="carousel-caption">
                    <p>The Home of Your Hope</p>
                    <h1 class="hero-title">EASY ONLINE BOOKINGS FOR PEACE OF MIND</h1>
                    <p>No waiting in lines—get tested from the comfort of your home.<br>
                        We’re just a click away.</p>
                    <button class="btn btn-primary ms-5 mt-3">Request Appointment</button>
                    <button class="btn btn-custom ms-3"><i class="bi bi-telephone-fill"></i> +91 7299886984</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="info-card">
                    <div class="icon-circle icon-blue">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/book.png">
                    </div>
                    <div class="card-title">Book a Test</div>
                    <div class="card-text">
                        Easily schedule lab tests online from a wide range of diagnostic options with fast turnaround times and accurate results.
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="info-card">
                    <div class="icon-circle icon-green">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/leaf.png">
                    </div>
                    <div class="card-title">Find Lab</div>
                    <div class="card-text">
                        Locate nearby certified diagnostic labs and collection centers with real-time availability and directions.
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="info-card">
                    <div class="icon-circle icon-yellow">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/chat.png">
                    </div>
                    <div class="card-title">Book a Home Visit</div>
                    <div class="card-text">
                        Get your lab tests done from the comfort of your home. Book a trained phlebotomist at your convenience.
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container mt-5 d-flex justify-content-center">
        <div class="position-relative custom-image-wrapper">
            <!-- Background Shapes -->
            <div class="bg-shape shape-top-right"></div>
            <div class="bg-shape shape-bottom-left"></div>

            <!-- Main Image -->
            <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/pic1.png" alt="Blood Test" class="img-fluid custom-img rounded-4">
        </div>
        <div class="col-lg-6" style="margin-left: 10%;">
            <h2 class="display-5 fw-bold mb-4">About Us</h2>
            <p class="lead">Rachana Healthcare has been a trusted name in medical services for over two decades, providing comprehensive healthcare solutions with cutting-edge technology and compassionate care.</p>
            <p>Our commitment to excellence drives us to continuously improve our services and maintain the highest standards of medical care. We believe in treating not just the condition, but the whole person.</p>
            <button class="btn btn-primary btn-lg">Read More</button>
        </div>
    </div>



    <!-- Appointment Form -->
    <section class="py-5">
        <div class="container">

            <div class="row">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/hello.png" class="" alt=" ">
                <div class="col-lg-4" style="margin-left: 8%;">
                    <div class="appointment-box shadow">
                        <h4>Book Your Appointment</h4>
                        <form>
                            <div class="mb-3">
                                <select class="form-select">
                                    <option selected disabled>Choose Test Category</option>
                                    <option value="blood">Blood Test</option>
                                    <option value="covid">COVID-19</option>
                                    <option value="urine">Urine Test</option>
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" placeholder="Select Date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Provide Additional tests is any (optional)">
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" class="upload-btn">Upload Prescription (Optional)</button>
                            </div>

                            <button type="submit" class="submit-btn">Book a Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="container mt-5 d-flex justify-content-center">

        <div class="col-lg-6">
            <h2 class="display-5 fw-bold mb-4">Rachna_Home Collection Services with Safe, Secure & Well Sanitized Equipments</h2>

            <p>Let Rachna Healthcare & Diagnostic take care of your health with our easy and hassle-free home sample collection services — all at affordable prices. We are a trusted pathology lab with millions of happy and satisfied customers. Call us today to book your convenient home collection service.</p>
            <button class="btn btn-danger btn-lg">Call us</button>
        </div>
        <div class="position-relative custom-image-wrapper" style="margin-left: 10%;">
            <!-- Background Shapes -->
            <div class="bg-shape shape-top-right"></div>
            <div class="bg-shape shape-bottom-left"></div>

            <!-- Main Image -->
            <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/lab2.png" alt="Blood Test" class="img-fluid custom-img rounded-4">
        </div>
    </div>

    <!-- Services Section -->

    <div class="container my-5">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/ser3.png" alt="ECG" class="service-image">
                    <div class="service-content">
                        <h5 class="service-title">ECG</h5>
                        <p class="service-text">We provide wide range of medical counselling by the professional doctor &</p>
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
                    </div>
                    <div class="service-icon">
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/health.png" alt="Emergency Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/doctor.png" alt="doctor" style="margin-left: 5%;" class="image-used">


    <!-- Feedback Section -->
    <section class="feedback-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-4 mb-md-0">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/feed1.png" class="img-fluid rounded mb-3" alt="Lab 1">
                    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/feed2.png" class="img-fluid rounded" alt="Lab 2" style="    margin-left: 40%;
    margin-top: -10%;">
                </div>
                <div class="col-md-7">
                    <div class="d-flex justify-content-between align-items-start">
                        <div style="margin-bottom: 35%;">
                            <h3>Got a Feedback?</h3>
                            <p class="mt-3">
                                Kindly take a moment to complete the feedback form and share your thoughts and experiences regarding our service.
                                Your valuable input helps us improve and serve you better.
                            </p>
                            <a href="#" class="btn btn-red mt-2">Submit Feedback</a>
                        </div>
                        <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/feed3.png" class="img-fluid ms-3" alt="Feedback Icon" style="max-width: 100px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <h3 class="fw-bold" style="margin-left: 35%;">What Our Patients Say</h3>
        <div class="stars" style="margin-left: 43%;">
            ★★★★★
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "Chandra Sir ki service hamesha excellent hoti hai. Woh hamesha appointment ka dhyan rakhte hain, samay ke bahut paband hain, aur unka vyavhaar bhi bahut hi vinamr aur samvedansheel hai. Unke saath kaam karna hamesha ek sukhad anubhav hota hai. Woh ek sach mein lovely insan hain jo professionalism ke saath-saath personal touch bhi rakhte hain."
                        </p>
                        <h4 class="customer-name">Arun Jha</h4>
                        <p class="customer-label">Happy Customer</p>
                    </div>
                </div>
            </div>

            <div class="navigation-section">
                <button class="nav-arrow">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <span class="slide-counter">1/6</span>
                <button class="nav-arrow">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="side-images left-images">
            <div class="avatar-container">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/user.png" alt="Customer 1" class="customer-avatar">
            </div>
            <div class="avatar-container">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/user2.png" alt="Customer 2" class="customer-avatar active">
            </div>
            <div class="avatar-container">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/user3.png" alt="Customer 3" class="customer-avatar">
            </div>
        </div>
        <div class="side-images right-images">
            <div class="avatar-container">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/user3.png" alt="Customer 4" class="customer-avatar">
            </div>
            <div class="avatar-container">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/user.png" alt="Customer 5" class="customer-avatar active">
            </div>
            <div class="avatar-container">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/user2.png" alt="Customer 6" class="customer-avatar">
            </div>
        </div>
    </section>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple testimonial navigation
        let currentSlide = 1;
        const totalSlides = 6;

        document.querySelector('.fa-chevron-left').parentElement.addEventListener('click', () => {
            currentSlide = currentSlide > 1 ? currentSlide - 1 : totalSlides;
            updateSlideCounter();
        });

        document.querySelector('.fa-chevron-right').parentElement.addEventListener('click', () => {
            currentSlide = currentSlide < totalSlides ? currentSlide + 1 : 1;
            updateSlideCounter();
        });

        function updateSlideCounter() {
            document.querySelector('.slide-counter').textContent = `${currentSlide}/${totalSlides}`;
        }
    </script>

</body>

</html>