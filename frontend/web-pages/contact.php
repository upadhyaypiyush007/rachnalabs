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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/contact-back.png");
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

 .info-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 1px solid #e9ecef;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        /* Location Pin Icon */
        .location-icon {
            width: 40px;
            height: 50px;
            background: #dc3545;
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            position: relative;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .location-icon::before {
            content: '';
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            position: absolute;
        }

        .location-icon::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-top: 12px solid #dc3545;
        }
 /* Phone Icon */
        .phone-icon {
            width: 45px;
            height: 45px;
            background: #dc3545;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transform: rotate(-15deg);
        }

        .phone-icon::before {
            content: '';
            width: 20px;
            height: 20px;
            border: 3px solid white;
            border-radius: 3px;
            position: absolute;
        }

        .phone-icon::after {
            content: '';
            width: 8px;
            height: 2px;
            background: white;
            border-radius: 1px;
            position: absolute;
            top: 12px;
        }

        /* Email Icon */
        .email-icon {
            width: 50px;
            height: 35px;
            background: #dc3545;
            border-radius: 5px;
            margin: 0 auto 20px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .email-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 50%;
            border-left: 25px solid transparent;
            border-right: 25px solid transparent;
            border-top: 17px solid white;
        }

        /* Card Content */
        .card-content {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
            text-align: center;
        }

        .card-title {
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .contact-info {
            color: #495057;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Responsive Design */
        @media (max-width: 1199.98px) {
            .info-card {
                padding: 25px 20px;
                min-height: 180px;
            }

            .card-content {
                font-size: 0.9rem;
            }
        }


        @media (max-width: 767.98px) {
            body {
                padding: 30px 0;
            }

            .info-card {
                padding: 20px 15px;
                margin-bottom: 20px;
                min-height: 140px;
            }

            .card-content {
                font-size: 0.85rem;
                line-height: 1.5;
            }

            .contact-info {
                font-size: 1rem;
            }

            .location-icon,
            .phone-icon,
            .email-icon {
                margin-bottom: 12px;
                transform: scale(0.8);
            }

            .phone-icon {
                transform: rotate(-15deg) scale(0.8);
            }
        }

 
        .contact-form-section {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            margin-top: 5%;
            margin-left: 10%;
            padding: 40px;
        }

        .contact-form-left {
            flex: 1;
            min-width: 300px;
            background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/contact-image.png');
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            margin-right: 30px;
        }

        .contact-form-right {
            flex: 1;
            min-width: 300px;
            padding-left: 30px;
        }

        .section-heading {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label-custom {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control-custom,
        .form-select-custom {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-size: 0.95rem;
            box-shadow: none;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            border-color: #88b0d1;
            box-shadow: 0 0 0 0.25rem rgba(136, 176, 209, 0.25);
        }

        .btn-send-message {
            background-color: var(--secondary-color);
            color: #fff;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-send-message:hover {
            background-color: #d15a2c;
            color: #fff;
        }

        .map-section {
            margin-top: 50px;
            text-align: center;
            margin-bottom: 5%;
        }

        .map-section iframe {
            width: 100%;
            height: 450px;
            border: 0;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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

            .info-card {
                width: 100%;
                margin-bottom: 50px;
            }

            .contact-form-section {
                padding: 20px;
            }

            .contact-form-left,
            .contact-form-right {
                padding-right: 0;
                padding-left: 0;
                min-width: unset;
                width: 100%;
            }

            .contact-form-left {
                margin-right: 0;
                margin-bottom: 30px;
            }
                .image-used{
                width: 100%;
                margin-left:auto;
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
                        <a class="nav-link active" href="contact.php">Contact</a>
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
                <h1 class="hero-title">CONTACT</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="info-container" style="margin-top: 5%;">
            <div class="row">
                <!-- Location 1 -->
                <div class="col-xl-2-4 col-lg-4 col-md-6 col-12">
                    <div class="info-card">
                        <div class="location-icon"></div>
                        <div class="card-content">
                            <div class="card-title">Location 1 :</div>
                            Shop No.134,5th Cross,Kundalahalli Colony (Opp Mayura Sagar, ITPL Main Road) Bengaluru, Karnataka 560037
                        </div>
                    </div>
                </div>

                <!-- Location 2 -->
                <div class="col-xl-2-4 col-lg-4 col-md-6 col-12">
                    <div class="info-card">
                        <div class="location-icon"></div>
                        <div class="card-content">
                            <div class="card-title">Location 2 :</div>
                            2nd floor, Lift Available, Vikayth Aeris, no 1, ayyapanagar main road, above Kanti sweets Kodgehalli, Alfa Gardens, Krishnarajapuram, Bangalore, Bengaluru, Karnataka 560036
                        </div>
                    </div>
                </div>

                <!-- Location 3 -->
                <div class="col-xl-2-4 col-lg-4 col-md-6 col-12">
                    <div class="info-card">
                        <div class="location-icon"></div>
                        <div class="card-content">
                            <div class="card-title">Location 3 :</div>
                            Shop No 134,5th cross, ITPL Main Rd, next to SANGETHA MOBILES, opp. MAYURA SAGAR, Kundalahalli Colony, Brookefield, Bengaluru, Karnataka 560037
                        </div>
                    </div>
                </div>

                <!-- Phone Contact -->
                <div class="col-xl-2-4 col-lg-6 col-md-6 col-12">
                    <div class="info-card clickable" onclick="window.open('tel:+917299886984', '_self')">
                        <div class="phone-icon"></div>
                        <div class="card-content">
                            <div class="contact-info">+91 7299886984</div>
                        </div>
                    </div>
                </div>

                <!-- Email Contact -->
                <div class="col-xl-2-4 col-lg-6 col-md-12 col-12">
                    <div class="info-card clickable" onclick="window.open('mailto:rachanalabs.in', '_self')">
                        <div class="email-icon"></div>
                        <div class="card-content">
                            <div class="contact-info">rachanalabs.in</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form-section">
        <div class="contact-form-left"></div>
        <div class="contact-form-right">
            <h2 class="section-heading text-center">Get in Touch</h2>
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label-custom">Name</label>
                        <input type="text" class="form-control form-control-custom" id="name" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label-custom">Phone</label>
                        <input type="tel" class="form-control form-control-custom" id="phone" placeholder="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label-custom">Email</label>
                    <input type="email" class="form-control form-control-custom" id="email" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label-custom">Your Subject</label>
                    <input type="text" class="form-control form-control-custom" id="subject" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="message" class="form-label-custom">Your Message</label>
                    <textarea class="form-control form-control-custom" id="message" rows="5" placeholder=""></textarea>
                </div>
                <button type="submit" class="btn btn-send-message">Send Message</button>
            </form>
        </div>
    </div>

    <div class="map-section">
        <h2 class="section-heading text-center mb-4">Our Location</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.750370830919!2d77.6015579!3d12.9189018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14f9d0d3a77f%3A0x6d9e0d1d6a9d7b1!2sIndian%20Oil%20Fuel%20Apartment!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </div>
    </main>

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
</body>

</html>