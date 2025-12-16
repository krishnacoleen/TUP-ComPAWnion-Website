<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - TUP ComPAWnion</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <body class="blog-page"></body>
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
                    <li><a href="donate.php">Donate</a></li>
                    <li><a href="blog.php" class="active">Blog</a></li>
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
                <h1>News & Updates</h1>
                <p>Stay informed about our activities, cat care tips, and success stories</p>
            </div>
        </section>

        <section class="blog-categories">
            <div class="container">
                <div class="category-tabs">
                    <button class="category-btn active" data-category="all">All Posts</button>
                    <button class="category-btn" data-category="news">News & Updates</button>
                    <button class="category-btn" data-category="care-tips">Cat Care Tips</button>
                    <button class="category-btn" data-category="success-stories">Success Stories</button>
                    <button class="category-btn" data-category="events">Events</button>
                </div>
            </div>
        </section>
        
        <section class="blog-posts">
            <div class="container">
                <div id="no-posts-message" class="no-events-message" style="display: none;">
                    <i class="fas fa-newspaper"></i>
                    <h3>No Posts Found</h3>
                    <p>There are no blog posts matching your selected category. Please try a different category.</p>
                </div>

                <!-- Static blog posts -->
                <div id="posts-container" class="posts-grid">
                    <article class="blog-post" data-category="news">
                        <div class="post-image">
                            <img src="assets/blogs/CampusD1.png" alt="Campus Youth Day">
                        </div>
                        <div class="post-content">
                            <h2>Campus Youth Day: Day 1</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on November 28, 2025  
                                <i class="fas fa-tag"></i> News & Updates
                            </p>
                            <p>As we celebrated Campus Youth Day, the TUP Compawnion opened their booths for students who wanted to participate, explore, and learn more about the heart behind the movement. The booths quickly became a warm and welcoming space—filled with conversations, laughter, and curious students eager to discover what Compawnion is all about.</p>
                            <p>Volunteers engaged with students throughout the day, sharing the vision of creating a campus community where no one feels alone in their journey. Many stopped by to ask questions, sign up, and connect with others who shared the same desire for friendship, support, and purpose. The simple act of approaching a booth became an opportunity for students to feel seen, encouraged, and welcomed.</p>
                            <a href="https://www.facebook.com/share/p/17iauGSFMU/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                    
                    <article class="blog-post" data-category="news">
                        <div class="post-image">
                            <img src="assets/blogs/CampusD2.png" alt="Campus Youth Day">
                        </div>
                        <div class="post-content">
                            <h2>Campus Youth Day: Day 2</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on November 30, 2025  
                                <i class="fas fa-tag"></i> News & Updates
                            </p>
                            <p>Day 2 of Campus Youth Day was just as lively as the first! Students visited the TUP Compawnion booths to explore activities, ask questions, and learn more about the group, with volunteers on hand to welcome and guide everyone.</p>
                            <p>The day was full of energy, laughter, and meaningful conversations. More and more students joined in, making it clear that Compawnion is quickly becoming a place where everyone can connect, feel supported, and be part of a caring campus community.</p>
                            <a href="https://www.facebook.com/share/p/17e9DrEp3Q" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                     <article class="blog-post" data-category="news">
                        <div class="post-image">
                            <img src="assets/blogs/CatFeeding1.png" alt="Cats Feeding">
                        </div>
                        <div class="post-content">
                            <h2>Campus Paw Patrol: Reporting live from the campus — satisfied tummies everywhere!</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on November 29, 2025  
                                <i class="fas fa-tag"></i> News & Updates
                            </p>
                            <p>The cats have gathered on the campus once again with their pleading meows, waiting for their mealtime. The bowls were empty, but a sound came in from the distance that look their attention…</p>
                            <p>What is it? It's the trolley with their favorite meal!</p>
                            <a href="https://www.facebook.com/share/p/1AEBzKNFdB/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="care-tips">
                        <div class="post-image">
                            <img src="assets/blogs/CatCare.png" alt="How to Take Care of a Kitten">
                        </div>
                        <div class="post-content">
                            <h2>How to Take Care of a Kitten: Complete Guide</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on October 10, 2025  
                                <i class="fas fa-tag"></i> Cat Care Tips
                            </p>
                            <p>Thinking of adopting a kitten? Here's a comprehensive guide to everything you need to know about kitten care, from feeding and litter training to socialization and veterinary needs.</p>
                            <p>Learn about proper nutrition for growing kittens, essential vaccinations, socialization techniques, and how to create a safe environment for your new furry friend. We'll also cover common health issues to watch out for and when to seek veterinary care.</p>
                            <a href="https://ph.iams.asia/cat/cat-articles/how-to-care-for-a-kitten" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                    
                    <article class="blog-post" data-category="success-stories">
                        <div class="post-image">
                            <img src="assets/blogs/SuccessStory1.png" alt="Champi Finds Her Furever Home">
                        </div>
                        <div class="post-content">
                            <h2>Champi, our toothless TUP Cat, finally found her furever home!</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on April 16, 2024 
                                <i class="fas fa-tag"></i> Success Stories
                            </p>
                            <p>We are more than proud to announce the wonderful news of Champi's successful adoption last March 08, 2024! After being rescued and rehabilitated, Champi, our beloved TUP cat, has found a forever home with Frances Ete, co-head of the Animal Care and Feeding Committee of TUP ComPAWnion.</p>
                            <p>Champi is a TUP Cat who used to stay within the fence of our university in front of the 7/11 store. She loved to sleep along the fence, displaying cuteness to passersby.</p>
                            <a href="https://www.facebook.com/share/p/1A73zVTyhY/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                    
                    <article class="blog-post" data-category="events">
                        <div class="post-image">
                            <img src="assets/blogs/EventHolloween.png" alt="Upcoming Adoption Drive">
                        </div>
                        <div class="post-content">
                            <h2>Meow or Treat?</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on October 29, 2025  
                                <i class="fas fa-tag"></i> Events
                            </p>
                            <p>The moon's glowing bright, the night is filled with howls and hisses —and guess what? The paws are rising once again for our PAWloween special costume contest 2025!</p>
                            <p>Your furry friends are sharpening their claws and fluffing their fur, from ghostly grooms to vampire kitties, they're ready to show their spook-tacular styles👑🎃!</p>
                            <a href="https://www.facebook.com/share/p/19zK2Fhu59/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                    
                    <article class="blog-post" data-category="care-tips">
                        <div class="post-image">
                            <img src="assets/blogs/CatCare2.png" alt="Understanding Cat Body Language">
                        </div>
                        <div class="post-content">
                            <h2>Understanding Cats Body Language</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on September 20, 2025 
                                <i class="fas fa-tag"></i> Cat Care Tips
                            </p>
                            <p>Cats communicate through body language. Learn to interpret tail positions, ear movements, and vocalizations to better understand what your feline friend is trying to tell you.</p>
                            <p>This comprehensive guide covers everything from the meaning behind different tail positions to understanding purring, meowing, and other vocal cues. You'll learn how to recognize signs of stress, contentment, playfulness, and when your cat needs space.</p>
                            <a href="https://www.hillspet.com.ph/cat-care/behavior-appearance/understanding-your-cats-body-language" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                    
                    <article class="blog-post" data-category="success-stories">
                        <div class="post-image">
                            <img src="assets/blogs/SuccessStory2.png" alt="Rescue Story: Geerou">
                        </div>
                        <div class="post-content">
                            <h2>Adoption Success Stories: Geerou's Story</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on February 6, 2024  
                                <i class="fas fa-tag"></i> Success Stories
                            </p>
                            <p>Everyone deserves a home. Everyone deserves love, security, and comfort. Part of TUP ComPAWnion's mission is to find loving homes for our community cats. TUP ComPAWnion, guided by its unwavering mission, is committed to ensuring that even our community cats find the warmth of loving homes.</p>
                            <p>While these feline friends may believe our university is their furever sanctuary, they remain vulnerable to various external factors.</p>
                            <a href="https://www.facebook.com/share/p/1FsdEkCFUY/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="events">
                        <div class="post-image">
                            <img src="assets/blogs/Memberships.png" alt="Memberships">
                        </div>
                        <div class="post-content">
                            <h2>Be the Cat-alyst for Change!</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on September 15, 2025  
                                <i class="fas fa-tag"></i> Events
                            </p>
                            <p>Do you have the heart to serve and the drive to lead? Now's your chance to become an Officer of TUP ComPAWnion—and make a difference one paw at a time. </p>
                            <a href="https://www.facebook.com/share/p/1D6T6qwfQu/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>   

                    <article class="blog-post" data-category="news">
                        <div class="post-image">
                            <img src="assets/blogs/MassKapon.png" alt="Mass Kapon Event">
                        </div>
                        <div class="post-content">
                            <h2>Mass Kapon sa Luneta</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on October 25, 2025  
                                <i class="fas fa-tag"></i> News & Updates
                            </p>
                            <p>This October 18, 2025, TUP ComPAWnion proudly took part in Biyaya Animal Care's "Come On, Kapon" held at Rizal Park, Luneta Open Air Auditorium in celebration of World Animal Month, together with other dedicated animal welfare organizations.</p>
                            <p>The early morning before the event, our devoted team and volunteers had already begun their mission. They went around the campus to gently catch our furry friends with patience, care, and a little bit of luck. Even though the process was not easy (and involved a few close calls with claws and hisses), our team worked together with gentle hands and kind hearts.</p>
                            <a href="https://www.facebook.com/share/p/17ptcfaFWA/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="events">
                        <div class="post-image">
                            <img src="assets/blogs/PAWloween.png" alt="TUP PAWloween">
                        </div>
                        <div class="post-content">
                            <h2>Meow-nster, Meow-nster High! Come One, Show Your Style!</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on October 27, 2025 
                                <i class="fas fa-tag"></i> Events
                            </p>
                            <p>Spooky season is just around the corner, and the kids are preparing for halloween 🎃! But someone's pounding on your door tonight already… You opened it, and unexpectedly, no one was there... 
                                You're getting shivers all over your body until you look down to see your pet holding a holloween basket! A basket with costume materials, begging for you to make them spooky costumes!</p>
                            <a href="https://www.facebook.com/share/p/1G2jTSTVaA/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="events">
                        <div class="post-image">
                            <img src="assets/blogs/TUPKislap.png" alt="TUP Kislap">
                        </div>
                        <div class="post-content">
                            <h2>TUP Kislap</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on August 26, 2024  
                                <i class="fas fa-tag"></i> Events
                            </p>
                            <p>Excited to find your sparkle of the day in this upcoming event? The TUP Kislap! Let us be a part of your sparkle as we have lots of deals to o-purr! </p>
                            <p>Stop by our booth for a purr-fectly delightful experience! Not only you can purr-chased TUP ComPAWnion's merchandise, but we will also hold an on-site membership and get a chance to pre-order our newly designed merchandise!</p>
                            <a href="https://www.facebook.com/share/p/1C4HMpLTQz/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="care-tips">
                        <div class="post-image">
                            <img src="assets/blogs/CatCare3.jpg" alt="Senior Cat Care Guide">
                        </div>
                        <div class="post-content">
                            <h2>Caring for Senior Cats: Special Needs and Considerations</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on September 5, 2025  
                                <i class="fas fa-tag"></i> Cat Care Tips
                            </p>
                            <p>Senior cats have unique needs that require special attention. Learn about proper nutrition, health monitoring, and environmental adjustments for cats aged 7 years and older.</p>
                            <p>This guide covers common health issues in senior cats, dietary requirements, exercise needs, and how to create a comfortable environment for your aging feline companion.</p>
                            <a href="https://neakasa.com/blogs/all/caring-for-senior-cats?srsltid=AfmBOopvPkoTJyeJMvnFMf8hiLhRaVrAfe2wUuJgm2w8Js_4Mi_o6Pqx" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="care-tips">
                        <div class="post-image">
                            <img src="assets/blogs/Common Cat Diseases.png" alt="Common Cat Diseases">
                        </div>
                        <div class="post-content">
                            <h2>Common Cat Diseases</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on December 7, 2025  
                                <i class="fas fa-tag"></i> Cat Care Tips
                            </p>
                            <p>As a cat parent, it is important to recognize the signs and symptoms of common illnesses so you can seek veterinary help for your feline friend in a timely manner if necessary. 
                                Read on for information about diseases and other medical inflictions that frequently impact cats.</p>
                            <a href="https://www.aspca.org/pet-care/cat-care/common-cat-diseases" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                    <article class="blog-post" data-category="care-tips">
                        <div class="post-image">
                            <img src="assets/blogs/Grooming-Hero.png" alt="Cat Grooming Tips">
                        </div>
                        <div class="post-content">
                            <h2>Cat Grooming Tips</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on December 8, 2025  
                                <i class="fas fa-tag"></i> Cat Care Tips
                            </p>
                            <p>A clean cat is a happy cat, and we're here to help! From nail trims to bathing, a little maintenance goes a long way. 
                                Read on to find out how to keep your kitty's eyes, ears, teeth, skin and fur healthy and clean.</p>
                            <a href="https://www.aspca.org/pet-care/cat-care/cat-grooming-tips" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                    
                    <article class="blog-post" data-category="care-tips">
                        <div class="post-image">
                            <img src="assets/blogs/catNutrition.png" alt="Cat Nutrition Tips">
                        </div>
                        <div class="post-content">
                            <h2>Cat Nutrition Tips</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on December 9, 2025  
                                <i class="fas fa-tag"></i> Cat Care Tips
                            </p>
                            <p>Looking for more information about how to structure your kitten, adult cat or senior cat's diet? 
                               Read on for important nutrition tips to help keep your feline friend healthy.</p>
                            <a href="https://www.aspca.org/pet-care/cat-care/cat-nutrition-tips" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
               
                    <article class="blog-post" data-category="news">
                        <div class="post-image">
                            <img src="assets/blogs/Accredited.png" alt="Officially Accredited">
                        </div>
                        <div class="post-content">
                            <h2>TUP ComPAWnion is now Officially Accredited!</h2>
                            <p class="post-meta">
                                <i class="fas fa-calendar-alt"></i> Posted on October 23, 2025  
                                <i class="fas fa-tag"></i> News & Updates
                            </p>
                            <p>Our purrs of joy echoes across the TUP campus as we celebrate this big milestone! This accreditation not only marks recognition, but also reminds us of our shared mission to Aid, Care, and Love our campus cats.</p>
                            <p>To each member, volunteer, and supporter who believes in our cause, We highly extend our gratitude for helping us turn our compassion into action. This achievement is for every paws we've fed, every meow we've heard, and every fur we've touched.</p>
                            <a href="https://www.facebook.com/share/p/1LpeUifC2m/" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                </div>


                </div>
                <!-- Pagination container -->
                <div id="pagination-container" class="pagination">
                    <!-- Pagination will be dynamically generated here -->
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