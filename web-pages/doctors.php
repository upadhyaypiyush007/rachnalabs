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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/back-ecg.png");
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
/* Main Section */
        .doctors-section {
            background: var(--section-bg);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .doctors-section::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 107, 53, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
        }

        .doctors-section::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(44, 90, 160, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
        }

        .section-content {
            position: relative;
            z-index: 2;
        }

        /* Section Title */
        .section-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            margin: 20px auto 0;
            border-radius: 2px;
        }

        /* Doctor Cards */
        .doctor-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
            margin-bottom: 30px;
            position: relative;
        }

        .doctor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .doctor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            z-index: 1;
        }

        /* Doctor Image */
        .doctor-image-container {
            position: relative;
            overflow: hidden;
            height: 280px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .doctor-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .doctor-card:hover .doctor-image {
            transform: scale(1.05);
        }

        /* Placeholder Images */
        .doctor-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 3rem;
            position: relative;
        }

        .doctor-placeholder.male {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        }

        .doctor-placeholder.female {
            background: linear-gradient(135deg, #E91E63 0%, #C2185B 100%);
        }

        /* Doctor Info */
        .doctor-info {
            padding: 25px;
            text-align: left;
        }

        .doctor-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .doctor-qualification {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 5px;
            font-weight: 500;
        }

        .doctor-specialization {
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .doctor-details {
            font-size: 0.85rem;
            color: var(--text-light);
            line-height: 1.4;
        }

        /* Specialty Badge */
        .specialty-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary-color);
            backdrop-filter: blur(10px);
            z-index: 2;
        }

        /* Contact Button */
        .contact-btn {
            background: linear-gradient(45deg, var(--primary-color), #3498db);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-top: 10px;
        }

        .contact-btn:hover {
            background: linear-gradient(45deg, #1e3d6f, var(--primary-color));
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .contact-btn i {
            margin-left: 5px;
            font-size: 0.8rem;
        }

        /* Responsive Design */

        /* Extra Large Devices (1400px and up) */
        @media (min-width: 1400px) {
            .section-title {
                font-size: 3.5rem;
            }
            
            .doctor-image-container {
                height: 320px;
            }
            
            .doctor-info {
                padding: 30px;
            }
        }

        /* Large Devices (1200px to 1399px) */
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .section-title {
                font-size: 2.8rem;
            }
            
            .doctor-image-container {
                height: 260px;
            }
        }

        /* Medium Devices (992px to 1199px) */
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .doctors-section {
                padding: 60px 0;
            }
            
            .section-title {
                font-size: 2.5rem;
                margin-bottom: 50px;
            }
            
            .doctor-image-container {
                height: 240px;
            }
            
            .doctor-info {
                padding: 20px;
            }
            
            .doctor-name {
                font-size: 1.3rem;
            }
        }

        /* Small to Medium Devices (768px to 991px) - Tablets */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .doctors-section {
                padding: 50px 0;
            }
            
            .section-title {
                font-size: 2.2rem;
                margin-bottom: 40px;
            }
            
            .doctor-image-container {
                height: 220px;
            }
            
            .doctor-info {
                padding: 18px;
            }
            
            .doctor-name {
                font-size: 1.2rem;
            }
            
            .doctor-qualification {
                font-size: 0.85rem;
            }
            
            .doctor-specialization {
                font-size: 0.95rem;
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
                        <a class="nav-link" href="video-consultation.php">Video Consulation</a>
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

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">OUR DOCTORS</h1>
            <nav class="breadcrumb-custom">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">Service</li>
                </ol>
            </nav>
        </div>
    </div>
</section> 
 
  <section class="doctors-section">
        <div class="container section-content">
            <!-- Section Title -->
            <h2 class="section-title fade-in-up">Meet Our Expert Doctors</h2>
            
            <!-- Doctors Grid -->
            <div class="row">
                <!-- Doctor 1 - Dr. Rohit Warrier -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="doctor-card fade-in-up delay-1">
                        <div class="doctor-image-container">
                            <div class="doctor-placeholder male">
                               <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/doctor/doc4.png">
                            </div>
                            <div class="specialty-badge">Diabetologist</div>
                        </div>
                        <div class="doctor-info">
                            <h3 class="doctor-name">Dr. Rohit Warrier</h3>
                            <p class="doctor-qualification">MBBS, MS (UTSW,US), MSC DIAB(UK)</p>
                            <p class="doctor-specialization">Diabetologist</p>
                            <a href="#" class="contact-btn">
                                Book Consultation
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 2 - Dr. Kavita Kovi -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="doctor-card fade-in-up delay-2">
                        <div class="doctor-image-container">
                            <div class="doctor-placeholder female">
                                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/doctor/doc1.png">
                            </div>
                            <div class="specialty-badge">Gynecologist</div>
                        </div>
                        <div class="doctor-info">
                            <h3 class="doctor-name">Dr. Kavita Kovi</h3>
                            <p class="doctor-qualification">MBBS, MS (OBG)</p>
                            <p class="doctor-specialization">Gynecologist</p>
                            <a href="#" class="contact-btn">
                                Book Consultation
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 3 - Dr. Dinesh Manni -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="doctor-card fade-in-up delay-3">
                        <div class="doctor-image-container">
                            <div class="doctor-placeholder male">
                                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/doctor/doc2.png">
                            </div>
                            <div class="specialty-badge">Orthopedic</div>
                        </div>
                        <div class="doctor-info">
                            <h3 class="doctor-name">Dr. Dinesh Manni</h3>
                            <p class="doctor-qualification">MBBS, D.N.B (ORTHO)</p>
                            <p class="doctor-specialization">ORTHOPEDIC AND ROBOTIC JOINT REPLACEMENT SURGEON</p>
                            <a href="#" class="contact-btn">
                                Book Consultation
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 4 - Dr. Josna Ganesh -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="doctor-card fade-in-up delay-4">
                        <div class="doctor-image-container">
                            <div class="doctor-placeholder female">
                                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/doctor/doc3.png">
                            </div>
                            <div class="specialty-badge">General Medicine</div>
                        </div>
                        <div class="doctor-info">
                            <h3 class="doctor-name">Dr. Josna Ganesh</h3>
                            <p class="doctor-qualification">MBBS, M.D</p>
                            <p class="doctor-specialization">MD GENERAL MEDICINE</p>
                            <a href="#" class="contact-btn">
                                Book Consultation
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 5 - Additional Doctor (Placeholder) -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="doctor-card fade-in-up delay-5">
                        <div class="doctor-image-container">
                            <div class="doctor-placeholder male">
                                <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/doctor/doc5.png">
                            </div>
                            <div class="specialty-badge">Orthology</div>
                        </div>
                        <div class="doctor-info">
                            <h3 class="doctor-name">Dr. Shiva Kumar A Naragel</h3>
                            <p class="doctor-qualification">MBBS, MS (ORTHOPEADICS) </p>
                            <p class="doctor-specialization">ORTHOPEDICIAN</p>
                            <a href="#" class="contact-btn">
                                Book Consultation
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 6 - Additional Doctor (Placeholder) -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="doctor-card fade-in-up delay-6">
                        <div class="doctor-image-container">
                            <div class="doctor-placeholder female">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div class="specialty-badge">Nutrition</div>
                        </div>
                        <div class="doctor-info">
                            <h3 class="doctor-name">Archana S</h3>
                            <p class="doctor-qualification">Senior Nutritionst, Certified Diabetes</p>
                            <p class="doctor-specialization">Educator</p>
                            <a href="#" class="contact-btn">
                                Book Consultation
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action Section -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px;">
                        <div class="card-body py-4">
                            <h4 class="text-white mb-3">Need Medical Assistance?</h4>
                            <p class="text-white mb-4">Our expert doctors are here to provide you with the best healthcare services. Book your consultation today!</p>
                            <div class="row justify-content-center">
                                <div class="col-md-4 mb-2">
                                    <a href="#" class="btn btn-light btn-lg w-100">
                                        <i class="fas fa-phone me-2"></i>Call Now
                                    </a>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <a href="#" class="btn btn-outline-light btn-lg w-100">
                                        <i class="fas fa-calendar-alt me-2"></i>Book Online
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all doctor cards and title
        document.querySelectorAll('.doctor-card, .section-title').forEach(el => {
            observer.observe(el);
        });

        // Add click events for consultation buttons
        document.querySelectorAll('.contact-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const doctorName = this.closest('.doctor-card').querySelector('.doctor-name').textContent;
                alert(`Booking consultation with ${doctorName}...`);
            });
        });
    </script>
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