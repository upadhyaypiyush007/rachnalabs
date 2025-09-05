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
            background-image: url("http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/droppler/back-droppler.png");
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
            max-width: 90%;
            margin: 20px auto;
            background: white;
            padding: 0;

        }

        .section-header {
            background-color: #dc3545;
            color: white;
            padding: 12px 20px;
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .content-section {
            padding: 20px;
        }

        .content-section p {
            margin-bottom: 15px;
            font-size: 14px;
            text-align: justify;
        }

        .doppler-type {
            color: #F5801E;
            font-weight: bold;
            font-size: 14px;
        }

        .numbered-list {
            margin: 15px 0;
            padding-left: 0;
        }

        .numbered-list li {
            list-style: none;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: justify;
        }

        .numbered-list li::before {
            content: counter(item) ". ";
            counter-increment: item;
            font-weight: bold;
        }

        .numbered-list {
            counter-reset: item;
        }

        .bullet-list {
            margin: 15px 0;
            padding-left: 20px;
        }

        .bullet-list li {
            margin-bottom: 8px;
            font-size: 14px;
            text-align: justify;
        }

        .sub-header {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 14px;
        }

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
            .hero-section{
                width:100%;
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
                <h1 class="hero-title">DROPPLER IMAGING SERVICES</h1>
                <nav class="breadcrumb-custom">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">DROPPLER IMAGING SERVICES</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/droppler/frame-droppler.png" alt="Blood Test" class="image-used" style="margin-left: 5%; margin-top:5%">

    <div class="main-container">
        <!-- Content Section -->
        <div class="content-section">
            <div class="doppler-type">■ Power Doppler:</div>
            <p>A newer type of color Doppler. It can provide more detail of blood flow than standard color Doppler, but it cannot show the direction of blood flow, which can be important in some cases.</p>

            <div class="doppler-type">■ Spectral Doppler:</div>
            <p>This test shows blood flow information on a graph, rather than color pictures. It can help show how much of a blood vessel is blocked.</p>

            <div class="doppler-type">■ Duplex Doppler:</div>
            <p>This test uses standard ultrasound to take images of blood vessels and organs. Then a computer turns the images into a graph, as in spectral Doppler.</p>

            <div class="doppler-type">■ Continuous wave Doppler:</div>
            <p>In this test, sound waves are sent and received continuously. It allows for more accurate measurement of blood that flows at faster speeds.</p>
        </div>

        <!-- Other Names Section -->
        <div class="section-header">Other Names -</div>
        <div class="content-section">
            <p>Doppler ultrasonography</p>
        </div>

        <!-- What is it used for Section -->
        <div class="section-header">What is it used for?</div>
        <div class="content-section">
            <p>Doppler ultrasound tests are used to help health care providers find out if you have a condition that is reducing or blocking your blood flow. It may also be used to help diagnose certain heart diseases. The test is most often used to:</p>

            <ol class="numbered-list">
                <li>Check heart function. It is often done along with an electrocardiogram, a test that measures electrical signals in the heart.</li>
                <li>Look for blockages in blood flow. Blocked blood flow in the legs can cause a condition called deep vein thrombosis (DVT).</li>
                <li>Check for blood vessel damage and for defects in the structure of the heart.</li>
                <li>Look for narrowing of blood vessels. Narrowed arteries in arms and legs can mean you have condition called peripheral arterial disease (PAD). Narrowing of arteries in the neck can mean you have a condition called carotid artery stenosis.</li>
                <li>Monitor blood flow after surgery.</li>
                <li>Check for normal blood flow in a pregnant woman and her unborn baby.</li>
            </ol>
        </div>

        <!-- After the Procedure Section -->
        <div class="section-header">After the Procedure -</div>
        <div class="content-section">
            <p>You may need a Doppler ultrasound if you have symptoms of reduced blood flow or a heart disease. Symptoms vary depending on the condition causing the problem. Some common blood flow conditions and symptoms are below.</p>

            <div class="sub-header">Symptoms of peripheral arterial disease (PAD) include:</div>
            <ul class="bullet-list">
                <li>Numbness or weakness in your legs</li>
                <li>Painful cramping in your hips or leg muscles when walking or climbing stairs</li>
                <li>Cold feeling in your lower leg or foot</li>
                <li>Changes in color and/or shiny skin on your leg</li>
            </ul>

            <div class="sub-header">Symptoms of heart problems include:</div>
            <ul class="bullet-list">
                <li>Shortness of breath</li>
                <li>Swelling in your legs, feet, and/or abdomen</li>
                <li>Fatigue</li>
            </ul>
        </div>

        <!-- Why do I need a Doppler Ultrasound Section -->
        <div class="section-header">Why do I need a Doppler Ultrasound?</div>
        <div class="content-section">
            <ol class="numbered-list">
                <li>Have had a stroke. After a stroke, your health care provider may order a special kind of Doppler test, called transcranial Doppler, to check blood flow to the brain.</li>
                <li>Are an injury to your blood vessels.</li>
                <li>Are being treated for a blood flow disorder.</li>
                <li>Are pregnant and your provider thinks you or your unborn baby might have a blood flow problem. Your provider may suspect a problem if your unborn baby is smaller than it should be at this stage of pregnancy or if you have certain medical conditions that can reduce blood flow, such as diabetes or high blood pressure.</li>
            </ol>
        </div>
        <!-- What happens during a Doppler Ultrasound Section -->
        <div class="section-header">What happens during a Doppler Ultrasound?</div>
        <div class="content-section">
            <p>A Doppler ultrasound usually includes the following steps:</p>
            <p>You will lie a table, exposing the area of your body that's being tested.</p>
            <p>A health care provider will spread a special gel on the skin over that area.</p>
            <p>The provider will move a wand-like device, called a transducer, over the area.</p>
            <p>The device sends sound waves into your body.</p>
            <p>The movement of blood cells causes a change in the pitch of the sound waves. You may hear swishing or pulse-like sounds during the procedure.</p>
            <p>The waves are recorded and turned into images or graphs on a monitor.</p>
            <p>After the test is over, the provider will wipe the gel off your body.</p>
            <p>The test takes about 30-60 minutes to complete.</p>
        </div>

        <!-- Will I need to do anything to prepare for the test Section -->
        <div class="section-header">Will I need to do anything to prepare for the test?</div>
        <div class="content-section">
            <p>To prepare for a Doppler ultrasound, you may need to:</p>
            <p>Remove clothing and jewelry from the area of the body that is getting tested.</p>
            <p>Avoid cigarettes and other products that have nicotine for up to two hours before your test. Nicotine causes blood vessels to narrow, which can affect your results.</p>
            <p>For certain types of Doppler tests, you may be asked to fast (not eat or drink) for several hours before the test.</p>
            <p>Your health care provider will let you know if you need to do anything to prepare for your test.</p>
        </div>

        <!-- Risks Section -->
        <div class="section-header">Risks</div>
        <div class="content-section">
            <p>There are no known risks to having a Doppler ultrasound. It is also considered safe during pregnancy.</p>
        </div>

        <!-- Results Section -->
        <div class="section-header">Results</div>
        <div class="content-section">
            <p>When your exam is complete, a doctor trained to interpret imaging studies (radiologist) analyzes the images and share the results with you.</p>
        </div>
    </div>
    <img src="http://localhost/Pixelmax-Softech/Rachana-Healthcare/images/droppler/down-drop.png" style="width: 100%; margin-bottom:5%">
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