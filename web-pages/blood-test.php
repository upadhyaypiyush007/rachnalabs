<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Test - Rachana Diagnostic and Health Care</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #ff6b35;
            --green-accent: #a8d5a8;
            --text-dark: #333;
            --text-light: #666;
            --red-accent: #e74c3c;
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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/blood.png");
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

        /* Blood Test Content Section */

        /* Types of Blood Test Section */
        .types-section {
            background: var(--red-accent);
            color: white;
            padding: 15px 20px;
            margin: 40px 0 20px;
            border-radius: 5px;
        }

        .types-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0;
        }

        .test-types-list {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .test-type-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .test-type-item:last-child {
            border-bottom: none;
        }

        .test-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 14px;
            color: white;
        }

        .test-icon.cbc {
            background: #e74c3c;
        }

        .test-icon.chemistry {
            background: #27ae60;
        }

        .test-icon.enzyme {
            background: #f39c12;
        }

        .test-icon.heart {
            background: #9b59b6;
        }

        .test-type-text {
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 500;
        }

        .blood-test-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .blood-test-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #e6f7e6;
            /* Light green background for icons */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .blood-test-icon img {
            width: 20px;
            height: 20px;
        }

        .blood-test-text {
            font-size: 1.1rem;
            color: #212121;
            font-weight: 600;
            line-height: 1.4;
        }

        /* Section Headers */
        .section-header {
            background: var(--red-accent);
            color: white;
            padding: 15px 20px;
            margin: 40px 0 20px;
            border-radius: 5px;
        }

        .section-header h3 {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0;
        }

        .content-text {
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        /* Book Now Button */
        .book-now-section {
            text-align: center;
            margin: 50px 0;
        }

        .book-now-btn {
            background: var(--primary-color);
            color: white;
            padding: 15px 40px;
            border-radius: 30px;
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
              .image-used{
                width: 100%;
                margin-left:auto;
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
                <h1 class="hero-title">Blood Test</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Blood Test</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Blood Test Content Section -->

    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/Frame-17.png" alt="Blood Test" style="margin-left: 5%;" class="image-used">



    <!-- Types of Blood Test -->
    <section class="container">
        <div class="types-section">
            <h3 class="types-title">Types of Blood Test:</h3>
        </div>

        <p class="content-text">These are common blood tests.</p>

        <div class="blood-test-item">
            <div class="blood-test-icon">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/blood.png" alt="Blood test icon">
            </div>
            <p class="blood-test-text">Complete blood count, also called a CBC</p>
        </div>
        <div class="blood-test-item">
            <div class="blood-test-icon">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/image.png" alt="Blood test icon">
            </div>
            <p class="blood-test-text">Blood chemistry tests</p>
        </div>
        <div class="blood-test-item">
            <div class="blood-test-icon">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/micro.png" alt="Blood test icon">
            </div>
            <p class="blood-test-text">Blood enzyme tests</p>
        </div>
        <div class="blood-test-item">
            <div class="blood-test-icon">
                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/heart.png" alt="Blood test icon">
            </div>
            <p class="blood-test-text">Blood tests for heart disease risk</p>
        </div>


        <p class="content-text">
            Blood tests can give your healthcare provider a lot of information. He or she can see if certain elements in your blood are in a normal range. But in many cases, blood tests are only part of the information your healthcare provider needs to make a diagnosis of a health condition. You might need to do certain tests only on your own doctor.
        </p>
    </section>

    <!-- Preparing for Blood Test -->
    <section class="container">
        <div class="section-header">
            <h3>Preparing for a Blood Test :</h3>
        </div>

        <p class="content-text">
            For most kinds of blood tests, you don't need to prepare. These tests are to see what your blood is like under normal conditions. For some blood tests, you will have to not eat (fast) for a certain amount of time before the blood test. This usually means no eating or drinking anything after midnight before the test. These tests are often scheduled for early in the morning. Your healthcare provider will let you know if you need to fast before a blood test.
        </p>
    </section>

    <!-- The Procedure -->
    <section class="container">
        <div class="section-header">
            <h3>The Procedure:</h3>
        </div>

        <p class="content-text">
            In order to test your blood, a technician called a phlebotomist will use a needle to take a sample of blood. Tell the technician if the sight of needles makes you nervous. You can ask to lie down during the blood draw. You may also want to look away during the test. A small amount of blood (less than 2 teaspoons) is taken from a vein in your arm. You will be seated or lying down. You may be asked to make a fist. The technician will tie a rubber band around your arm. This will help the technician find the vein. He or she will clean the area and then insert the needle. You might feel a small prick. Once the technician has drawn enough blood, he or she will take the needle out and put an adhesive bandage over the site. You may be asked to press firmly on the site to stop any bleeding.
        </p>
    </section>

    <!-- After the Procedure -->
    <section class="container">
        <div class="section-header">
            <h3>After the Procedure :</h3>
        </div>

        <p class="content-text">
            Your blood sample will be sent to a lab. Trained technicians then look for the information the healthcare provider has ordered. This may take a day or up to a week or more. Check back with your healthcare provider's office to find out about the results.
        </p>
    </section>

    <!-- Book Now Section -->
    <div class="book-now-section">
        <div class="container">
            <a href="#" class="book-now-btn">Book Now</a>
        </div>
    </div>


    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/frame-blood.png" alt="Blood Test" style="width: 100%; margin-bottom: 5%;">
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