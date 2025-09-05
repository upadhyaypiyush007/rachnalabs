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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/Vacc/back-vacc.png");
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

        .main-container {
            max-width: 98%;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        .content-text {
            font-size: 14px;
            text-align: justify;
            line-height: 1.8;
            margin-bottom: 20px;
            color: #333;
        }

        .diseases-intro {
            font-size: 14px;
            color: #333;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .diseases-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .disease-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .disease-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #a8d5a8;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            font-size: 24px;
            position: relative;
        }

        .disease-name {
            font-size: 12px;
            color: #ff8c42;
            font-weight: 600;
            line-height: 1.3;
            max-width: 80px;
        }

        .book-now-btn {
            background-color: #4472c4;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        .book-now-btn:hover {
            background-color: #365a96;
            color: white;
        }

        @media (max-width: 768px) {
            .diseases-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
            }

            .disease-icon {
                width: 60px;
                height: 60px;
                font-size: 18px;
            }

            .disease-name {
                font-size: 10px;
                max-width: 60px;
            }
        }

        @media (max-width: 480px) {
            .diseases-grid {
                grid-template-columns: repeat(2, 1fr);
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
                        <a class="nav-link active" href="video-consultation.php">Video Consulation</a>
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
               <h1 class="hero-title">VACCINATION SERVICES</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Vaccination Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/Vacc/frame-vacc.png" style="margin-left: 5%; margin-bottom:5%" class="image-used">



    <div class="main-container">
        <p class="content-text">Yet despite tremendous progress, vaccination coverage has plateaued in recent years and dropped since 2020. The COVID-19 pandemic and associated disruptions over the past two year have strained health systems, with 25 million children missing out on vaccination in 2021, 6 million more than in 2019 and the highest number since 2009.</p>

        <p class="content-text">Vaccines train your immune system to create antibodies, just as it does when it's exposed to a disease. However, because vaccines contain only killed or weakened forms of germs like viruses or bacteria, they do not cause the disease or put you at risk of its complications.</p>

        <p class="diseases-intro">Vaccines protect against many different diseases, including:</p>

        <div class="diseases-grid">
            <!-- Row 1 -->
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/cancer.png"></div>
                <div class="disease-name">Cervical Cancer</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/chloera.png"></div>
                <div class="disease-name">Cholera</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/covid.png"></div>
                <div class="disease-name">COVID-19</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/diphtheria.png"></div>
                <div class="disease-name">Diphtheria</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/hepatites.png"></div>
                <div class="disease-name">Hepatitis B</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/influenza.png"></div>
                <div class="disease-name">Influenza</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/japanese.png"></div>
                <div class="disease-name">Japanese Encephalitis</div>
            </div>

            <!-- Row 2 -->
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/services/blood.png"></div>
                <div class="disease-name">Cervical Cancer</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/malaria.png"></div>
                <div class="disease-name">Malaria</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/mealses.png"></div>
                <div class="disease-name">Measles</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/meningtis.png"></div>
                <div class="disease-name">Meningitis</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/mumps.png"></div>
                <div class="disease-name">Mumps</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/pertusis.png"></div>
                <div class="disease-name">Pertussis</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/pneumonia.png"></div>
                <div class="disease-name">Pneumonia</div>
            </div>

            <!-- Row 3 -->
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/polio.png"></div>
                <div class="disease-name">Polio</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/rabies.png"></div>
                <div class="disease-name">Rabies</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/rota.png"></div>
                <div class="disease-name">Rotavirus</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/rota.png"></div>
                <div class="disease-name">Rubella</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/tetanus.png"></div>
                <div class="disease-name">Tetanus</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/typhoid.png"></div>
                <div class="disease-name">Typhoid</div>
            </div>
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/varicella.png"></div>
                <div class="disease-name">Varicella</div>
            </div>

            <!-- Row 4 -->
            <div class="disease-item">
                <div class="disease-icon"><img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/diseases/yellow.png"></div>
                <div class="disease-name">Yellow Fever</div>
            </div>
        </div>

        <button class="book-now-btn">Book Now</button>
    </div>





    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/Vacc/down-vacc.png" style="width:100%; margin-bottom:5%">

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