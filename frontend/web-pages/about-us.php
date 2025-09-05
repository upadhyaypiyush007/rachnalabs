<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rachana Diagnostic and Health Care</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #ff6b35;
            --green-accent: #a8d5a8;
            --text-dark: #333;
            --text-light: #666;
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
            background: #82c341;
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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/back2.png");
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

        /* About Section */

        .custom-image-wrapper {
            max-width: 500px;
        }

        .custom-img {
            height: 100%;
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





























        .flip-card {
            perspective: 1000px;
        }

        .flip-inner {
            position: relative;
            width: 100%;
            height: 400px;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }

        .flip-card:hover .flip-inner {
            transform: rotateY(180deg);
        }

        .card-face {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            backface-visibility: hidden;
            color: white;
            text-align: center;
            padding: 60px 20px 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            background-size: cover;
            background-position: center;
        }

        .card-front::before,
        .card-back::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
        }

        .card-front::before {
            background: rgba(0, 0, 0, 0.5);
            /* dark overlay */
        }

        .card-back::before {
            background: rgba(255, 255, 255, 0.3);
            /* brighter overlay */
        }

        .card-front,
        .card-back {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .card-front {
            z-index: 2;
        }

        .card-back {
            transform: rotateY(180deg);
        }

        .card-face h5,
        .card-face p {
            z-index: 2;
            position: relative;
        }

        .card-face h5 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .card-face p {
            font-size: 15px;
            line-height: 1.5;
        }

        .vmg-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .vmg-card {
            position: relative;
            background: #a8d4a8;
            border-radius: 0 0 20px 20px;
            padding: 80px 30px 40px;
            text-align: center;
            color: white;
            font-weight: 500;
            line-height: 1.6;
            margin-bottom: 30px;
            min-height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .vmg-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(168, 212, 168, 0.4);
        }

        /* Icon Container */
        .icon-container {
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 0 0 50% 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }



        /* Card Titles */
        .vmg-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: white;
        }

        /* Card Content */
        .vmg-content {
            font-size: 1rem;
            line-height: 1.7;
            color: white;
            opacity: 0.95;
        }


        /* Responsive Design */

        @media (max-width: 767.98px) {
            body {
                padding: 40px 0;
            }

            .vmg-card {
                padding: 60px 20px 30px;
                min-height: 280px;
                margin-bottom: 35px;
            }

            .vmg-title {
                font-size: 1.4rem;
                margin-bottom: 15px;
            }

            .vmg-content {
                font-size: 0.9rem;
                line-height: 1.6;
            }

            .icon-container {
                width: 60px;
                height: 60px;
                top: -15px;
            }

            .vmg-icon {
                font-size: 1.5rem;
            }


        }


        /* Visit Lab Section */
        .visit-lab-section {
            background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/adv-all.png');
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

        .text-black-custom {
            color: #212121;
        }

        .text-red-custom {
            color: #e53e3e;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-bold {
            font-weight: 700;
        }

        .text-lg {
            font-size: 14px;
        }

        .text-xl {
            font-size: 14px;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .leading-relaxed {
            line-height: 1;
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

            .image-used {
                width: 100%;
                margin-left: auto;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .visit-lab-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
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
                        <a class="nav-link active" href="about-us.php">About</a>
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
                <h1 class="hero-title">ABOUT US</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <div class="container mt-5 d-flex justify-content-center">
        <div class="position-relative custom-image-wrapper">
            <!-- Background Shapes -->
            <div class="bg-shape shape-top-right"></div>
            <div class="bg-shape shape-bottom-left"></div>

            <!-- Main Image -->
            <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/back-all.png" alt="Blood Test" class="img-fluid custom-img rounded-4">
        </div>
        <div class="col-lg-6" style="margin-left: 10%;">
            <h2 class="display-5 fw-bold mb-4">About Us</h2>
            <p class="lead" style="font-size: 16px;">
                Rachana Diagnostic and Health Care is one of the new emerging Health Centre in the city of Bangalore, established by DR. SHARANABASAPPA and Mr. CHANDRASEKAR B in the year 2022 with an aim to provide comprehensive, timely and quality health care services. Our Health Centre is synonym with the best Phlebotomy, Nursing and Physiotherapy services rendered by our specialized staff. Every person who seeks services at our health center, walk out with the best experiences. Reinforced by code of ethics and professional standards, the bottom line of our successful growth lies in making healthcare easily accessible and affordable to all</p>
            <h1 class="text-xl font-bold text-black-custom mb-4 leading-relaxed">Management Profile:</h1>

            <p class="text-lg font-semibold text-red-custom mb-2 leading-relaxed">Dr SHARANABASAPPA M.B.B.S., M.D. RADIOLOGY</p>
            <p class="text-lg text-black-custom mb-2 leading-relaxed">Director</p>
            <p class="text-lg text-black-custom mb-2 leading-relaxed">Consultant RADIOLAGIST</p>
            <p class="text-lg text-black-custom mb-4 leading-relaxed">having an experience 9+ years in the field of radiology.</p>

            <p class="text-lg font-semibold text-red-custom mb-2 leading-relaxed">Mr. CHANDRASEKAR B M.Pharm</p>
            <p class="text-lg text-black-custom mb-2 leading-relaxed">Director</p>
            <p class="text-lg text-black-custom leading-relaxed">Very soft highly experienced with 12+ years in the field of pharmacy.</p>
            <button class="btn btn-primary btn-lg">Read More</button>
        </div>
    </div>


    <div class="container">
        <div class="vmg-container" style="margin-top: 5%;">
            <div class="row">
                <!-- Our Vision Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="vmg-card">
                        <div class="icon-container">
                            <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/v-2.png">
                        </div>
                        <h3 class="vmg-title">Our Vision</h3>
                        <p class="vmg-content">
                            Be the most trusted healthcare partner, enabling healthier lives
                        </p>
                    </div>
                </div>

                <!-- Our Mission Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="vmg-card">
                        <div class="icon-container">
                            <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/v-3.png">
                        </div>
                        <h3 class="vmg-title">Our Mission</h3>
                        <p class="vmg-content">
                            To be the undisputed market leader by providing accessible, affordable, timely and quality healthcare diagnostics, applying insights and cutting edge technology to create value for all stakeholders.
                        </p>
                    </div>
                </div>

                <!-- Our Goal Card -->
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="vmg-card">
                        <div class="icon-container">
                            <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/v-4.png">
                        </div>
                        <h3 class="vmg-title">Our Goal</h3>
                        <p class="vmg-content">
                            To deliver high quality medical care in a patient friendly cost-effective manner using innovative spaces and technology.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5">Our Core Values</h2>
        <div class="row g-4 justify-content-center">

            <!-- Card 1 -->
            <div class="col-md-6 col-lg-3 flip-card">
                <div class="flip-inner">
                    <div class="card-face card-front" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val-5.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/1.png"></div>
                        <h5>Patient Centricity</h5>
                        <p>Commit to best outcomes and experience for our patients. Treat patients and their caregivers with compassion, care.</p>
                    </div>
                    <div class="card-face card-back" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val-5.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/1.png"></div>
                        <h5>We Put Patients First</h5>
                        <p>Our patients’ needs come before all. We ensure empathy and clinical excellence in everything we do.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-3 flip-card">
                <div class="flip-inner">
                    <div class="card-face card-front" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val2.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/2.png"></div>
                        <h5>Integrity</h5>
                        <p>Be principled, open and honest. Model and live our 'Values'. Demonstrate moral courage.</p>
                    </div>
                    <div class="card-face card-back" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val2.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/2.png"></div>
                        <h5>Do The Right Thing</h5>
                        <p>Speak up and uphold trust. Even when no one is watching.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-3 flip-card">
                <div class="flip-inner">
                    <div class="card-face card-front" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val3.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/3.png"></div>
                        <h5>Ownership</h5>
                        <p>Be responsible and take pride in our actions. Deliver commitment and agreement made.</p>
                    </div>
                    <div class="card-face card-back" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val3.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/3.png"></div>
                        <h5>Lead with Accountability</h5>
                        <p>Take initiative. Go beyond. Own your impact.</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-6 col-lg-3 flip-card">
                <div class="flip-inner">
                    <div class="card-face card-front" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val4.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/4.png"></div>
                        <h5>Innovation</h5>
                        <p>Continuously improve and innovate to exceed expectations. Challenge ourselves to do things differently.</p>
                    </div>
                    <div class="card-face card-back" style="background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/val4.png');">
                        <div class="icon-box"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/4.png"></div>
                        <h5>Think Differently</h5>
                        <p>Push boundaries. Stay curious. Solve problems with purpose.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Visit Lab Section -->
    <section class="visit-lab-section">
        <div class="container">
            <h2 class="visit-lab-title">Visit our lab and feel our care!</h2>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   

</body>

</html>