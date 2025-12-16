<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Cats - TUP ComPAWnion</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <body class="our-cats-page">
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
                    <li><a href="our-cats.php" class="active">Our Cats</a></li>
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
        <section class="page-header">
            <div class="container">
                <h1>TUP Cats Database</h1>
                <p>Get to know the cats around the TUP campus</p>
            </div>
        </section>

        <section class="cats-gallery">
            <div class="container">
                <!-- SMART FILTER SYSTEM -->
                <div class="smart-filter">
                    <!-- Search Box -->
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        
                        <!-- Active filters container -->
                        <div class="active-filters-container" id="active-filters-container">
                            <div id="active-filters"></div>
                        </div>
                        <!-- Search Input -->
                        <input type="text" id="cat-search" placeholder="Search by name or description..." autocomplete="off" />  
                        <!-- Clear all button -->
                        <button type="button" id="clear-all-btn" class="search-box-clear-btn">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    
                    <!-- Compact Filter Buttons (always visible) -->
                    <div class="add-filter-buttons">
                        <button class="add-filter-btn" data-filter-type="age">
                            <i class="fas fa-birthday-cake"></i> Age
                        </button>
                        <button class="add-filter-btn" data-filter-type="gender">
                            <i class="fas fa-venus-mars"></i> Gender
                        </button>
                        <button class="add-filter-btn" data-filter-type="status">
                            <i class="fas fa-tag"></i> Status
                        </button>
                        <button class="add-filter-btn" data-filter-type="location">
                            <i class="fas fa-map-marker-alt"></i> Location
                        </button>
                    </div>
                    
                    <!-- Active Filters (hidden when empty) -->
                    <div class="active-filters-container" id="active-filters-container">
                        <h4>Active Filters:</h4>
                        <div class="active-filters" id="active-filters">
                            <span class="no-filters">No filters applied</span>
                        </div>
                    </div>
                    
                    <!-- Compact Filter Panels (hidden by default) -->
                    <div class="filter-panel" id="age-panel">
                        <h4>Select Age Group:</h4>
                        <div class="filter-options inline">
                            <div class="filter-option" data-filter="kitten">Kitten</div>
                            <div class="filter-option" data-filter="adult">Adult</div>
                            <div class="filter-option" data-filter="senior">Senior</div>
                        </div>
                    </div>
                    
                    <div class="filter-panel" id="gender-panel">
                        <h4>Select Gender:</h4>
                        <div class="filter-options inline">
                            <div class="filter-option" data-filter="male">Male</div>
                            <div class="filter-option" data-filter="female">Female</div>
                        </div>
                    </div>
                    
                    <div class="filter-panel" id="status-panel">
                        <h4>Select Status:</h4>
                        <div class="filter-options inline">
                            <div class="filter-option" data-filter="adoptable">Available for Adoption</div>
                            <div class="filter-option" data-filter="adopted">Adopted</div>
                            <div class="filter-option" data-filter="resident">Campus Resident</div>
                        </div>
                    </div>
                    
                    <div class="filter-panel" id="location-panel">
                        <h4>Select Location:</h4>
                        <div class="filter-options inline">
                            <div class="filter-option" data-filter="cos-cla">COS/CLA</div>
                            <div class="filter-option" data-filter="cie-cafa">CIE/CAFA</div>
                            <div class="filter-option" data-filter="coe-irtc">COE/IRTC</div>
                            <div class="filter-option" data-filter="grounds">TUP Grounds</div>
                            <div class="filter-option" data-filter="cit">CIT</div>
                            <div class="filter-option" data-filter="uitc">UITC</div>
                        </div>
                    </div>
                </div>
                
                <div id="no-cats-message" class="no-events-message" style="display: none;">
                    <i class="fas fa-cat"></i>
                    <h3>No Cats Found</h3>
                    <p>No cats match your current filters. Try removing some filters.</p>
                </div>
                
                <div class="cats-grid">
                    <!-- COS/CLA CATS -->
                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-serene.png" alt="Serene">
                        </div>
                        <div class="cat-info">
                            <h3>Serene</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Clinic
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Torbie</p>
                            <p class="cat-personality">Friendly, affectionate, loves attention, curious but gentle</p>
                            <p class="cat-health">Healthy, spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Serene's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Serene was found near the Engineering building, hungry but friendly. She's been with us for 2 years and has become one of our most social cats. She loves chin scratches and will purr loudly when happy. Despite her rough start, Serene has maintained a sweet disposition and gets along well with other cats.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-odee.png" alt="Odee">
                        </div>
                        <div class="cat-info">
                            <h3>Odee</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Clinic
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">1 year old • Female • White</p>
                            <p class="cat-personality">Playful, curious, energetic, loves toys and climbing</p>
                            <p class="cat-health">Healthy, first vaccination done, spayed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Odee's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Odee was rescued from a drain near the cafeteria with her two siblings. While her siblings have been adopted, Odee is still waiting for her perfect home. She's full of energy and would do well in an active household. Odee is particularly fond of feather toys and laser pointers. She's also quite the acrobat, often surprising us with her climbing abilities.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-kalawang.png" alt="Kalawang">
                        </div>
                        <div class="cat-info">
                            <h3>Kalawang</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Lobby
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 years old • Female • Tortoiseshell</p>
                            <p class="cat-personality">Quiet, independent, observant, gentle with other cats</p>
                            <p class="cat-health">Healthy, vaccinated, spayed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Kalawang's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Kalawang has been a campus resident for 3 years now. She's comfortable around people but prefers quiet environments. She would be perfect for someone looking for a calm companion who enjoys peaceful coexistence. Kalawang was initially very shy when she first arrived, but she's gradually learned to trust our volunteers.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-thunder.png" alt="Thunder">
                        </div>
                        <div class="cat-info">
                            <h3>Thunder</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Baro
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">4 years old • Male • Mackerel Tabby</p>
                            <p class="cat-personality">Calm, gentle, loves napping in front of Baro, excellent lap cat</p>
                            <p class="cat-health">Healthy condition overall, spayed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Thunder's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Thunder was a former pet who was abandoned near campus. He's been with us for 4 years and is one of our longest residents. He's in good health and has many loving years ahead. Thunder has a distinctive purr that sounds like a little motor.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-catriona.png" alt="Catriona">
                        </div>
                        <div class="cat-info">
                            <h3>Catriona</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 years old • Female • Orange Tabby</p>
                            <p class="cat-personality">Playful, affectionate, intelligent, loves interactive toys</p>
                            <p class="cat-health">Healthy, first vaccination done, dewormed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Catriona's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Catriona was found alone near the library. She's a bright, curious cat who loves exploring and playing. She gets along well with other cats and would thrive in a home where she can receive plenty of attention and stimulation. Catriona has a particular talent for figuring out puzzle toys.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-tommy.png" alt="Tommy">
                        </div>
                        <div class="cat-info">
                            <h3>Tommy</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">6 years old • Male • Bicolor Tabby</p>
                            <p class="cat-personality">Affectionate but independent, comfortable with people</p>
                            <p class="cat-health">Recovering well, neutered</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Tommy's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Tommy was rescued with a severe injury that required special care. He's FIV positive but can live a long, healthy life with proper care. He needs a special diet and regular vet checkups. Despite his challenges, he's one of the sweetest cats you'll ever meet. Tommy's previous life was difficult, but he hasn't let that dampen his spirit.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-veronica.png" alt="Veronica">
                        </div>
                        <div class="cat-info">
                            <h3>Veronica</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 years old • Female • Bicolor</p>
                            <p class="cat-personality">Calm around people, loves sunbathing </p>
                            <p class="cat-health">Vaccinated, spayed, monitored due to past injury</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Veronica's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Veronica was first noticed near the COS area limping slightly after what appeared to be a minor paw injury. Volunteers kept a close eye on her, ensuring she was fed regularly and received proper care until she fully recovered. She gradually settled into the area, choosing quiet spots where she could observe people from a distance. Today, Veronica moves confidently around COS, occasionally approaching familiar faces for gentle affection. Her calm and resilient nature makes her a steady presence in the science buildings.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cos-cla" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cos-cla-bingotchi.png" alt="Bingotchi">
                        </div>
                        <div class="cat-info">
                            <h3>Bingotchi</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">8 years old • Male • Tabby</p>
                            <p class="cat-personality">Sweet, gentle, low-energy, enjoys interacting with students</p>
                            <p class="cat-health">Neutered, done with vaccination</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Bingotchi's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Bingotchi appeared around the COS buildings, often following students who carried food. His outgoing behavior quickly made him noticeable, and volunteers ensured he was vaccinated and regularly fed. Over time, Bingotchi became well-known for greeting passersby and lounging near busy walkways. He enjoys playful interactions and short naps between social visits. Bingotchi’s cheerful and friendly personality brings energy and warmth to the COS area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- CIE/CAFA CATS -->
                    <div class="cat-profile" data-category="adult" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-ayah.png" alt="Ayah">
                        </div>
                        <div class="cat-info">
                            <h3>Ayah</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CAFA Garden
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Tricolor</p>
                            <p class="cat-personality">Quiet, observant, gentle, independent but affectionate once comfortable</p>
                            <p class="cat-health">Healthy, spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Ayah's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Ayah was discovered resting under a parked motorcycle near the library, keeping to herself and watching students pass by. At first, she was shy and would only approach when food was placed nearby. Over time, Ayah learned to trust her feeders and slowly began seeking gentle pets. She's been part of the community for 2 years now and has grown into a calm, comforting presence on campus. Ayah enjoys quiet corners, afternoon naps, and will softly meow when she recognizes familiar faces.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-cole.png" alt="Cole">
                        </div>
                        <div class="cat-info">
                            <h3>Cole</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CAFA Garden
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Bicolor</p>
                            <p class="cat-personality">Playful, confident, curious, affectionate, energetic</p>
                            <p class="cat-health">Healthy, spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Cole's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Cole was first found roaming around CAFA, often seen lounging and playing in the CAFA Garden. She quickly became a familiar sight among students, confidently approaching anyone who passed by and greeting them with soft meows and head bumps. Unlike most stray cats, Cole was never shy and seemed to enjoy human company from the start. She has been cared for by volunteers for nearly two years and has made the garden her favorite hangout.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-nesty.png" alt="Nesty">
                        </div>
                        <div class="cat-info">
                            <h3>Nesty</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CAFA Building
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Tortoiseshell</p>
                            <p class="cat-personality">Sweet, calm, observant, gentle, shy at first</p>
                            <p class="cat-health">Spayed, under monitoring for mild skin sensitivity</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Nesty's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Nesty was first spotted quietly observing students from a distance, a bit shy but curious. Over time, she grew comfortable with gentle pets and has become a calming presence at CAFA. Nesty enjoys peaceful naps in quiet corners and watching the daily campus bustle. Her gentle personality and striking tortoiseshell coat make her a favorite among those who take the time to get to know her.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="senior" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-mamachapel.png" alt="Mama Chapel">
                        </div>
                        <div class="cat-info">
                            <h3>Mama Chapel</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Chapel
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">11 years old • Female • Tricolor</p>
                            <p class="cat-personality">Gentle, affectionate, calm, wise, enjoys being petted</p>
                            <p class="cat-health">Special diet required, spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Mama Chapel's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Mama Chapel was found near the chapel, weak and in need of care. She had clearly lived a difficult life, but with time and attention from volunteers, she recovered and became healthy. Now, she enjoys quiet afternoons in the sun, gentle pets, and sitting near those who visit the chapel. Despite her challenging past, Mama Chapel has a calm and affectionate personality, bringing comfort and warmth to everyone around her.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-lalabsjr.png" alt="Lalabs Jr.">
                        </div>
                        <div class="cat-info">
                            <h3>Lalabs Jr.</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Chapel
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">6 months old • Male • Bicolor</p>
                            <p class="cat-personality">Playful, curious, energetic, affectionate</p>
                            <p class="cat-health">Vaccination on going, under observation for growth and nutrition</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Lalabs Jr.'s Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Lalabs Jr. was discovered near the campus chapel, meowing loudly as if calling for help. He had been separated from his mother and was weak from hunger. Volunteers quickly brought him in, giving him proper food, warmth, and medical attention. With daily care, Lalabs Jr. grew stronger and began showing his playful, affectionate personality. Now, he loves exploring the chapel grounds, chasing shadows, and snuggling with those who spend time with him.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-sos.png" alt="SOS">
                        </div>
                        <div class="cat-info">
                            <h3>SOS</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 4
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">3 years old • Male • Bicolor White/Orange</p>
                            <p class="cat-personality">Alert, cautious, loyal, independent but warms up to friendly faces</p>
                            <p class="cat-health">Healthy, neutered, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Sos' Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>SOS has made Gate 4 his home, often keeping the campus guards company as he observes the comings and goings of students. He enjoys resting nearby, receiving gentle pets, and occasionally following familiar faces along the gate area. SOS has grown into a calm and loyal companion, bringing comfort and quiet joy to everyone around him.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-perlas.png" alt="Perlas">
                        </div>
                        <div class="cat-info">
                            <h3>Perlas</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Canteen
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">5 years old • Female • Tabby</p>
                            <p class="cat-personality">Friendly, playful, curious, affectionate</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but requires regular dental check-ups</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Perlas' Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Perlas is an adult female cat who was found near the Canteen, scavenging for food and looking for a safe place to stay. Volunteers took her in, giving her proper care and vaccinations, and she quickly adapted to her new environment. Now, Perlas has made the canteen area her home, often interacting with students and staff during breaks. She enjoys exploring the surroundings, basking in sunny spots, and seeking attention from those passing by. Despite her early struggles, Perlas has grown into a lively and affectionate cat, bringing cheer and warmth to the canteen every day.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cie-cafa" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cie-cafa-diwata.png" alt="Diwata">
                        </div>
                        <div class="cat-info">
                            <h3>Diwata</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CAFA Dean's Office
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">3 years old • Female • White</p>
                            <p class="cat-personality">Calm, graceful, observant, affectionate, enjoys quiet spaces</p>
                            <p class="cat-health">Healthy but prone to mild allergies, spayed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Diwata's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Diwata is an adult female cat who was found near the CAFA Dean's Office, looking lost and a bit undernourished. Volunteers took her in and provided care, food, and vaccinations, helping her regain her strength. She has since made the Dean's Offi area her home, often resting and quietly observing people as they come and go. Diwata enjoys gentle pets from familiar faces and has a calm, comforting presence that endears her to staff and students alike.
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- COE/IRTC CATS -->
                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-meymey.png" alt="Meymey">
                        </div>
                        <div class="cat-info">
                            <h3>Meymey</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> COE Shed
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Calico</p>
                            <p class="cat-personality">Playful, curious, friendly, enjoys company but independent at times</p>
                            <p class="cat-health">Healthy, spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Meymey's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Meymey was found near the College of Engineering (COE) Shed, looking alert and cautious. Volunteers rescued her, provided proper food and care, helping her regain her health. She has since made the shed area her home, often exploring the surroundings, climbing on structures, and interacting with students and staff who visit. Meymey enjoys attention when offered but also loves her quiet moments alone.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-monmon.png" alt="Monmon">
                        </div>
                        <div class="cat-info">
                            <h3>Monmon</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> COE Shed
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">2 years old • Male • White</p>
                            <p class="cat-personality">Calm, observant, friendly once familiar, enjoys company</p>
                            <p class="cat-health">Monitored for digestive sensitivity</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Monmon's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Volunteers noticed him patiently waiting near the shed for scraps of food and decided to care for him. Unlike many cats, Monmon had a habit of following students who lingered nearby, quietly observing without approaching too quickly. Over time, he learned to trust humans and now enjoys resting on the shed's shaded benches, occasionally joining students who work late. Monmon's calm and patient nature makes him a gentle companion, quietly adding life to the COE Shed area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-pawpaw.png" alt="Pawpaw">
                        </div>
                        <div class="cat-info">
                            <h3>Pawpaw</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> COE Shed
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">1 years old • Female • Calico</p>
                            <p class="cat-personality">Playful, curious, mischievous, affectionate once comfortable</p>
                            <p class="cat-health">Healthy, spayed, vaccination on going</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Pawpaw's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Pawpaw was discovered hiding under the bushes near the COE Shed, seemingly trying to avoid the busy campus paths. Volunteers provided her food and a safe space to settle. Unlike many cats, Pawpaw has a mischievous streak. She loves exploring small corners, climbing shelves, and playfully pouncing on shadows. Over time, she has warmed up to the students and staff who visit the shed, often nudging for pets or curling up nearby during breaks.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-pogi_smokey.png" alt="Pogi_Smokey">
                        </div>
                        <div class="cat-info">
                            <h3>Pogi_Smokey</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> COE Shed
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">3 years old • Male • Tabby</p>
                            <p class="cat-personality">Confident, friendly, social, enjoys attention and naps</p>
                            <p class="cat-health">Neutered and vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Pogi_Smokey's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Pogi_Smokey is an adult male cat who was first spotted lounging on a pile of materials near the COE Shed, looking comfortable but a little scruffy. Volunteers noticed him regularly interacting with students passing by and decided to provide care, food, and vaccinations. He quickly became known for his friendly demeanor, often greeting anyone who approaches and seeking out warm spots for naps.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-kuzan.png" alt="Kuzan">
                        </div>
                        <div class="cat-info">
                            <h3>Kuzan</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> COE Shed
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">1 year old • Male • Tabby</p>
                            <p class="cat-personality">Energetic, curious, adventurous, affectionate once comfortable</p>
                            <p class="cat-health">Neutered, regular check-ups</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Kuzan's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Kuzan was found near the COE Shed, exploring the area alone and looking for food. Volunteers noticed his fearless curiosity as he navigated through piles of equipment and brought him in for care and food. He quickly adapted to his new home and is now known for his adventurous spirit. Despite his energetic nature, Kuzan enjoys curling up next to familiar humans for attention and pets.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-bella_ash.png" alt="Bella_Ash">
                        </div>
                        <div class="cat-info">
                            <h3>Bella_Ash</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Concrete Lab
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Tortoiseshell Tabby</p>
                            <p class="cat-personality">Calm, observant, affectionate, enjoys quiet spots</p>
                            <p class="cat-health">Healthy, spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Bella_Ash's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Bella_Ash was found crying near IRTC, appearing wary and undernourished. Volunteers took her in, providing food and care to help her regain strength. She gradually became comfortable with the students and staff, often choosing to rest on benches or sunny corners while observing the activities around her. Bella_Ash enjoys gentle pets and quiet companionship.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-mosh.png" alt="Mosh">
                        </div>
                        <div class="cat-info">
                            <h3>Mosh</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Concrete Lab
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">1 year old • Female • Calico</p>
                            <p class="cat-personality">Playful, bold, curious, affectionate once comfortable</p>
                            <p class="cat-health">Spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Mosh's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Mosh was discovered near the Library, hiding behind trash bins and cautiously observing students. Volunteers rescued her, providing food, vaccinations, and a safe space to settle. Over time, Mosh revealed her playful side, often chasing leaves, pouncing on shadows, and exploring every corner she can find. She has grown affectionate toward familiar students and staff, seeking pets and attention on her own terms.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="coe-irtc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/coe-irtc-summer.png" alt="Summer">
                        </div>
                        <div class="cat-info">
                            <h3>Summer</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> IRTC
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">1 year old • Female • Calico</p>
                            <p class="cat-personality">Gentle, calm, affectionate, enjoys sunny spots and quiet attention</p>
                            <p class="cat-health">Constant monitoring, spayed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Summer's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Summer was found resting near the Garden area of the campus, looking tired and hungry. She quickly adapted to her new surroundings after rescuing. She often spends her days lounging in sunny patches and quietly observing students and staff. Summer loves gentle pets and soft places to nap, making her a calm and comforting companion. Her gentle personality and serene presence have made her a beloved member of the campus cat community.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- TUP GROUNDS CATS -->
                    <div class="cat-profile" data-category="adult" data-location="grounds" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/grounds-butter.png" alt="Butter">
                        </div>
                        <div class="cat-info">
                            <h3>Butter</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> TUP Court
                                <span class="location-tag">TUP Grounds</span>
                            </p>
                            <p class="cat-age">5 years old • Female • Bicolor White/Orange</p>
                            <p class="cat-personality">Sweet, gentle, affectionate, enjoys sitting near people</p>
                            <p class="cat-health">Requires a soft diet for sensitive stomach</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Butter's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Butter is an adult female cat who was found near the Campus Court, looking hungry and a bit wary of passersby. Volunteers took her in, providing food, vaccinations, and care to help her regain her strength. She has since made the Campus Court her home, often curling up on benches or following familiar students around. Butter loves gentle pets and quietly observing her surroundings, bringing calm and warmth to the area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="grounds" data-status="resident"> 
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/grounds-diamond.png" alt="Diamond">
                        </div>
                        <div class="cat-info">
                            <h3>Diamond</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> TUP Court
                                <span class="location-tag">TUP Grounds</span>
                            </p>
                            <p class="cat-age">1 year old • Male • Bicolor</p>
                            <p class="cat-personality">Confident, playful, social, enjoys attention</p>
                            <p class="cat-health">Neutered, vaccinated, healthy but needs regular check-ups</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Diamond's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Diamond was found wandering near the Campus Court, curious and alert as he explored the area. Volunteers took him in, providing food, vaccinations, and a safe space to stay. He quickly became known for his playful nature, often interacting with students, chasing leaves, and lounging in sunny spots. Diamond enjoys attention from familiar faces and has grown into a lively and sociable companion, bringing energy and charm to the Campus Court.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="grounds" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/grounds-narie.png" alt="Narie">
                        </div>
                        <div class="cat-info">
                            <h3>Narie</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Admin Shed
                                <span class="location-tag">TUP Grounds</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Tricolor Tabby</p>
                            <p class="cat-personality">Calm, gentle, affectionate, enjoys quiet companionship</p>
                            <p class="cat-health">Monitored for mild skin sensitivity, spayed</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Narie's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Narie is an adult female cat who was discovered near the Admin Shed, appearing thin and cautious. Volunteers provided food, care, and vaccinations, helping her regain her health. She has since made the shed her home, often resting in quiet corners and quietly observing staff and students. Narie enjoys gentle pets from familiar people and has grown into a calm and affectionate presence, bringing comfort and warmth to the Admin Shed area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="grounds" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/grounds-netasha.png" alt="Netasha">
                        </div>
                        <div class="cat-info">
                            <h3>Netasha</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> TUP Backstage
                                <span class="location-tag">TUP Grounds</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Orange Tabby</p>
                            <p class="cat-personality">Playful, energetic, curious, affectionate once comfortable</p>
                            <p class="cat-health">Spayed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Netasha's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Netasha is an adult female cat who was found near the Backstage area, wandering alone and curious about the commotion around her. Volunteers rescued her, providing food, vaccinations, and a safe space to settle. She quickly showed her playful personality, enjoying chasing shadows, exploring backstage nooks, and seeking attention from students and staff. Netasha has become a lively and affectionate companion, bringing cheer and curiosity to the Backstage area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="grounds" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/grounds-polka.png" alt="Polka">
                        </div>
                        <div class="cat-info">
                            <h3>Polka</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> TUP Backstage
                                <span class="location-tag">TUP Grounds</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Calico</p>
                            <p class="cat-personality">Sweet, calm, observant, enjoys quiet corners</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but prone to mild seasonal sneezing</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Polka's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Polka is an adult female cat who was discovered near the Backstage area, hiding in storage corners and looking wary of people. Volunteers brought her in, giving her food, care, and vaccinations. Over time, she has grown comfortable in her surroundings, often resting quietly and observing the activity around her. Polka enjoys gentle attention from familiar faces and has become a calm and comforting presence backstage, adding warmth to the busy area</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="grounds" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/grounds-taho.png" alt="Taho">
                        </div>
                        <div class="cat-info">
                            <h3>Taho</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> TUP Backstage
                                <span class="location-tag">TUP Grounds</span>
                            </p>
                            <p class="cat-age">3 years old • Female • Calico</p>
                            <p class="cat-personality">Playful, affectionate, curious, loves interacting with people</p>
                            <p class="cat-health">Healthy but requires flea prevention</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Taho's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Taho is an adult female cat who was found near the Backstage area, exploring the spaces behind the stage and looking for food. Volunteers rescued her, providing care, vaccinations, and a safe home. She has since become known for her playful antics, enjoying climbing, chasing small objects, and seeking attention from students and staff. Taho's energetic and affectionate personality makes her a lively and beloved companion in the Backstage area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- CIT CATS -->
                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-citi.png" alt="Citi">
                        </div>
                        <div class="cat-info">
                            <h3>Citi</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT Building
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Orange Tabby</p>
                            <p class="cat-personality">Playful, curious, affectionate, enjoys attention</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but requires occasional grooming</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Citi's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Citi is a female cat who has made the CIT Building her home. She was first spotted hiding among potted plants, observing students as they passed by. Volunteers ensured she received proper food and vaccinations, helping her stay healthy. Citi loves exploring corners, chasing shadows, and curling up on warm benches for naps. Her playful and affectionate nature makes her a cheerful presence in the CIT Building.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-mosh.png" alt="Mosh">
                        </div>
                        <div class="cat-info">
                            <h3>Mosh</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT 2nd Floor
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">3 years old • Male • Bicolor</p>
                            <p class="cat-personality">Energetic, bold, social, loves to explore the campus</p>
                            <p class="cat-health">Healthy, neutered, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Mosh's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Mosh is a male cat residing on the 2nd Floor of the CIT Building. He was often seen roaming hallways and peeking into classrooms, curious about everything around him. Volunteers feed and check on him regularly, keeping him healthy. Mosh enjoys climbing railings, following students, and playfully interacting with other campus cats. His adventurous spirit and friendly nature make him a favorite among those on the 2nd floor.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-whitney.png" alt="Whitney">
                        </div>
                        <div class="cat-info">
                            <h3>Whitney</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT 2nd Floor
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Male • White</p>
                            <p class="cat-personality">Calm, observant, gentle, enjoys quiet spaces</p>
                            <p class="cat-health">Neutered, vaccinated, healthy but prone to allergies</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Whitney's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Whitney is a male cat who lives on the CIT 2nd Floor, often resting in quiet corners and observing students. He was first noticed calmly watching the hallway activity before volunteers started regularly providing food and vaccinations. Whitney enjoys lounging in shaded areas and gentle pets from familiar faces. His calm and soothing presence has made him a comforting companion on the 2nd floor.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-cotton.png" alt="Cotton">
                        </div>
                        <div class="cat-info">
                            <h3>Cotton</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT Shed
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">5 years old • Male • Bicolor White/Orange</p>
                            <p class="cat-personality">Friendly, playful, affectionate, enjoys company</p>
                            <p class="cat-health">Regular monitoring due to past injuries</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Cotton's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Cotton is a male cat residing at the CIT Shed, often seen exploring under benches and among equipment. Volunteers provide him with food, vaccinations, and care to maintain his health. Cotton loves sunny spots, playful chases, and curling up next to familiar students. His sociable and affectionate nature makes him a lively and beloved resident of the shed.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-kambal.png" alt="CIT Kambal">
                        </div>
                        <div class="cat-info">
                            <h3>CIT Kambal</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT Shed
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Bicolor White/Orange</p>
                            <p class="cat-personality">Calm, gentle, observant, affectionate</p>
                            <p class="cat-health">Healthy, spayed, first dose of vaccination done</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read CIT Kambal's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>CIT Kambal is a female cat who calls the CIT Shed her home. She was first spotted resting quietly in hidden corners, watching the activity around her. Volunteers provide regular food and vaccinations. She enjoys gentle attention and spending peaceful moments observing students. CIT Kambal's calm and affectionate personality brings comfort and warmth to the shed area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-maple.png" alt="Maple">
                        </div>
                        <div class="cat-info">
                            <h3>Maple</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT Carport
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">4 years old • Female • Orange Tabby</p>
                            <p class="cat-personality">Playful, curious, friendly, enjoys exploration</p>
                            <p class="cat-health">Spayed, vaccinated, requires monitoring due to past infection</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Maple's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Maple is a female cat at the CIT Carport who was first noticed as a tiny kitten hiding under parked cars. She had a mild respiratory infection when volunteers first spotted her, but with consistent food and care, she quickly regained her health. Now fully grown, Maple enjoys exploring the carport, chasing shadows, and greeting students who pass by. Her playful and affectionate nature makes her a lively and beloved presence in the area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-alfred.png" alt="Alfred">
                        </div>
                        <div class="cat-info">
                            <h3>Alfred</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> CIT Carport
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Male • White</p>
                            <p class="cat-personality">Calm, observant, friendly, enjoys company</p>
                            <p class="cat-health">Neutered, under treatment for minor infection, stable</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Alfred's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Alfred is a male cat who lives at the CIT Carport. He was first noticed quietly resting under the shade, observing students as they walked by. Volunteers regularly provide food and check on his health. Alfred enjoys lounging in quiet areas and gentle pets from familiar faces. His calm and friendly nature has made him a comforting presence in the carport area.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-nini.png" alt="Nini">
                        </div>
                        <div class="cat-info">
                            <h3>Nini</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 5
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">1 year old • Female • Calico</p>
                            <p class="cat-personality">Playful and energetic, loves toys, movement, and interactive playtime</p>
                            <p class="cat-health">Deworming on going</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Nini's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Nini is a female cat who resides near Gate 5, often seen exploring the area and following students curiously. Volunteers ensure she has regular food and vaccinations. Nini enjoys playful chases, napping in sunny spots, and interacting with familiar faces. Her energetic and affectionate nature brings joy and liveliness to Gate 5.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-barracks_ponkan.png" alt="Barracks_Ponkan">
                        </div>
                        <div class="cat-info">
                            <h3>Barracks_Ponkan</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 5
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Orange Tabby</p>
                            <p class="cat-personality">Gentle, calm, observant, affectionate</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but prone to mild seasonal sneezing</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Barracks_Ponkan's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Barracks_Ponkan was discovered hiding under the barracks roof after getting caught in a sudden rainstorm. She had a minor cold and appeared weak, but volunteers made sure she had food, vaccinations, and a safe spot to recover. Over time, she grew confident and now enjoys resting on benches and observing the daily activity at Gate 5. Her gentle and calm personality makes her a comforting companion for students and staff alike.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-kahel.png" alt="Kahel">
                        </div>
                        <div class="cat-info">
                            <h3>Kahel</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 5
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Orange Tabby</p>
                            <p class="cat-personality">Curious explorer with lots of energy and enthusiasm for play</p>
                            <p class="cat-health">Spayed, requires flea treatment</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Kahel's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Kahel was first noticed at Gate 5 as a tiny kitten hiding near the plants, separated from her mother for a few hours. Volunteers monitored her growth, giving her food and vaccinations, and she quickly caught up to her peers. Now fully grown, Kahel loves chasing leaves, exploring hidden corners, and playing with other campus cats. Her energetic and curious personality brings cheer to everyone who passes by.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-nick_blacky.png" alt="Nick_Blacky">
                        </div>
                        <div class="cat-info">
                            <h3>Nick_Blacky</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 5
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">2 years old • Male • Black Domestic</p>
                            <p class="cat-personality">Very affectionate and people-oriented, loves being around humans and receiving attention</p>
                            <p class="cat-health">Normal appetite, neutered</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Nick_Blacky's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Nick_Blacky was spotted near Gate 5 with a scratched ear, likely from a scuffle with other cats while defending his spot. Volunteers made sure he was fed and healthy with regular checkups and vaccinations. Now recovered, he roams confidently around the area, greeting students and exploring the surroundings. Nick_Blacky’s bold and friendly personality makes him a standout among the campus cats.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-lucinda.png" alt="Lucinda">
                        </div>
                        <div class="cat-info">
                            <h3>Lucinda</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 5
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">3 years old • Female • Calico</p>
                            <p class="cat-personality">Calm, gentle, observant, affectionate</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but prone to mild skin sensitivity</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Lucinda's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Lucinda was first found at Gate 5 with a small skin irritation that required careful monitoring. Volunteers provided food, vaccinations, and applied gentle care to help her heal. Today, she enjoys sunbathing on benches, quietly watching students, and receiving pets from familiar faces. Her serene and affectionate nature has made her a beloved companion in her campus spot.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="cit" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cit-inday.png" alt="Inday">
                        </div>
                        <div class="cat-info">
                            <h3>Inday</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Gate 5
                                <span class="location-tag">CIT</span>
                            </p>
                            <p class="cat-age">1 year old • Female • Orange Mackerel Tabby</p>
                            <p class="cat-personality">Playful, curious, friendly, energetic</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but requires flea prevention</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Inday's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Inday was born near Gate 5 as part of a small litter. When first spotted, she had a minor eye infection, but volunteers kept a close eye on her health with food and vaccinations. She quickly grew strong and playful, exploring the gate area, chasing leaves, and interacting with students. Inday's lively and affectionate personality makes her a joyful presence for everyone nearby.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- UITC CATS -->
                    <div class="cat-profile" data-category="adult" data-location="uitc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/uitc-delmonte.png" alt="Delmonte">
                        </div>
                        <div class="cat-info">
                            <h3>Delmonte</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> UITC
                                <span class="location-tag">UITC</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Calico</p>
                            <p class="cat-personality">Protective, observant, quietly affectionate</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but previously underweight</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Delmonte's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Delmonte was first noticed staying close to trash bins, carefully waiting for leftovers and avoiding people. She appeared thin and tired, suggesting she had struggled to find food for some time. Volunteers began feeding her regularly and ensured she received vaccinations, slowly helping her regain strength. As her health improved, Delmonte became calmer and more trusting, often staying nearby instead of running away. Today, she remains a gentle and observant cat who quietly keeps watch over her surroundings.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="uitc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/uitc-snowbear.png" alt="Snowbear">
                        </div>
                        <div class="cat-info">
                            <h3>Snowbear</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> UITC
                                <span class="location-tag">UITC</span>
                            </p>
                            <p class="cat-age">2 years old • Male • White</p>
                            <p class="cat-personality">Calm, affectionate, enjoys quiet company</p>
                            <p class="cat-health">Neutered, vaccinated, healthy but had a past respiratory illness</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Snowbear's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Snowbear was found curled up in a shaded corner, barely moving and breathing with difficulty due to a respiratory infection. Volunteers closely monitored him, making sure he received proper food, rest, and vaccinations as he recovered. Over time, his strength returned, and so did his gentle personality. Snowbear now enjoys resting near people, accepting soft pets, and peacefully observing campus life. </p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="adult" data-location="uitc" data-status="resident">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/uitc-quickie.png" alt="Quickie">
                        </div>
                        <div class="cat-info">
                            <h3>Quickie</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> UITC
                                <span class="location-tag">UITC</span>
                            </p>
                            <p class="cat-age">2 years old • Female • Calico</p>
                            <p class="cat-personality">Energetic, alert, playful, curious</p>
                            <p class="cat-health">Spayed, vaccinated, healthy but prone to minor scratches from play</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read Quickie's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>Quickie earned her name after being spotted darting across pathways and narrowly avoiding passing feet and bicycles. She appeared fearless but had small scratches, likely from rough play and constant movement. Volunteers ensured she was vaccinated and kept well-fed to support her active lifestyle. Even now, Quickie rarely stays in one place for long, always exploring and chasing anything that moves. Her fast-paced energy and playful nature make her one of the most lively cats on campus.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Campus Resident</div>
                                <a href="volunteer.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- KITTENS FOR ADOPTION -->
                    <div class="cat-profile" data-category="kitten" data-location="coe-irtc" data-status="adoptable">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/conlabming1.png" alt="ConLabMing1">
                        </div>
                        <div class="cat-info">
                            <h3>ConLabMing1</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Concrete Lab
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">3 months old • Female • Orange Tabby</p>
                            <p class="cat-personality">Fun-loving personality that enjoys running, jumping, and discovering new things</p>
                            <p class="cat-health">For adoption, vaccinated, deworming ongoing</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read ConLabMing1's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>ConLabMing1 is a young kitten born to one of the campus cats near the Concrete Laboratory. From an early age, this kitten was surrounded by students and volunteers who ensured proper feeding and care. Growing up in a safe campus environment allowed ConLabMing1 to develop a playful and trusting personality. Now healthy and curious, this kitten is ready to leave campus life behind and find a permanent, loving home.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <a href="#adoption-info" class="btn btn-primary">Adoption Info</a>
                                <a href="#adoption-form-section" class="btn btn-secondary adopt-me-btn" 
                                    data-cat-name="ConLabMing1" data-cat-image="assets/our-cats/conlabming1.png">
                                    Adopt Me!
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="coe-irtc" data-status="adoptable">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/conlabming2.png" alt="ConLabMing2">
                        </div>
                        <div class="cat-info">
                            <h3>ConLabMing2</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Concrete Lab
                                <span class="location-tag">COE/IRTC</span>
                            </p>
                            <p class="cat-age">3 months old • Female • Mackerel Tabby</p>
                            <p class="cat-personality">Observant and cautious, warms up slowly but forms strong bonds</p>
                            <p class="cat-health">For adoption, vaccinated, deworming ongoing</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read ConLabMing2's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>ConLabMing2 is a kitten born on campus, the child of a community cat from the Concrete Laboratory area. Volunteers kept a close watch during the early weeks, making sure the kitten stayed warm, fed, and safe. Slightly more observant than playful at first, ConLabMing2 has grown into a gentle and affectionate kitten. Now ready for adoption, this little one is hoping for a quiet home filled with care and patience.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <a href="#adoption-info" class="btn btn-primary">Adoption Info</a>
                                <a href="#adoption-form-section" class="btn btn-secondary adopt-me-btn" 
                                    data-cat-name="ConLabMing2" data-cat-image="assets/our-cats/conlabming2.png">
                                    Adopt Me!
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cie-cafa" data-status="adoptable">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/chapelming1.png" alt="ChapelMing1">
                        </div>
                        <div class="cat-info">
                            <h3>ChapelMing1</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Chapel
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">3 months old • Male • Bicolor</p>
                            <p class="cat-personality">Sweet, calm, affectionate, enjoys human presence</p>
                            <p class="cat-health">For adoption, vaccinated, deworming ongoing</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read ChapelMing1's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>ChapelMing1 was born to a campus cat who made her home near the Campus Chapel. Raised in a peaceful environment, the kitten grew accustomed to soft voices and gentle handling from volunteers. With regular feeding and care, ChapelMing1 grew healthy and trusting. This sweet kitten is now looking for a forever home where she can continue growing with love and attention.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                               <a href="#adoption-info" class="btn btn-primary">Adoption Info</a>
                                <a href="#adoption-form-section" class="btn btn-secondary adopt-me-btn" 
                                    data-cat-name="ChapelMing1" data-cat-image="assets/our-cats/chapelming1.png">
                                    Adopt Me!
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cie-cafa" data-status="adoptable">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/chapelming2.png" alt="ChapelMing2">
                        </div>
                        <div class="cat-info">
                            <h3>ChapelMing2</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> Chapel
                                <span class="location-tag">CIE/CAFA</span>
                            </p>
                            <p class="cat-age">3 months old • Female • Bicolor White/Orange</p>
                            <p class="cat-personality">Warm and friendly personality, happiest when spending time with people</p>
                            <p class="cat-health">For adoption, first dose of vaccine done</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read ChapelMing2's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>ChapelMing2 is a lively kitten born on campus to a community cat near the Chapel area. From a young age, this kitten showed curiosity, often exploring nearby corners and playing with siblings. Volunteers ensured proper nutrition and vaccinations, helping ChapelMing2 grow strong. Now full of energy and affection, this kitten is ready to be adopted into a home that can match her playful spirit.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <a href="#adoption-info" class="btn btn-primary">Adoption Info</a>
                                <a href="#adoption-form-section" class="btn btn-secondary adopt-me-btn" 
                                    data-cat-name="ChapelMing2" data-cat-image="assets/our-cats/chapelming2.png">
                                    Adopt Me!
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cos-cla" data-status="adopted">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cosming1.png" alt="COSMing1">
                        </div>
                        <div class="cat-info">
                            <h3>COSMing1</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 months old • Male • Tabby</p>
                            <p class="cat-personality">Loving companion who bonds easily and enjoys human interaction</p>
                            <p class="cat-health">Healthy, dewormed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read COSMing1's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>COSMing1 was born on campus to a community cat near the COS area and was cared for by volunteers during the early weeks of life. Surrounded by people and siblings, this kitten grew playful and confident. With proper feeding and vaccinations, COSMing1 grew strong and healthy. He has since been adopted into a loving home, marking a happy ending to his campus story.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Adopted</div>
                                <a href="blog.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cos-cla" data-status="adopted">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cosming2.png" alt="COSMing2">
                        </div>
                        <div class="cat-info">
                            <h3>COSMing2</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 months old • Male • Tabby</p>
                            <p class="cat-personality">Quiet and reserved, prefers gentle handling and a calm environment</p>
                            <p class="cat-health">Healthy, dewormed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read COSMing2's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>COSMing2 was one of the kittens born to a campus cat near the COS area. From an early age, this kitten showed a calm and gentle nature, often staying close to familiar faces. Volunteers ensured proper care and vaccinations until adoption. COSMing2 has now found a permanent home, where she can continue growing in a safe and loving environment.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Adopted</div>
                                <a href="blog.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cos-cla" data-status="adopted">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cosming3-adopted.png" alt="COSMing3">
                        </div>
                        <div class="cat-info">
                            <h3>COSMing3</h3>
                             <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 months old • Male • Tabby</p>
                            <p class="cat-personality">Playful and energetic, loves toys, movement, and interactive playtime</p>
                            <p class="cat-health">Healthy, dewormed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read COSMing3's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>COSMing3 grew up on campus as the child of a community cat near the COS area. Known for boundless energy and curiosity, this kitten was always the first to explore new spaces. With the help of volunteers, COSMing3 received proper care and vaccinations. He has since been adopted and is now starting a new chapter in a home filled with love and play.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Adopted</div>
                                <a href="blog.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cos-cla" data-status="adopted">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/cosming4.png" alt="COSMing4">
                        </div>
                        <div class="cat-info">
                            <h3>COSMing4</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 months old • Male • Tabby</p>
                            <p class="cat-personality">Enjoys cuddles and staying close, often seeking comfort from people</p>
                            <p class="cat-health">Healthy, dewormed, vaccinated</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read COSMing4's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>COSMing4 was born on campus to a community cat near the COS area and was raised with consistent care from volunteers. This kitten quickly became known for a sweet and affectionate personality, often seeking gentle attention. After growing healthy and strong, COSMing4 was adopted into a loving home. Her adoption marks a joyful success story for the campus cat community.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <div class="btn btn-primary status-static">Adopted</div>
                                <a href="blog.php" class="btn btn-secondary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="cat-profile" data-category="kitten" data-location="cos-cla" data-status="adoptable">
                        <div class="cat-image-placeholder">
                            <img src="assets/our-cats/auxming1.png" alt="AuxMing1">
                        </div>
                        <div class="cat-info">
                            <h3>AuxMing1</h3>
                            <p class="cat-location">
                                <i class="fas fa-map-marker-alt"></i> 3rd Floor
                                <span class="location-tag">COS/CLA</span>
                            </p>
                            <p class="cat-age">3 months old • Female • Tricolor Tabby</p>
                            <p class="cat-personality">Shy at first, gentle, affectionate once comfortable</p>
                            <p class="cat-health">Deworming ongoing, needs regular vet check-ups</p>
                            <div class="cat-story">
                                <button class="story-toggle-btn">
                                    Read AuxMing1's Story 
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="story-content">
                                    <p>AuxMing1 is a young kitten born to a campus cat near the Auxiliary area. During the early weeks, volunteers carefully watched over the litter to ensure safety and proper feeding. Though initially shy, AuxMing1 slowly began to trust people and accept gentle affection. Now healthy and growing, this kitten is ready to leave campus life and find a patient, loving home to call her own.</p>
                                </div>
                            </div>
                            <div class="cat-actions">
                                <a href="#adoption-info" class="btn btn-primary">Adoption Info</a>
                                <a href="mailto:tupcompawinion@tup.edu.ph?subject=Adopt AuxMing1" class="btn btn-secondary">Adopt Me!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cats-pagination-container" class="pagination"></div>
            </div>
        </section>

        <!-- Adoption Guidelines Section -->
        <section class="adoption-guidelines" id="adoption-info">
            <div class="container">
                <h2>Adoption & Fostering Guidelines</h2>
                <p>We want to ensure our cats find loving, permanent homes. Please review our adoption process and requirements below.</p>
                
                <div class="guideline-steps">
                    <div class="guideline-step">
                        <div class="step-number">1</div>
                        <h3>Application</h3>
                        <p>Fill out our adoption application form with your details and preferences.</p>
                    </div>
                    <div class="guideline-step">
                        <div class="step-number">2</div>
                        <h3>Screening</h3>
                        <p>Our team will review your application and contact you for a brief interview.</p>
                    </div>
                    <div class="guideline-step">
                        <div class="step-number">3</div>
                        <h3>Meet & Greet</h3>
                        <p>Schedule a visit to meet your potential feline companion at our campus location.</p>
                    </div>
                    <div class="guideline-step">
                        <div class="step-number">4</div>
                        <h3>Confirmation</h3>
                        <p>Wait for confirmation of your adoption.</p>
                    </div>
                    <div class="guideline-step">
                        <div class="step-number">5</div>
                        <h3>Adoption</h3>
                        <p>Complete the adoption paperwork and welcome your new family member home!</p>
                    </div>
                </div>

                <div class="requirements-list">
                    <h3>Adoption Requirements</h3>
                    <div class="requirement-item">
                        <div class="requirement-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <h4>Stable Home Environment</h4>
                            <p>Must provide a safe, indoor living space for the cat with proper shelter and comfort</p>
                        </div>
                    </div>
                    <div class="requirement-item">
                        <div class="requirement-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div>
                            <h4>18+ Years Old</h4>
                            <p>Primary adopter must be at least 18 years of age with valid government ID</p>
                        </div>
                    </div>
                    <div class="requirement-item">
                        <div class="requirement-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div>
                            <h4>Financial Capability</h4>
                            <p>Able to provide for the cat's food, litter, veterinary care, and other necessities</p>
                        </div>
                    </div>
                    <div class="requirement-item">
                        <div class="requirement-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div>
                            <h4>Commitment</h4>
                            <p>Willing to provide lifelong care and commitment to the cat's wellbeing</p>
                        </div>
                    </div>
                    <div class="requirement-item">
                        <div class="requirement-icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <div>
                            <h4>Veterinary Care</h4>
                            <p>Agreement to provide regular veterinary care including vaccinations and check-ups</p>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="volunteer-form-section" id="adoption-form-section">
            <div class="container">
                <div class="form-container">
                    <h2>Adoption Application Form</h2>
                    <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px; text-align:center;">
                        <strong>⚠️ FORM DISABLED:</strong> Submissions won't work on GitHub Pages.
                    </div>
                    <p>Please fill out this form to apply for the adoption of one of our available cats. Your commitment to a loving, lifelong home is our priority.</p>

                    <div class="adoption-cat-preview" style="display: none; text-align: center; margin-bottom: 30px; padding: 20px; border: 1px dashed var(--soft-orange); border-radius: var(--border-radius);" id="cat-preview-container">
                        <img id="cat-preview-image" src="" alt="Cat Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; margin-bottom: 15px; border: 3px solid var(--warm-yellow);">
                        <h3 id="cat-preview-name" style="margin-bottom: 0;">Applying for: [Cat Name]</h3>
                        <button type="button" class="btn btn-outline" id="remove-cat-selection" style="margin-top: 10px; padding: 5px 15px; font-size: 0.9rem;">
                             Remove Cat Selection
                        </button>
                    </div>

                    <form id="adoption-application-form" action="config/process-adoption.php" method="POST">
                        <h4 style="color: var(--soft-orange); margin-bottom: 20px;">Applicant Information</h4>
                        
                        <div class="form-group">
                            <label for="full-name" class="required">Full Name</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="age" class="required">Age (Must be 18+)</label>
                            <input type="number" id="age" name="age" required min="18">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-no" class="required">Contact Number</label>
                            <input type="tel" id="contact-no" name="contact-no" required placeholder="e.g., 09xx xxxx xxx">
                        </div>

                        <div class="form-group">
                            <label for="facebook-profile-link">Facebook Profile Link (for communication)</label>
                            <input type="url" id="facebook-profile-link" name="facebook-profile-link" placeholder="e.g., https://facebook.com/yourprofile">
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="required">Full Address (City/Province)</label>
                            <textarea id="address" name="address" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="residence-type" class="required">Type of Residence</label>
                            <select id="residence-type" name="residence-type" required>
                                <option value="">Select Residence Type</option>
                                <option value="Single-Family Home">Single-Family Home</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Condominium">Condominium</option>
                                <option value="Dormitory">Dormitory</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <h4 style="color: var(--soft-orange); margin-top: 40px; margin-bottom: 20px;">Financial Information (Optional)</h4>

                        <div class="form-group">
                            <label for="source-of-income">Source of Income</label>
                            <select id="source-of-income" name="source-of-income">
                                <option value="">Select Income Source</option>
                                <option value="Allowance">Allowance</option>
                                <option value="Working Student">Working Student</option>
                                <option value="Employed">Full-Time Employed</option>
                                <option value="Self-Employed">Self-Employed</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="allowance-salary-range">Monthly Allowance/Salary Range</label>
                            <input type="text" id="allowance-salary-range" name="allowance-salary-range" placeholder="e.g., ₱5,000 - ₱10,000">
                        </div>
                        
                        <h4 style="color: var(--soft-orange); margin-top: 40px; margin-bottom: 20px;">Cat Selection</h4>
                        
                        <div class="form-group" id="cat-selection-group">
                            <label for="cat-name" class="required">Cat You Wish to Adopt</label>
                            <input type="text" id="cat-name-input" name="cat-name" readonly required 
                                placeholder="Please select a cat from the gallery above or use the form below">
                            
                            <select id="cat-name-select" name="cat-name-select" required style="display: none;">
                                <option value="">Select a Cat (Manual Selection)</option>
                                <option value="ConLabMing1">ConLabMing1</option>
                                <option value="ConLabMing2">ConLabMing2</option>
                                <option value="ChapelMing1">ChapelMing1</option>
                                <option value="ChapelMing2">ChapelMing2</option>
                            </select>
                            
                            <p class="form-hint" id="cat-hint">
                                <b>Best Practice:</b> Click the <b>"Adopt Me"</b> button under the cat's profile above to pre-fill this field.
                            </p>

                        
                        <button type="submit" class="btn btn-primary btn-lg" id="adoption-submit-btn" disabled>
                            Submit Adoption Application
                        </button>
                    </form>
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