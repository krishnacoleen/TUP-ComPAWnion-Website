<?php 
session_start();
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['success'], $_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - TUP ComPAWnion</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <body class="donate-page"></body>
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
                    <li><a href="volunteer.php">Volunteer</a></li>
                    <li><a href="donate.php" class="active">Donate</a></li>
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
                <h1>Support Our Mission</h1>
                <p>Your donations help us provide food, medical care, and shelter for campus cats</p>
            </div>
        </section>

        <section class="impact-section">
            <div class="container">
                <h2>Impact Report</h2>
                <div class="impact-stats">
                    <div class="stat">
                        <h3>50+</h3>
                        <p>Cats Fed Weekly</p>
                    </div>
                    <div class="stat">
                        <h3>28</h3>
                        <p>Successful Adoptions</p>
                    </div>
                    <div class="stat">
                        <h3>45+</h3>
                        <p>Cats Vaccinated</p>
                    </div>
                    <div class="stat">
                        <h3>18</h3>
                        <p>Rescue Operations</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="donation-transparency">
            <div class="container">
                <h2>How Your Donation Helps</h2>
                <p>We believe in complete transparency. Here's how your contributions are used to make a difference:</p>
                
                <div class="donation-breakdown">
                    <div class="breakdown-item">
                        <div class="breakdown-percentage">50%</div>
                        <h4>Cat Foods & Treats</h4>
                        <p>Daily meals, nutritious cat food, and treats to keep rescued cats healthy and well-fed.</p>
                        <div class="breakdown-bar">
                            <div class="breakdown-fill" style="width: 40%"></div>
                        </div>
                    </div>
                    <div class="breakdown-item">
                        <div class="breakdown-percentage">25%</div>
                        <h4>Veterinary Carer</h4>
                        <p>Vet check-ups, vaccinations, medications, and emergency medical treatments.</p>
                        <div class="breakdown-bar">
                            <div class="breakdown-fill" style="width: 35%"></div>
                        </div>
                    </div>
                    <div class="breakdown-item">
                        <div class="breakdown-percentage">20%</div>
                        <h4>Vitamins & Cat Litter</h4>
                        <p>Supplements to boost immunity and clean, safe litter supplies for proper hygiene.</p>
                        <div class="breakdown-bar">
                            <div class="breakdown-fill" style="width: 15%"></div>
                        </div>
                    </div>
                    <div class="breakdown-item">
                        <div class="breakdown-percentage">5%</div>
                        <h4>Transportation & Others</h4>
                        <p>Transport for rescues, vet visits, and other unexpected operational expenses.</p>
                        <div class="breakdown-bar">
                            <div class="breakdown-fill" style="width: 10%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="donation-options">
            <div class="container">
                <div class="donation-tabs">
                    <button class="tab-btn active" data-tab="monetary">Monetary Donations</button>
                    <button class="tab-btn" data-tab="in-kind">In-Kind Donations</button>
                </div>
                
                <div class="tab-content active" id="monetary">
                    <h3>Make a Monetary Donation</h3>
                    <p>Your financial contributions help us cover veterinary bills, purchase food and supplies, and support our rescue operations.</p>
                    
                    <div class="payment-methods">
                        <h4>Payment Methods</h4>
                        <div class="method-options">
                            <div class="method-option">
                                <h5><i class="fas fa-mobile-alt"></i> GCash</h5>
                                <p>Scan the QR code below using your GCash app:</p>
                                <img src="assets/donate/gcash.png" alt="GCash QR Code" style="width: 150px; height: auto; margin: 10px auto; display: block;">
                                <p><strong>Mobile No.:</strong> +63 950 194 ****</p>
                                <p><strong>Account Name:</strong> FR*****E AI*A O.</p>
                                <p><strong>Reference:</strong> DONATION-[Your Name]</p>
                            </div>
                            <div class="method-option">
                                <h5><i class="fas fa-money-bill-wave"></i> Cash Donation</h5>
                                <p><strong>Drop-off Location:</strong> TUP-Manila USG Office
                                <p><strong>Office Hours:</strong> Mon-Fri, 9AM-5PM</p>
                                <p><strong>Receipts:</strong> Official receipts provided</p>
                                <p>If you have any other inquiries just message us on Facebook. </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="donation-form">
                        <h4>Donor Information</h4>
                         <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; text-align:center;">
                            <strong>⚠️ FORM DISABLED:</strong> Submissions won't work on GitHub Pages.
                        </div>
                        <form id="monetary-donation-form" action="config/process-donation.php" method="POST">
                            <div class="form-group">
                                <label for="donor-name">Full Name *</label>
                                <input type="text" id="donor-name" name="donor-name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="donor-email">Email Address *</label>
                                <input type="email" id="donor-email" name="donor-email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="donor-phone">Phone Number</label>
                                <input type="tel" id="donor-phone" name="donor-phone" placeholder="09XX XXX XXXX">
                            </div>
                            
                            <div class="form-group">
                                <label for="donation-amount">Donation Amount (₱) *</label>
                                <input type="number" id="donation-amount" name="donation-amount" required min="1">
                            </div>
                            
                            <div class="form-group">
                                <label for="payment-method">Payment Method *</label>
                                <select id="payment-method" name="payment-method" required>
                                    <option value="">Select payment method</option>
                                    <option value="gcash">GCash</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="donation-message">Message (Optional)</label>
                                <textarea id="donation-message" name="donation-message" rows="3" placeholder="Any special instructions or dedication..."></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="anonymous" value="yes"> 
                                    I would like to remain anonymous
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Proceed to Donation</button>
                        </form>
                    </div>
                </div>
                
                <div class="tab-content" id="in-kind">
                    <h3>In-Kind Donations</h3>
                    <p>We gratefully accept donations of cat food, supplies, and other items that help us care for our feline friends.</p>
                    
                    <div class="needed-items">
                        <h4>Items We Need</h4>
                        <ul>
                            <li><strong>Cat food</strong> - Wet and dry food (any brand)</li>
                            <li><strong>Cat litter</strong> - Clumping or non-clumping</li>
                            <li><strong>Food and water bowls</strong> - Stainless steel or ceramic preferred</li>
                            <li><strong>Cat carriers</strong> - All sizes for transport and vet visits</li>
                            <li><strong>Blankets and towels</strong> - Clean, used items accepted</li>
                            <li><strong>Cat toys</strong> - Interactive toys, scratching posts, catnip</li>
                            <li><strong>Cleaning supplies</strong> - Disinfectants, paper towels, garbage bags</li>
                            <li><strong>First aid supplies</strong> - Gauze, bandages, antiseptic solutions</li>
                            <li><strong>Flea and tick treatment</strong> - Drops, sprays, or collars</li>
                            <li><strong>Grooming supplies</strong> - Brushes, nail clippers, shampoo</li>
                        </ul>
                    </div>
                    
                    <div class="drop-off-info">
                        <h4>Drop-off Locations & Times</h4>
                        <p>You can drop off donations at the following locations:</p>
                        <ul>
                            <li><strong>Gate 1, 2, 3, & 4</strong> - Monday to Friday, 7:00 AM to 5:00 PM</li>
                            <li><strong>TUP Office of Student Affairs </strong>- Monday to Saturday, 7:00 AM to 5:00 PM</li>
                            <li><strong>TUP USG Office</strong>- Monday to Saturday, 7:00 AM to 5:00 PM</li>
                        </ul>
                        <p><strong>Note:</strong> Please call ahead for large donations or if you need assistance with drop-off.</p>
                    </div>
                    
                    <div class="donation-form">
                        <h4>Let Us Know What You're Donating</h4>
                         <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; text-align:center;">
                            <strong>⚠️ FORM DISABLED:</strong> Submissions won't work on GitHub Pages.
                        </div>
                        <form id="inkind-donation-form" action="config/process-donation.php" method="POST">
                            <div class="form-group">
                                <label for="inkind-name">Full Name *</label>
                                <input type="text" id="inkind-name" name="inkind-name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="inkind-email">Email Address *</label>
                                <input type="email" id="inkind-email" name="inkind-email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="inkind-phone">Phone Number</label>
                                <input type="tel" id="inkind-phone" name="inkind-phone" placeholder="09XX XXXX XXX">
                            </div>
                            
                            <div class="form-group">
                                <label for="donation-items">Items You're Donating *</label>
                                <textarea id="donation-items" name="donation-items" rows="4" required placeholder="Please list all items and quantities..."></textarea>
                            </div>
                            
                          <div class="form-group">
                            <label for="dropoff-location">Preferred Drop-off Location *</label>
                            <select id="dropoff-location" name="dropoff-location" required>
                                <option value="">Select location</option>
                                <option value="Gate 1">Gate 1</option>
                                <option value="Gate 2">Gate 2</option>
                                <option value="Gate 3">Gate 3</option>
                                <option value="Gate 4">Gate 4</option>
                                <option value="TUP Office of Student Affairs">Office of Student Affairs</option>
                                <option value="TUP USG Office">Office of TUP USG</option>
                            </select>
                        </div>
                            
                            <div class="form-group">
                                <label for="dropoff-date">Preferred Drop-off Date *</label>
                                <input type="date" id="dropoff-date" name="dropoff-date" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="special-instructions">Special Instructions</label>
                                <textarea id="special-instructions" name="special-instructions" rows="3" placeholder="Any special handling requirements or other information..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit Donation Information</button>
                        </form>
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