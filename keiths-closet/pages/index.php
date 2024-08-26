<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keith's Closet - Supporting Mental Health Through Clothing">
    <title>Keith's Closet</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="site-header">
        <div class="header-container">
            <img src="../images/keiths-logo.png" alt="Keith's Closet Logo" class="site-logo">
            <div class="social-media-links">
                <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
            <div class="cta-buttons">
                <a href="../pages/auth.php" class="volunteer-btn">Volunteer</a>
            </div>
        </div>
        <div class="menu-toggle" id="menu-toggle" aria-label="Open Menu">
            <div class="toggle-bar"></div>
            <div class="toggle-bar"></div>
            <div class="toggle-bar"></div>
        </div>
    </header>

    <!-- Fullscreen Menu -->
    <nav id="fullscreen-menu" class="fullscreen-menu hidden" aria-hidden="true">
        <a href="#" class="menu-close-btn" id="menu-close-btn" aria-label="Close Menu">&times;</a>
        <div class="menu-content">
            <img src="../images/keiths-logo.png" alt="Keith's Closet Logo" class="menu-logo">
            <ul class="nav-list">
                <li><a href="#about">About</a></li>
                <li><a href="#charity-partners">Charity Partners</a></li>
                <li><a href="#fashion-partners">Fashion Partners</a></li>
                <li><a href="#our-supporters">Our Supporters</a></li>
                <li><a href="#meet-the-team">Meet the Team</a></li>
                <li><a href="#volunteer">Volunteer</a></li>
                <li><a href="#donate">Donate</a></li>
                <li><a href="#media">Media</a></li>
                <li><a href="#shop">Shop</a></li>
            </ul>
        </div>
    </nav>

    <!-- Scrolling Navigation -->
    <nav id="scrolling-nav" class="scrolling-nav">
        <div class="nav-container">
            <img src="../images/keiths-logo.png" alt="Keith's Closet Logo" class="nav-logo">
            <ul class="nav-links">
            <li class="nav-item">
                <a href="#about" class="hover-tab-link">About</a>
                <div class="hover-tab">
                    <div class="tooltip-content">
                        <div class="tooltip-section">
                            <h3>Our Story</h3>
                            <img src="../images/our-story.png" alt="Image representing Our Story">
                            <a href="#our-story" class="tooltip-link">Read More</a>
                            <!-- Content for "Our Story" can be added here -->
                        </div>
                        <div class="tooltip-section">
                            <h3>Our Team</h3>
                            <img src="../images/meet-the-team.png" alt="Image representing Our Team">
                            <a href="#our-team" class="tooltip-link">Meet the Team</a>
                            <!-- Content for "Our Team" can be added here -->
                        </div>
                        <div class="tooltip-section">
                            <h3>News</h3>
                            <img src="../images/news.png" alt="Image representing News">
                            <a href="#news" class="tooltip-link">Latest News</a>
                            <!-- Content for "News" can be added here -->
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="#impact" class="hover-tab-link">Impact</a>
                <div class="hover-tab">
                    <div class="tooltip-content">
                        <div class="tooltip-section">
                            <h3>Our Impact</h3>
                            <img src="../images/our-impact.jpg" alt="Our Impact Image">
                            <a href="#our-impact">Learn More</a>
                        </div>
                        <div class="tooltip-section">
                            <h3>Success Stories</h3>
                            <img src="../images/success-stories.jpg" alt="Success Stories Image">
                            <a href="#success-stories">Read Stories</a>
                        </div>
                        <div class="tooltip-section">
                            <h3>Impact Reports</h3>
                            <img src="../images/impact-reports.jpg" alt="Impact Reports Image">
                            <a href="#impact-reports">View Reports</a>
                        </div>
                    </div>
                </div>
                <li class="nav-item">
                    <a href="#get-involved" class="hover-tab-link">Get Involved</a>
                    <div class="hover-tab">
                        <div class="tooltip-content">
                            <div class="tooltip-section">
                                <h3>Volunteer</h3>
                                <img src="../images/volunteer.jpg" alt="Volunteer Image">
                                <a href="#volunteer">Join Us</a>
                            </div>
                            <div class="tooltip-section">
                                <h3>Donate</h3>
                                <img src="../images/donate.jpg" alt="Donate Image">
                                <a href="#donate">Support Us</a>
                            </div>
                            <div class="tooltip-section">
                                <h3>Partner</h3>
                                <img src="../images/partner.jpg" alt="Partner Image">
                                <a href="#partner">Collaborate</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav-cta-buttons">
                <a href="#donate-money" class="nav-btn donate-money-btn">Donate Money</a>
                <a href="#donate-clothes" class="nav-btn donate-clothes-btn">Donate Clothes</a>
                <a href="#donate-time" class="nav-btn donate-time-btn">Donate Time</a>
            </div>
        </div>
    </nav>

    <!-- Main Navigation -->
    <nav class="main-navigation">
        <ul class="main-nav">
            <li class="nav-item">
                <a href="#about" data-tooltip="Learn about our mission and team">About</a>
                <div class="dropdown-content">
                    <p>Our Story</p>
                    <p>Our Team</p>
                    <p>Good News</p>
                </div>
            </li>
            <li class="nav-item">
                <a href="#impact" data-tooltip="See how we're making a difference">Impact</a>
                <div class="dropdown-content">
                    <p>Our Impact</p>
                    <p>Success Stories</p>
                </div>
            </li>
            <li class="nav-item">
                <a href="#get-involved" data-tooltip="Find out how you can help">Get Involved</a>
                <div class="dropdown-content">
                    <p>Volunteer</p>
                    <p>Donate</p>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Supporting Mental Health</h1>
            <p>Look Good, Feel Good</p>
            <a href="#learn-more" class="cta-button">Learn More</a>
        </div>
    </section>

    <!-- Carousel Banner -->
    <section id="carousel-banner" class="carousel-banner">
        <div class="carousel-slide active">
            <div class="carousel-content">
                <h2>Supporting Mental Health</h2>
                <p>Look Good, Feel Good</p>
                <a href="#donate" class="cta-button">Donate Now</a>
            </div>
            <img src="../images/banner1.jpg" alt="Mental Health Support">
        </div>
        <div class="carousel-slide">
            <div class="carousel-content">
                <h2>Empowering Through Clothing</h2>
                <p>Dress for Success, Feel Confident</p>
                <a href="#learn-more" class="cta-button">Learn More</a>
            </div>
            <img src="../images/banner2.jpg" alt="Empowering Through Clothing">
        </div>
        <div class="carousel-slide">
            <div class="carousel-content">
                <h2>Community Closet</h2>
                <p>Sharing Resources, Building Connections</p>
                <a href="#get-involved" class="cta-button">Get Involved</a>
            </div>
            <img src="../images/banner3.jpg" alt="Community Closet">
        </div>
        
        <!-- Circular navigation buttons -->
        <div class="carousel-nav-buttons">
            <div class="carousel-nav-btn active" data-slide="0" aria-label="Go to slide 1"></div>
            <div class="carousel-nav-btn" data-slide="1" aria-label="Go to slide 2"></div>
            <div class="carousel-nav-btn" data-slide="2" aria-label="Go to slide 3"></div>
        </div>
    </section>

    <!-- Keith Section -->
    <section class="keith-section">
        <div class="content-wrapper">
            <div class="keith-description">
                <h2>Support Keith's Closet: Clothing for a Cause</h2>
                <p>Keith's Closet is dedicated to supporting mental health through the power of clothing. We believe that a simple gesture, like providing fresh, clean clothing, can make a world of difference in someone's life.</p>
                <p>Join us in our mission to empower individuals by donating, volunteering, or spreading the word about our cause.</p>
            </div>
            <div class="keith-media">
                <img src="../images/keith-image.jpg" alt="Keith's Closet Impact" class="keith-image">
                <div class="keith-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/-zhyTpVrcJs?start=0" title="Keith's Closet Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-icon">
                    <img src="../images/icon1.png" alt="Icon 1">
                </div>
                <div class="stat-number" data-target="1000">0</div>
                <div class="stat-label">FASHION PARTNERS DONATING CLOTHING</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <img src="../images/icon2.png" alt="Icon 2">
                </div>
                <div class="stat-number" data-target="1500">0</div>
                <div class="stat-label">CHARITY PARTNERS ACROSS AUSTRALIA</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <img src="../images/icon3.png" alt="Icon 3">
                </div>
                <div class="stat-number" data-target="5503497">0</div>
                <div class="stat-label">ITEMS SAVED FROM LANDFILL</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <img src="../images/icon4.png" alt="Icon 4">
                </div>
                <div class="stat-number" data-target="2500">0</div>
                <div class="stat-label">PEOPLE IN NEED CLOTHED EACH WEEK</div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-container">
            <p>&copy; 2024 Keith's Closet. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="../js/scripts.js"></script>
</body>
</html>