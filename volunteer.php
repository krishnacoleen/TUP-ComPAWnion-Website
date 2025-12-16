<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer - TUP ComPAWnion</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <body class="volunteer-page"></body>
    <div style="background:#fff3cd; color:#856404; border:1px solid #ffeaa7; padding:10px; text-align:center; margin:0;">
        <strong>⚠️ IMPORTANT NOTE:</strong><br>
        This is a static GitHub Pages deployment. PHP scripts, MySQL database, form submissions, 
        and other server-side features are disabled. This version is for UI/UX demonstration only.<br>
        For complete functionality, please visit our live website.
    </div>
    <header>
        <div class="container">
            <div class="logo">
                <img src="logo.png" alt="TUP ComPAWnion Logo">
                <h1>TUP ComPAWnion</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="our-cats.php">Our Cats</a></li>
                    <li><a href="volunteer.php" class="active">Volunteer</a></li>
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
    <section class="page-header">
        <div class="container">
            <h1>Become a Volunteer</h1>
            <p>Join our team and make a difference in the lives of campus cats</p>
        </div>
    </section>
        </section>

        <section class="volunteer-highlights">
            <div class="container">
                <h2>Our Volunteer Activities</h2>
                <div class="highlight-cards">
                    <div class="highlight-card">
                        <h3>Feeding Program</h3>
                        <p>Help provide daily meals to campus cats at designated feeding stations. Volunteers ensure cats receive proper nutrition and monitor their health.</p>
                    </div>
                    <div class="highlight-card">
                        <h3>Cat Rescues</h3>
                        <p>Assist in rescuing injured or distressed cats and transporting them to veterinary care. Emergency response training provided.</p>
                    </div>
                    <div class="highlight-card">
                        <h3>Outreach Program</h3>
                        <p>Educate the TUP community about responsible pet ownership and animal welfare through campus events and social media campaigns.</p>
                    </div>
                    <div class="highlight-card">
                        <h3>Adoption Events</h3>
                        <p>Help organize and run adoption events, interact with potential adopters, and ensure cats find their perfect forever homes.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Events Calendar Section -->
        <section class="events-calendar">
            <div class="container">
                <h2>Upcoming Volunteer Events</h2>
                <p>Browse our upcoming events and select the dates you're available when filling out the form.</p>
                
                <div class="calendar-container">
                    <div class="calendar-header">
                        <button id="prev-month" class="btn btn-outline">&lt; Prev</button>
                        <h3 id="current-month-year">November 2025</h3>
                        <button id="next-month" class="btn btn-outline">Next &gt;</button>
                    </div>
                    
                    <div class="calendar-grid">
                        <div class="calendar-weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="calendar-days" id="calendar-days">
                            <!-- Calendar days will be populated by JavaScript -->
                        </div>
                    </div>
                    
                    <div class="events-list" id="events-list">
                        <!-- Events will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </section>

        <section class="volunteer-form-section">
            <div class="container">
                <div class="form-container">
                    <h2>Join Our Volunteer Team</h2>
                    <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; text-align:center;">
                        <strong>⚠️ FORM DISABLED:</strong> Submissions won't work on GitHub Pages.
                    </div>
                    <p>Fill out the form below to become a volunteer. We'll contact you within 2-3 business days.</p>
                    
                    <!-- Original Form Integration -->
                    <form id="volunteer-form" method="POST" action="process-volunteer.php">
                        <div class="form-group">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="student-id">TUP Student ID (if applicable)</label>
                            <input type="text" id="student-id" name="student-id">
                        </div>
                        
                        <!-- Updated Availability Section - Now Date Selection -->
                        <div class="form-group">
                            <label>Select Dates You're Available</label>
                            <div class="checkbox-group" id="date-checkboxes">
                                <!-- Date checkboxes will be populated by JavaScript -->
                            </div>
                            <p class="form-hint">Please select all dates you're available to volunteer from our upcoming events.</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="experience">Previous Experience with Animals (if any)</label>
                            <textarea id="experience" name="experience" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="motivation">Why do you want to volunteer with TUP ComPAWnion?</label>
                            <textarea id="motivation" name="motivation" rows="4" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </form>

                    <div class="volunteer-benefits">
                        <h3>Volunteer Benefits</h3>
                        <div class="highlight-cards">
                            <div class="highlight-card">
                                <h4><i class="fas fa-award"></i> Training</h4>
                                <p>Receive comprehensive training in cat care, handling, and welfare practices</p>
                            </div>
                            <div class="highlight-card">
                                <h4><i class="fas fa-users"></i> Community</h4>
                                <p>Join a supportive community of animal lovers and make new friends</p>
                            </div>
                            <div class="highlight-card">
                                <h4><i class="fas fa-certificate"></i> Certification</h4>
                                <p>Earn volunteer certificates and recognition for your service hours</p>
                            </div>
                            <div class="highlight-card">
                                <h4><i class="fas fa-heart"></i> Impact</h4>
                                <p>Make a real difference in the lives of campus cats and the TUP community</p>
                            </div>
                        </div>
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