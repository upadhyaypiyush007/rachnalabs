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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/book-a-test.png");
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
        .image-background-section {
            background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/back3.png');
            background-size: cover;
            background-position: center;
            padding: 50px 20px;
            border-radius: 12px;
            max-width: 100%;
            width: 100%;
            height: 180vh;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            min-height: 400px;
            position: relative;
            overflow: hidden;
            margin-top: 5%;
        }



        .inner-content-wrapper {
            position: relative;
            z-index: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .left-aligned-div {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 20px;
            max-width: 450px;
            width: 100%;
            text-align: left;
        }

        .left-aligned-div h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #212121;
            margin-bottom: 15px;
        }

        .left-aligned-div p {
            font-size: 1rem;
            color: #555;
            line-height: 1.5;
        }

        @media (min-width: 768px) {
            .health-promo-section {
                flex-direction: row;
                text-align: left;
            }

            .health-promo-image {
                margin-right: 30px;
                margin-bottom: 0;
            }

            .inner-content-wrapper {
                flex-direction: row;
                justify-content: flex-start;
                gap: 20px;
            }

            .left-aligned-div {
                margin-bottom: 0;
            }
        }

        @media (max-width: 576px) {
            .services-title {
                font-size: 1.8rem;
            }

            .services-text {
                font-size: 1rem;
            }

            .health-promo-title {
                font-size: 1.8rem;
            }

            .health-promo-text {
                font-size: 0.95rem;
            }

            .health-promo-image {
                max-width: 180px;
            }

            .blood-test-icon {
                width: 40px;
                height: 40px;
            }

            .blood-test-icon img {
                width: 25px;
                height: 25px;
            }

            .blood-test-text {
                font-size: 1rem;
            }

            .left-aligned-div {
                padding: 15px;
            }

            .left-aligned-div h3 {
                font-size: 1.5rem;
            }
        }




        .schedule-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 30px;
            border-top: 6px solid #ff6b47;
            margin-left: 28%;
            margin-right: -89%;
        }

        .schedule-header {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            color: #333;
            padding: 25px 20px 20px;
            margin: 0;
        }

        .schedule-body {
            padding: 0 25px 25px;
        }

        .schedule-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        .schedule-item:last-child {
            border-bottom: none;
        }

        .day {
            font-weight: 500;
            color: #444;
            min-width: 80px;
        }

        .time {
            color: #666;
            font-size: 13px;
        }

        .booking-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border-top: 6px solid #2196f3;
            margin-top: 121%;
            margin-left: -79%;
            margin-right: 16%;
        }

        .booking-header {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            color: #333;
            padding: 25px 20px 20px;
            margin: 0;
        }

        .booking-body {
            padding: 0 25px 25px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            background: white;
            box-sizing: border-box;
        }

        .form-control::placeholder {
            color: #999;
            font-size: 14px;
        }

        .form-select {
            color: #999;
            cursor: pointer;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: #2196f3;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
        }

        .row-inputs {
            display: flex;
            gap: 12px;
        }

        .row-inputs .form-control {
            flex: 1;
        }

        .upload-zone {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 35px 20px;
            text-align: center;
            background: #fafafa;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 16px 0;
        }

        .upload-zone:hover {
            border-color: #2196f3;
            background: #f8f9fa;
        }

        .upload-icon {
            width: 40px;
            height: 40px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 18px;
            color: #999;
        }

        .upload-main-text {
            color: #666;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .upload-sub-text {
            color: #999;
            font-size: 12px;
        }

        .book-button {
            width: 100%;
            background: #f44336;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
        }

        .book-button:hover {
            background: #d32f2f;
        }


        .enquiries-section {
            background-image: url('http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/hand-shake.png');
            background-size: cover;
            background-position: center;
            padding: 80px 0;
            text-align: center;
            color: white;
            margin-top: 50px;
            margin-bottom: 5%;
        }

        .enquiries-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .enquiries-section p {
            font-size: 2rem;
            font-weight: bold;
            color: var(--secondary-color);
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

            .left-panel,
            .right-panel {
                min-width: unset;
                width: 100%;
            }

            .right-panel {
                min-height: 300px;
            }

            .container-custom-form {
                border-radius: 0;
                box-shadow: none;
                margin: 0;
            }
              .image-used{
                width: 100%;
                margin-left:auto;
            }
            .image-background-section{
                width: 100%;
                margin:auto;
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
                        <a class="nav-link active" href="book-a-test.php">Book A Test</a>
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
               <h1 class="hero-title">BOOK A TEST</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Book a Test</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="image-background-section">
        <div class="content-container">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-12">
                        <div class="schedule-card">
                            <h3 class="schedule-header">Health Packages</h3>
                            <div class="schedule-body">
                                <div class="schedule-item">
                                    <span class="day">Monday</span>
                                    <span class="time">7:00 pm - 9:00 pm</span>
                                </div>
                                <div class="schedule-item">
                                    <span class="day">Tuesday</span>
                                    <span class="time">7:00 pm - 9:00 pm</span>
                                </div>
                                <div class="schedule-item">
                                    <span class="day">Wednesday</span>
                                    <span class="time">7:00 pm - 9:00 pm</span>
                                </div>
                                <div class="schedule-item">
                                    <span class="day">Thursday</span>
                                    <span class="time">7:00 pm - 9:00 pm</span>
                                </div>
                                <div class="schedule-item">
                                    <span class="day">Friday</span>
                                    <span class="time">7:00 pm - 9:00 pm</span>
                                </div>
                                <div class="schedule-item">
                                    <span class="day">Saturday</span>
                                    <span class="time">7:00 pm - 9:00 pm</span>
                                </div>
                                <div class="schedule-item">
                                    <span class="day">Sunday</span>
                                    <span class="time">7:00 pm - 1:00 pm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-5 col-md-12">
                        <div class="booking-card">
                            <h3 class="booking-header">Book Your Appointment</h3>
                            <div class="booking-body">
                                <div class="form-group">
                                    <select class="form-select">
                                        <option>Choose Test Category</option>
                                        <option>Blood Test</option>
                                        <option>X-Ray</option>
                                        <option>MRI Scan</option>
                                        <option>CT Scan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Please Specify Additional Test If Any (Optional)">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <div class="row-inputs">
                                        <input type="tel" class="form-control" placeholder="Phone">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Select Date (upto 7 days from tomorrow)" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
                                </div>

                                <div class="upload-zone">
                                    <div class="upload-icon">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                    <div class="upload-main-text">Upload Prescription (Optional)</div>
                                    <div class="upload-sub-text">Upload Documents</div>
                                </div>

                                <button type="submit" class="book-button">Book a Appointment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="enquiries-section">
        <div class="container">
            <h2>For Enquiries</h2>
            <p>Call us on +91-7299886984</p>
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
</body>

</html>