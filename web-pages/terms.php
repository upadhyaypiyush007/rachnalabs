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
                <h1 class="hero-title">Terms & Conditions</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Terms & Conditions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="terms-section container">
        <div class="container my-5">
            <h2 class="text-center fw-bold mb-4">Terms and Conditions</h2>
            <p>Welcome to <strong>Rachana Diagnostic and Health Care</strong>. By accessing or using our website and services, you agree to be bound by these Terms and Conditions. Please read them carefully before proceeding.</p>

            <h5 class="fw-bold mt-4">1. Scope of Services</h5>
            <p>We provide diagnostic and healthcare services including ECG, Blood Tests, Doppler Imaging, Ultrasound Scans, Vaccinations, Nursing Services, and Health Packages. All services are subject to availability and may vary by location.</p>

            <h5 class="fw-bold mt-4">2. Booking and Cancellations</h5>
            <ul>
                <li>Appointments can be scheduled via our website or in-person.</li>
                <li>Cancellations must be made at least 24 hours in advance.</li>
                <li>Late cancellations or no-shows may incur a cancellation fee.</li>
            </ul>

            <h5 class="fw-bold mt-4">3. Website Usage</h5>
            <p>You agree not to misuse the website or engage in any unlawful activities. All content, logos, and graphics are property of Rachana Diagnostic and Health Care and may not be used without permission.</p>

            <h5 class="fw-bold mt-4">4. Medical Disclaimer</h5>
            <p>The information provided on our website is for general understanding and does not substitute professional medical advice. Always consult a doctor or qualified health provider for diagnosis and treatment.</p>
        </div>

        <h5 class="fw-bold mt-4">5. Payments and Refunds</h5>
        <ul>
            <li>Payments can be made online or at the clinic.</li>
            <li>Refunds are subject to review based on the service type and cancellation timing.</li>
            <li>Advance payments for diagnostic services are non-refundable once the procedure has begun.</li>
        </ul>


        <h5 class="fw-bold mt-4">6. Limitation of Liability</h5>
        <p>Rachana Diagnostic and Health Care is not liable for any indirect or consequential damages arising from the use of our services or website. We aim to deliver the highest quality care, but outcomes may vary depending on individual health conditions.</p>


        <h5 class="fw-bold mt-4">7. Changes to Terms<< /h5>
                <p>We reserve the right to update these Terms at any time without prior notice. Continued use of our website or services after such changes implies acceptance of the revised Terms.</p>


                <h5 class="fw-bold mt-4">8. Governing Law</h5>
                <p>These Terms are governed by the laws of the Republic of India. Any disputes shall be subject to the jurisdiction of the courts in Bangalore, Karnataka.</p>

                <h5 class="fw-bold mt-4">9. Contact Us</h5>
                <p>For questions or feedback regarding these Terms and Conditions, please contact us:</p>
                <p><strong>Email:</strong> rachanalabs.in</p>
                <p><strong>Phone:</strong> +91-7299886984</p>
                <p><strong>Address:</strong>No 1 & 2 Ground Floor, 1st Cross, Sri Manjunatha Layout, Kodigehalli, (Opp to Radiant Silver Bell apartment) Bengaluru, Karnataka 560067</p>
    </div>

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
</body>

</html>