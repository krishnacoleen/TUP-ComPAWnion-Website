<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUP ComPAWnion - Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="logo.png" alt="TUP ComPAWnion Logo">
                <h1>TUP ComPAWnion</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="our-cats.php">Our Cats</a></li>
                    <li><a href="volunteer.php">Volunteer</a></li>
                    <li><a href="donate.php">Donate</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
                <button class="dark-mode-toggle" id="darkModeToggle" aria-label="Toggle dark mode">
                    <i class="fas fa-moon"></i>
                    <span>Dark Mode</span>
                </button>
            </nav>
            <button class="mobile-menu-toggle" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Advocating for Feline Welfare at TUP</h1>
                    <p>We are a team of students with sympathetic hearts for our fellow strays in our University. We are the voice of theirs.</p>
                    <div class="hero-buttons">
                        <a href="our-cats.php" class="btn btn-primary">Meet Our Cats</a>
                        <a href="volunteer.php" class="btn btn-secondary">Get Involved</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mission-section">
            <div class="container">
                <h2>Our Mission</h2>
                <p>To advocate for the welfare, protection, and betterment of feline residents within the Technological University of the Philippines community by serving as their voice and champion, promoting their rights, and fostering a harmonious relationship between humans and animals on campus.</p>
            </div>
        </section>

        <section class="cats-preview">
            <div class="container">
                <h2>Featured Cats</h2>
                <div class="cats-grid">
                    
                    <div class="cat-card">
                        <div class="cat-image">
                            <img src="assets/our-cats/uitc-quickie.png" alt="Quickie - Low-energy companion">
                        </div>
                        <h3>Quickie</h3>
                        <p>Quiet, low-energy, needs a special diet and gentle home.</p>
                        <a href="our-cats.php" class="btn btn-outline">Learn More</a>
                    </div>
                    
                    <div class="cat-card">
                        <div class="cat-image">
                            <img src="assets/our-cats/cit-citi.png" alt="Citi - Sweet black domestic">
                        </div>
                        <h3>Citi</h3>
                        <p>Sweet, gentle, low-energy. FIV positive, needs special care.</p>
                        <a href="our-cats.php" class="btn btn-outline">Learn More</a>
                    </div>
                    
                    <div class="cat-card">
                        <div class="cat-image">
                            <img src="assets/our-cats/cos-cla-serene.png" alt="Serene - Friendly orange tabby">
                        </div>
                        <h3>Serene</h3>
                        <p>Friendly, affectionate, loves attention, great with children.</p>
                        <a href="our-cats.php" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
                <div class="section-footer">
                    <a href="our-cats.php" class="btn btn-primary">View All Cats</a>
                </div>
            </div>
        </section>

        <section class="latest-updates">
            <div class="container">
                <h2>Latest Updates from the Blog</h2>
                <div class="blog-preview">
                    
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="assets/home/tup-hayo.png" alt="TUP Hayo Event">
                        </div>
                        <div class="blog-content">
                            <h3>TUP Hayo</h3>
                            <p>Join us for our TUP Hayo event where we gather to raise awareness about feline welfare and celebrate our campus cats.</p>
                            <a href="blog.php" class="read-more">See More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="assets/home/masskapon.png" alt="Mass Kapon sa Luneta">
                        </div>
                        <div class="blog-content">
                            <h3>Mass Kapon sa Luneta</h3>
                            <p>Participate in our Mass Spay/Neuter event at Luneta to help control the stray cat population humanely.</p>
                            <a href="blog.php" class="read-more">See More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="section-footer">
                    <a href="blog.php" class="btn btn-secondary">View All Blog Posts</a>
                </div>
                </div>
        </section>

        <section class="get-involved">
            <div class="container">
                <h2>Get Involved</h2>
                <div class="involvement-options">
                    <div class="option-card">
                        <div class="option-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Volunteer</h3>
                        <p>Join our team and help with feeding programs, cat rescue, and outreach activities.</p>
                        <a href="volunteer.php" class="btn btn-outline">Learn More</a>
                    </div>
                    <div class="option-card">
                        <div class="option-icon">
                            <i class="fas fa-donate"></i>
                        </div>
                        <h3>Donate</h3>
                        <p>Support our mission with monetary or in-kind donations for feeding programs and medical care.</p>
                        <a href="donate.php" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-about">
                    <h3>TUP ComPAWnion</h3>
                    <p>A student-led cat welfare advocacy organization based at the Technological University of the Philippines.</p>
                    <div class="social-links">
                        <a href="https://web.facebook.com/thecompawnion.tupcats" target="_blank" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/tupcompawnion" target="_blank" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@tupcompawnion" target="_blank" class="social-link" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="our-cats.php">Adopt a Cat</a></li>
                        <li><a href="volunteer.php">Become a Volunteer</a></li>
                        <li><a href="donate.php">Make a Donation</a></li>
                        <li><a href="blog.php">Read Our Blog</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Contact</h4>
                    <p><i class="fas fa-map-marker-alt"></i> TUP Manila, Ayala Boulevard, Ermita, Manila 1000</p>
                    <p><i class="fas fa-envelope"></i> tupcompawinion@tup.edu.ph</p>
                    <p><i class="fas fa-phone"></i> +63 971 23 4567</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 TUP ComPAWnion. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>