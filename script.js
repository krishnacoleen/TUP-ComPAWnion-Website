// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functionality
    initDarkMode();
    initNavigation();
    initFiltering();
    initForms();
    initTabs();
    initDonationAmounts();
    initCalendar();
    initBackToTop();
    initAnimations();
    initImageLoading();
    initSmoothScrolling();
    initStoryToggle(); 
    initBlogPagination();
    initAdoptionFormInteraction();
    initTeamSlider();
    initCatsPagination();
});

// Dark mode functionality
function initDarkMode() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (!darkModeToggle) return;
    
    const htmlElement = document.documentElement;
    const toggleIcon = darkModeToggle.querySelector('i');
    const toggleText = darkModeToggle.querySelector('span');

    // Check for saved theme preference or default to light mode
    const currentTheme = localStorage.getItem('theme') || 'light';
    htmlElement.setAttribute('data-theme', currentTheme);
    updateToggleButton(currentTheme);

    darkModeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        htmlElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateToggleButton(newTheme);
    });

    function updateToggleButton(theme) {
        if (theme === 'dark') {
            toggleIcon.classList.remove('fa-moon');
            toggleIcon.classList.add('fa-sun');
            toggleText.textContent = 'Light Mode';
        } else {
            toggleIcon.classList.remove('fa-sun');
            toggleIcon.classList.add('fa-moon');
            toggleText.textContent = 'Dark Mode';
        }
    }
}

// Mobile Navigation
function initNavigation() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('nav');
    
    if (mobileMenuToggle && navMenu) {
        // Create overlay element
        const overlay = document.createElement('div');
        overlay.className = 'nav-overlay';
        document.body.appendChild(overlay);
        
        mobileMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            navMenu.classList.toggle('show');
            overlay.classList.toggle('active');
            this.innerHTML = navMenu.classList.contains('show') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
        
        // Close menu when clicking on overlay
        overlay.addEventListener('click', function() {
            navMenu.classList.remove('show');
            overlay.classList.remove('active');
            mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('nav') && !e.target.closest('.mobile-menu-toggle')) {
                navMenu.classList.remove('show');
                overlay.classList.remove('active');
                mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            }
        });
        
        // Close menu when clicking on a link
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    navMenu.classList.remove('show');
                    overlay.classList.remove('active');
                    mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navMenu.classList.contains('show')) {
                navMenu.classList.remove('show');
                overlay.classList.remove('active');
                mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
            }
        });
    }
}

//  STORY TOGGLE FOR CAT PROFILES
function initStoryToggle() {
    const storyButtons = document.querySelectorAll('.story-toggle-btn');
    
    storyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const storyContent = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Toggle active class
            storyContent.classList.toggle('active');
            
            // Rotate icon
            if (storyContent.classList.contains('active')) {
                icon.style.transform = 'rotate(180deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
}

    // SMART FILTERING FUNCTIONALITY
function initFiltering() {
    // Only run on Our Cats page
    const smartFilter = document.querySelector('.smart-filter');
    if (!smartFilter) return;
    
    // State
    let activeFilters = [];
    let searchTerm = '';
    
    // DOM Elements
    const catProfiles = document.querySelectorAll('.cat-profile');
    const noCatsMessage = document.getElementById('no-cats-message');
    const activeFiltersContainer = document.getElementById('active-filters-container');
    const activeFiltersDisplay = document.getElementById('active-filters');
    const searchInput = document.getElementById('cat-search');
    const addFilterButtons = document.querySelectorAll('.add-filter-btn');
    const filterPanels = document.querySelectorAll('.filter-panel');
    const filterOptions = document.querySelectorAll('.filter-option');
    const searchClearBtn = document.querySelector('.search-box-clear-btn');
    const searchBox = document.querySelector('.search-box');
    
    // Initialize
    updateActiveFiltersDisplay();
    filterCats();
    updateSearchBoxState();
    updateClearButton();
    
    // === EVENT LISTENERS ===
    
    // Search Input
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            searchTerm = this.value.toLowerCase().trim();
            filterCats();
            updateActiveFiltersDisplay();
            updateSearchBoxState();
            updateClearButton();
        });
    }
    
    // Search Clear Button
    if (searchClearBtn) {
        searchClearBtn.addEventListener('click', function() {
            clearAllFilters();
            searchInput.focus();
        });
    }
    
    // Add Filter Buttons
    addFilterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterType = this.getAttribute('data-filter-type');
            
            if (filterType === 'clear') {
                // Clear all filters
                clearAllFilters();
                
                // Remove active class from all filter buttons
                addFilterButtons.forEach(btn => {
                    if (btn.getAttribute('data-filter-type') !== 'clear') {
                        btn.classList.remove('active');
                    }
                });
            } else {
                // Toggle filter panel
                const panelId = `${filterType}-panel`;
                const targetPanel = document.getElementById(panelId);
                
                // Hide all other panels
                filterPanels.forEach(panel => {
                    if (panel.id !== panelId) {
                        panel.classList.remove('active');
                    }
                });
                
                // Remove active class from other filter buttons
                addFilterButtons.forEach(btn => {
                    if (btn !== this && btn.getAttribute('data-filter-type') !== 'clear') {
                        btn.classList.remove('active');
                    }
                });
                
                // Toggle target panel
                if (targetPanel) {
                    const isPanelOpening = !targetPanel.classList.contains('active');
                    
                    // Toggle the panel
                    targetPanel.classList.toggle('active');
                    
                    // Toggle active class on the button based on panel state
                    if (targetPanel.classList.contains('active')) {
                        this.classList.add('active');
                    } else {
                        this.classList.remove('active');
                    }
                    
                    // Scroll to panel if opening
                    if (isPanelOpening) {
                        setTimeout(() => {
                            targetPanel.scrollIntoView({ 
                                behavior: 'smooth', 
                                block: 'nearest' 
                            });
                        }, 100);
                    }
                }
            }
        });
    });
    
    // Filter Options
    filterOptions.forEach(option => {
        option.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');
            const filterType = getFilterType(filterValue);
            
            // Check if filter already exists
            const existingIndex = activeFilters.findIndex(f => f.value === filterValue);
            
            if (existingIndex >= 0) {
                // Remove filter
                activeFilters.splice(existingIndex, 1);
                this.classList.remove('active');
            } else {
                // Add filter
                activeFilters.push({
                    type: filterType,
                    value: filterValue,
                    label: getFilterLabel(filterValue)
                });
                this.classList.add('active');
            }
            
            // Find which panel this option belongs to
            const panel = this.closest('.filter-panel');
            if (panel) {
                // Get the filter type from the panel
                const panelId = panel.id;
                const panelType = panelId.replace('-panel', '');
                
                // Hide the panel
                panel.classList.remove('active');
                
                // Find and remove active class from the filter button
                const correspondingButton = document.querySelector(`.add-filter-btn[data-filter-type="${panelType}"]`);
                if (correspondingButton) {
                    correspondingButton.classList.remove('active');
                }
            }
            
            updateActiveFiltersDisplay();
            filterCats();
            updateSearchBoxState();
            updateClearButton();
        });
    });

    // Filter Panel Close Buttons
    document.querySelectorAll('.filter-panel-close').forEach(closeBtn => {
        closeBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            const panel = this.closest('.filter-panel');
            if (panel) {
                panel.classList.remove('active');
                
                // Find the corresponding filter button and remove active class
                const panelId = panel.id;
                const filterType = panelId.replace('-panel', '');
                const correspondingButton = document.querySelector(`.add-filter-btn[data-filter-type="${filterType}"]`);
                if (correspondingButton) {
                    correspondingButton.classList.remove('active');
                }
            }
        });
    });

    // Close panels when clicking outside
    document.addEventListener('click', function(e) {
        const isFilterButton = e.target.closest('.add-filter-btn');
        const isFilterPanel = e.target.closest('.filter-panel');
        const isPanelClose = e.target.closest('.filter-panel-close');
        const isFilterOption = e.target.closest('.filter-option');
        
        // Don't close if clicking on filter options inside the panel
        if (!isFilterButton && !isFilterPanel && !isPanelClose && !isFilterOption) {
            // Close all panels
            filterPanels.forEach(panel => {
                panel.classList.remove('active');
            });
            
            // Remove active class from all filter buttons (except clear)
            addFilterButtons.forEach(button => {
                if (button.getAttribute('data-filter-type') !== 'clear') {
                    button.classList.remove('active');
                }
            });
        }
    });

    // Clear all filters button
    const clearAllButton = document.getElementById('clear-all-filters');
    if (clearAllButton) {
        clearAllButton.addEventListener('click', function(e) {
            e.preventDefault();
            clearAllFilters();
        });
    }

    // === HELPER FUNCTIONS ===
    
    function clearAllFilters() {
    activeFilters = [];
    searchTerm = '';
    if (searchInput) searchInput.value = '';
    
    // Hide all filter panels
    filterPanels.forEach(panel => panel.classList.remove('active'));
    
    // Remove active class from all filter options
    filterOptions.forEach(option => option.classList.remove('active'));
    
    // Remove active class from all filter buttons (except clear button)
    addFilterButtons.forEach(button => {
        if (button.getAttribute('data-filter-type') !== 'clear') {
            button.classList.remove('active');
        }
    });
    
    updateActiveFiltersDisplay();
    
    // Reset to page 1 and show all cats
    catsCurrentPage = 1;
    filteredCatProfiles = Array.from(document.querySelectorAll('.cat-profile'));
    
    const paginationContainer = document.getElementById('cats-pagination-container');
    
    if (paginationContainer) {
        paginateCats(paginationContainer);
    }
    
    updateSearchBoxState();
    updateClearButton();
}
    
    function getFilterType(filterValue) {
        if (['adoptable', 'adopted', 'resident'].includes(filterValue)) {
            return 'status';
        } else if (['kitten', 'adult', 'senior'].includes(filterValue)) {
            return 'age';
        } else if (['male', 'female'].includes(filterValue)) {
            return 'gender';
        } else {
            return 'location';
        }
    }
    
    function getFilterLabel(filterValue) {
        const labels = {
            // Age labels
            'kitten': 'Kitten',
            'adult': 'Adult',
            'senior': 'Senior',
            
            // Gender labels
            'male': 'Male',
            'female': 'Female',
            
            // Status labels
            'adoptable': 'Available for Adoption',
            'adopted': 'Adopted',
            'resident': 'Campus Resident',
            
            // Location labels
            'cos-cla': 'COS/CLA',
            'cie-cafa': 'CIE/CAFA',
            'coe-irtc': 'COE/IRTC',
            'grounds': 'TUP Grounds',
            'cit': 'CIT',
            'uitc': 'UITC'
        };
        return labels[filterValue] || filterValue;
    }
    
    function updateActiveFiltersDisplay() {
        if (!activeFiltersContainer || !activeFiltersDisplay) return;
        
        activeFiltersDisplay.innerHTML = '';
        
        // Show/hide active filters container
        if (activeFilters.length === 0 && !searchTerm) {
            activeFiltersContainer.classList.remove('active');
            return;
        }
        
        activeFiltersContainer.classList.add('active');
        
        // Add filter chips for active filters
        activeFilters.forEach((filter, index) => {
            const chip = document.createElement('div');
            chip.className = 'active-filter-chip';
            chip.innerHTML = `
                <span>${filter.label}</span>
                <button class="remove-filter" data-index="${index}">
                    <i class="fas fa-times"></i>
                </button>
            `;
            activeFiltersDisplay.appendChild(chip);
            
            // Add remove event
            chip.querySelector('.remove-filter').addEventListener('click', function() {
                const indexToRemove = parseInt(this.getAttribute('data-index'));
                activeFilters.splice(indexToRemove, 1);
                
                // Remove active class from corresponding filter option
                filterOptions.forEach(option => {
                    if (option.getAttribute('data-filter') === filter.value) {
                        option.classList.remove('active');
                    }
                });
                
                filterCats();
                updateActiveFiltersDisplay();
                updateSearchBoxState();
                updateClearButton();
            });
        });
        
        // Add search term chip if exists
        if (searchTerm) {
            const searchChip = document.createElement('div');
            searchChip.className = 'active-filter-chip';
            searchChip.innerHTML = `
                <span>Search: "${searchTerm}"</span>
                <button class="remove-filter" data-type="search">
                    <i class="fas fa-times"></i>
                </button>
            `;
            activeFiltersDisplay.appendChild(searchChip);
            
            // Add remove event for search chip
            searchChip.querySelector('.remove-filter').addEventListener('click', function() {
                searchTerm = '';
                if (searchInput) searchInput.value = '';
                filterCats();
                updateActiveFiltersDisplay();
                updateSearchBoxState();
                updateClearButton();
            });
        }
    }
    
    function filterCats() {
    let visibleCount = 0;
    filteredCatProfiles = []; // Reset filtered array
    
    const allCatProfiles = document.querySelectorAll('.cat-profile');
    
    allCatProfiles.forEach(profile => {
        // Get cat data
        const catName = profile.querySelector('h3').textContent.toLowerCase();
        const catAge = profile.getAttribute('data-category');
        const catLocation = profile.getAttribute('data-location');
        const catStatus = profile.getAttribute('data-status');
        const catGender = profile.querySelector('.cat-age').textContent.toLowerCase();
        const isMale = catGender.includes('male') && !catGender.includes('female');
        const isFemale = catGender.includes('female');
        const catText = profile.textContent.toLowerCase();
        
        // Check against search term
        let matchesSearch = true;
        if (searchTerm) {
            matchesSearch = catName.includes(searchTerm) || 
                        catText.includes(searchTerm);
        }
        
        // Check against active filters
        let matchesFilters = true;
        if (activeFilters.length > 0) {
            // Group filters by type
            const filtersByType = {};
            activeFilters.forEach(filter => {
                if (!filtersByType[filter.type]) {
                    filtersByType[filter.type] = [];
                }
                filtersByType[filter.type].push(filter.value);
            });
            
            // Check each filter type group
            for (const type in filtersByType) {
                const filterValues = filtersByType[type];
                let matchesThisType = false;
                
                // OR logic within same type
                filterValues.forEach(value => {
                    if (type === 'age' && catAge === value) {
                        matchesThisType = true;
                    } else if (type === 'gender') {
                        if (value === 'male' && isMale) matchesThisType = true;
                        if (value === 'female' && isFemale) matchesThisType = true;
                    } else if (type === 'status' && catStatus === value) {
                        matchesThisType = true;
                    } else if (type === 'location' && catLocation === value) {
                        matchesThisType = true;
                    }
                });
                
                // AND logic between different types
                if (!matchesThisType) {
                    matchesFilters = false;
                    break;
                }
            }
        }
        
        // Check if cat should be visible
        const shouldShow = matchesSearch && matchesFilters;
        
        if (shouldShow) {
            filteredCatProfiles.push(profile);
            visibleCount++;
        }
    });
    
    // Show/hide no cats message
    if (noCatsMessage) {
        if (visibleCount === 0) {
            noCatsMessage.style.display = 'block';
        } else {
            noCatsMessage.style.display = 'none';
        }
    }

    // Reset to page 1 when filtering
    catsCurrentPage = 1;
    const paginationContainer = document.getElementById('cats-pagination-container');
    
    if (paginationContainer) {
        paginateCats(paginationContainer);
    }
}
    
    // NEW: Update search box state (adds .has-filters class)
    function updateSearchBoxState() {
        if (!searchBox) return;
        
        const hasFilters = activeFilters.length > 0 || searchTerm;
        
        if (hasFilters) {
            searchBox.classList.add('has-filters');
        } else {
            searchBox.classList.remove('has-filters');
        }
    }
    
    // NEW: Update clear button visibility
    function updateClearButton() {
        if (!searchClearBtn) return;
        
        const hasFilters = activeFilters.length > 0 || searchTerm;
        
        if (hasFilters) {
            searchClearBtn.classList.add('visible');
        } else {
            searchClearBtn.classList.remove('visible');
        }
    }

    // Ensure cats pagination is initialized after filtering
    setTimeout(() => {
        const catProfiles = document.querySelectorAll('.cat-profile');
        const paginationContainer = document.getElementById('cats-pagination-container');
        if (paginationContainer) {
            paginateCats(catProfiles, paginationContainer);
        }
    }, 100);
}

// >>>>>>>>>>>>> BLOG PAGINATION FUNCTIONS <<<<<<<<<<<<<

let blogCurrentPage = 1;
let blogCurrentCategory = 'all';
const blogPostsPerPage = 3;

function initBlogPagination() {
    console.log("initBlogPagination called");
    
    const blogPosts = document.querySelectorAll('.blog-post');
    const categoryButtons = document.querySelectorAll('.category-btn');
    const noPostsMessage = document.getElementById('no-posts-message');
    const postsContainer = document.getElementById('posts-container');
    const paginationContainer = document.getElementById('pagination-container');
    
    if (!paginationContainer) {
        console.log("Pagination container not found");
        return;
    }
    
    // Show posts container
    if (postsContainer) {
        postsContainer.style.display = 'grid';
    }
    
    // Initialize category buttons
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            console.log("Category clicked:", category);
            
            // Update active button
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update category and reset to page 1
            blogCurrentCategory = category;
            blogCurrentPage = 1;
            
            // Filter and paginate
            filterAndPaginateBlog(blogPosts, noPostsMessage, postsContainer, paginationContainer);
        });
    });
    
    // Initial pagination render
    filterAndPaginateBlog(blogPosts, noPostsMessage, postsContainer, paginationContainer);
    
    // Add event listener to pagination container
    paginationContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('pagination-btn')) {
            const btnText = e.target.textContent.trim();
            const pageNum = parseInt(btnText);
            const totalPages = getTotalPages(blogPosts);
            
            console.log("Pagination button clicked:", btnText);
            
            if (btnText.includes('Next') || e.target.classList.contains('next')) {
                if (blogCurrentPage < totalPages) {
                    blogCurrentPage++;
                    filterAndPaginateBlog(blogPosts, noPostsMessage, postsContainer, paginationContainer);
                }
            } else if (btnText.includes('Previous') || e.target.classList.contains('prev')) {
                if (blogCurrentPage > 1) {
                    blogCurrentPage--;
                    filterAndPaginateBlog(blogPosts, noPostsMessage, postsContainer, paginationContainer);
                }
            } else if (!isNaN(pageNum)) {
                blogCurrentPage = pageNum;
                filterAndPaginateBlog(blogPosts, noPostsMessage, postsContainer, paginationContainer);
            }
            
            // Scroll to top of blog section
            const blogSection = document.querySelector('.blog-posts');
            if (blogSection) {
                blogSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    });
}

function getTotalPages(blogPosts) {
    // Filter posts based on current category
    const filteredPosts = blogCurrentCategory === 'all' 
        ? Array.from(blogPosts)
        : Array.from(blogPosts).filter(post => post.getAttribute('data-category') === blogCurrentCategory);
    
    const totalPages = Math.ceil(filteredPosts.length / blogPostsPerPage);
    console.log("getTotalPages:", filteredPosts.length, "posts,", totalPages, "pages");
    return totalPages;
}

function filterAndPaginateBlog(blogPosts, noPostsMessage, postsContainer, paginationContainer) {
    console.log("filterAndPaginateBlog: Page", blogCurrentPage, "Category:", blogCurrentCategory);
    
    // Filter posts based on current category
    const filteredPosts = blogCurrentCategory === 'all' 
        ? Array.from(blogPosts)
        : Array.from(blogPosts).filter(post => post.getAttribute('data-category') === blogCurrentCategory);
    
    console.log("Filtered posts:", filteredPosts.length);
    
    // Show/hide no posts message
    if (noPostsMessage) {
        noPostsMessage.style.display = filteredPosts.length === 0 ? 'block' : 'none';
    }
    
    // Show/hide posts container
    if (postsContainer) {
        postsContainer.style.display = filteredPosts.length === 0 ? 'none' : 'grid';
    }
    
    // Hide all posts first
    blogPosts.forEach(post => {
        post.style.display = 'none';
    });
    
    // Calculate pagination
    const totalPages = Math.ceil(filteredPosts.length / blogPostsPerPage);
    const startIndex = (blogCurrentPage - 1) * blogPostsPerPage;
    const endIndex = startIndex + blogPostsPerPage;
    
    console.log("Showing posts", startIndex + 1, "to", Math.min(endIndex, filteredPosts.length), "of", filteredPosts.length);
    
    // Show only posts for current page
    for (let i = startIndex; i < endIndex && i < filteredPosts.length; i++) {
        filteredPosts[i].style.display = 'block';
    }
    
    // Render pagination
    renderPagination(totalPages, paginationContainer);
}

function renderPagination(totalPages, paginationContainer) {
    if (!paginationContainer) return;
    
    let paginationHTML = '';
    
    // Previous button
    if (blogCurrentPage > 1) {
        paginationHTML += '<button class="pagination-btn prev"><i class="fas fa-chevron-left"></i> Previous</button>';
    }
    
    // Show page numbers
    const maxVisiblePages = 5;
    let startPage = Math.max(1, blogCurrentPage - Math.floor(maxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
    
    // Adjust if we're near the end
    if (endPage - startPage + 1 < maxVisiblePages) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
    }
    
    // First page and ellipsis
    if (startPage > 1) {
        paginationHTML += '<button class="pagination-btn" data-page="1">1</button>';
        if (startPage > 2) {
            paginationHTML += '<span class="pagination-ellipsis">...</span>';
        }
    }
    
    // Page numbers
    for (let i = startPage; i <= endPage; i++) {
        const activeClass = i === blogCurrentPage ? 'active' : '';
        paginationHTML += `<button class="pagination-btn ${activeClass}" data-page="${i}">${i}</button>`;
    }
    
    // Last page and ellipsis
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            paginationHTML += '<span class="pagination-ellipsis">...</span>';
        }
        paginationHTML += `<button class="pagination-btn" data-page="${totalPages}">${totalPages}</button>`;
    }
    
    // Next button
    if (blogCurrentPage < totalPages) {
        paginationHTML += '<button class="pagination-btn next">Next <i class="fas fa-chevron-right"></i></button>';
    }
    
    paginationContainer.innerHTML = paginationHTML;
    console.log("Rendered pagination: Page", blogCurrentPage, "of", totalPages);
}

// >>>>>>>>>>>>> END BLOG PAGINATION FUNCTIONS <<<<<<<<<<<<<

// >>>>>>>>>>>>> CATS PAGINATION FUNCTIONS <<<<<<<<<<<<<<<<<

let catsCurrentPage = 1;
const catsPostsPerPage = 6;
let filteredCatProfiles = []; // Store filtered cats globally

function initCatsPagination() {
    console.log("initCatsPagination called");
    
    const catsContainer = document.querySelector('.cats-grid');
    const paginationContainer = document.getElementById('cats-pagination-container');
    
    if (!paginationContainer) {
        console.log("Cats pagination container not found");
        return;
    }
    
    // Get all cat profiles initially
    const allCatProfiles = document.querySelectorAll('.cat-profile');
    filteredCatProfiles = Array.from(allCatProfiles); // Start with all cats
    
    // Show cats container
    if (catsContainer) {
        catsContainer.style.display = 'grid';
    }
    
    // Initial pagination render
    paginateCats(paginationContainer);
    
    // Add event listener to pagination container
    paginationContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('pagination-btn')) {
            const btnText = e.target.textContent.trim();
            const pageNum = parseInt(btnText);
            const totalPages = Math.ceil(filteredCatProfiles.length / catsPostsPerPage);
            
            console.log("Cats pagination button clicked:", btnText);
            
            if (btnText.includes('Next') || e.target.classList.contains('next')) {
                if (catsCurrentPage < totalPages) {
                    catsCurrentPage++;
                    paginateCats(paginationContainer);
                }
            } else if (btnText.includes('Previous') || e.target.classList.contains('prev')) {
                if (catsCurrentPage > 1) {
                    catsCurrentPage--;
                    paginateCats(paginationContainer);
                }
            } else if (!isNaN(pageNum)) {
                catsCurrentPage = pageNum;
                paginateCats(paginationContainer);
            }
            
            // Scroll to top of cats section
            const catsSection = document.querySelector('.cats-gallery');
            if (catsSection) {
                catsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    });
}

function paginateCats(paginationContainer) {
    console.log("paginateCats: Page", catsCurrentPage, "Filtered cats:", filteredCatProfiles.length);
    
    if (filteredCatProfiles.length === 0) {
        // Hide all cats if no filtered results
        document.querySelectorAll('.cat-profile').forEach(cat => {
            cat.style.display = 'none';
        });
        renderCatsPagination(0, paginationContainer);
        return;
    }
    
    // Calculate pagination
    const totalPages = Math.ceil(filteredCatProfiles.length / catsPostsPerPage);
    const startIndex = (catsCurrentPage - 1) * catsPostsPerPage;
    const endIndex = startIndex + catsPostsPerPage;
    
    console.log("Showing cats", startIndex + 1, "to", Math.min(endIndex, filteredCatProfiles.length), "of", filteredCatProfiles.length);
    
    // First, hide all cat profiles
    document.querySelectorAll('.cat-profile').forEach(cat => {
        cat.style.display = 'none';
    });
    
    // Show only cats for current page from filtered array
    for (let i = startIndex; i < endIndex && i < filteredCatProfiles.length; i++) {
        filteredCatProfiles[i].style.display = 'block';
    }
    
    // Render pagination
    renderCatsPagination(totalPages, paginationContainer);
}

function renderCatsPagination(totalPages, paginationContainer) {
    if (!paginationContainer) return;
    
    let paginationHTML = '';
    
    // Only show pagination if there's more than 1 page
    if (totalPages <= 1) {
        paginationContainer.innerHTML = '';
        return;
    }
    
    // Previous button
    if (catsCurrentPage > 1) {
        paginationHTML += '<button class="pagination-btn prev"><i class="fas fa-chevron-left"></i> Previous</button>';
    }
    
    // Show page numbers
    const maxVisiblePages = 5;
    let startPage = Math.max(1, catsCurrentPage - Math.floor(maxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
    
    // Adjust if we're near the end
    if (endPage - startPage + 1 < maxVisiblePages) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
    }
    
    // First page and ellipsis
    if (startPage > 1) {
        paginationHTML += '<button class="pagination-btn" data-page="1">1</button>';
        if (startPage > 2) {
            paginationHTML += '<span class="pagination-ellipsis">...</span>';
        }
    }
    
    // Page numbers
    for (let i = startPage; i <= endPage; i++) {
        const activeClass = i === catsCurrentPage ? 'active' : '';
        paginationHTML += `<button class="pagination-btn ${activeClass}" data-page="${i}">${i}</button>`;
    }
    
    // Last page and ellipsis
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            paginationHTML += '<span class="pagination-ellipsis">...</span>';
        }
        paginationHTML += `<button class="pagination-btn" data-page="${totalPages}">${totalPages}</button>`;
    }
    
    // Next button
    if (catsCurrentPage < totalPages) {
        paginationHTML += '<button class="pagination-btn next">Next <i class="fas fa-chevron-right"></i></button>';
    }
    
    paginationContainer.innerHTML = paginationHTML;
    console.log("Rendered cats pagination: Page", catsCurrentPage, "of", totalPages);
}

// >>>>>>>>>>>>> END CATS PAGINATION FUNCTIONS <<<<<<<<<<<<<












// NEW: TEAM SLIDER - ABOUT PAGE
function initTeamSlider() {
    const sliderContainer = document.querySelector('.team-slider-container');
    if (!sliderContainer) return;

    const sliderWrapper = sliderContainer.querySelector('.slider-wrapper');
    const slides = sliderContainer.querySelectorAll('.slide');
    const teamSection = sliderContainer.closest('.our-team-section');

    // -- 1. VARIABLES INITIALIZATION 
    let currentIndex = 0;
    const totalSlides = slides.length;
    
    // Drag/Swipe variables
    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID;

    if (totalSlides === 0) return;

    // -- 2. NAVIGATION BUTTONS --
    // Create navigation buttons
    const prevButton = document.createElement('button');
    prevButton.className = 'slider-nav-btn slider-prev';
    prevButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
    prevButton.setAttribute('aria-label', 'Previous team member');
    
    const nextButton = document.createElement('button');
    nextButton.className = 'slider-nav-btn slider-next';
    nextButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
    nextButton.setAttribute('aria-label', 'Next team member');
    
    // Append buttons to the section (outside the wrapper) for better positioning
    if (teamSection) {
        teamSection.appendChild(prevButton);
        teamSection.appendChild(nextButton);
    } else {
        sliderContainer.appendChild(prevButton);
        sliderContainer.appendChild(nextButton);
    }

    // Button click handlers
    prevButton.addEventListener('click', () => {
        // Debounce slightly to prevent rapid clicking glitches
        goToSlide(currentIndex - 1);
    });
    nextButton.addEventListener('click', () => {
        goToSlide(currentIndex + 1);
    });

    // -- 3. MOUSE & TOUCH EVENTS --
    // Disable context menu
    sliderWrapper.addEventListener('contextmenu', (e) => e.preventDefault());

    // Touch events
    sliderWrapper.addEventListener('touchstart', touchStart);
    sliderWrapper.addEventListener('touchend', touchEnd);
    sliderWrapper.addEventListener('touchmove', touchMove);

    // Mouse events
    sliderWrapper.addEventListener('mousedown', touchStart);
    sliderWrapper.addEventListener('mouseup', touchEnd);
    sliderWrapper.addEventListener('mouseleave', touchEnd);
    sliderWrapper.addEventListener('mousemove', touchMove);

    function touchStart(event) {
        startPos = getPositionX(event);
        isDragging = true;
        
        // Grab cursor feedback
        sliderWrapper.style.cursor = 'grabbing';
        
        // Start animation loop
        animationID = requestAnimationFrame(animation);
    }

    function touchMove(event) {
        if (isDragging) {
            const currentPosition = getPositionX(event);
            currentTranslate = prevTranslate + currentPosition - startPos;
        }
    }

    function touchEnd() {
        isDragging = false;
        cancelAnimationFrame(animationID);
        sliderWrapper.style.cursor = 'grab';

        const movedBy = currentTranslate - prevTranslate;

        // Threshold to change slide (100px)
        if (movedBy < -100 && currentIndex < totalSlides - 1) {
            goToSlide(currentIndex + 1);
        } else if (movedBy > 100 && currentIndex > 0) {
            goToSlide(currentIndex - 1);
        } else {
            goToSlide(currentIndex); // Snap back if drag wasn't far enough
        }
    }

    function getPositionX(event) {
        return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
    }

    function animation() {
        setSliderPosition();
        if (isDragging) requestAnimationFrame(animation);
    }

    function setSliderPosition() {
        sliderWrapper.style.transform = `translateX(${currentTranslate}px)`;
    }

    // -- 4. CORE NAVIGATION & CENTERING --
    function goToSlide(index) {
        // Handle looping
        if (index < 0) {
            currentIndex = totalSlides - 1;
        } else if (index >= totalSlides) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }

        // Calculate center position
        updateSlidePosition();
        
        // Update active states
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === currentIndex);
        });

        updateButtonStates();
    }
    
    function updateSlidePosition() {
        // Use requestAnimationFrame to ensure DOM is ready for measurement
        requestAnimationFrame(() => {
            const slide = slides[0];
            if (!slide) return;

            const slideWidth = slide.offsetWidth;
            const slideStyle = getComputedStyle(sliderWrapper);
            const gap = parseInt(slideStyle.gap) || 30; // Default gap 
            const containerWidth = sliderContainer.offsetWidth;

            // Math to center the Active Slide
            const totalSlideWidth = slideWidth + gap;
            const offset = currentIndex * totalSlideWidth;
            const centerOffset = (containerWidth / 2) - (slideWidth / 2);
            
            const translateX = centerOffset - offset;
            
            // Apply transition (none if dragging, smooth otherwise)
            sliderWrapper.style.transition = isDragging ? 'none' : 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
            sliderWrapper.style.transform = `translateX(${translateX}px)`;
            
            currentTranslate = translateX;
            prevTranslate = translateX;
        });
    }
    
    function updateButtonStates() {
        // Infinite loop logic usually keeps buttons active, 
        // but if you want to disable at ends, logic is here:
        if (totalSlides <= 1) {
            prevButton.style.display = 'none';
            nextButton.style.display = 'none';
        } else {
            prevButton.style.display = 'flex';
            nextButton.style.display = 'flex';
        }
    }
    
    // -- 5. RESIZE & INIT --
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateSlidePosition();
        }, 200);
    });

    // Initialize
    sliderWrapper.style.cursor = 'grab';
    goToSlide(0);
    
    // Ensure proper initial positioning after images load
    window.addEventListener('load', () => {
        updateSlidePosition();
    });
}

// CALENDAR FUNCTIONALITY
async function initCalendar() { 
    const calendarDays = document.getElementById('calendar-days');
    const currentMonthYear = document.getElementById('current-month-year');
    const prevMonthBtn = document.getElementById('prev-month');
    const nextMonthBtn = document.getElementById('next-month');
    const eventsList = document.getElementById('events-list');
    const dateCheckboxes = document.getElementById('date-checkboxes');
    
    if (!calendarDays) return;
    
    let events = [];
    try {
        const response = await fetch('config/fetch-events.php');
        const result = await response.json();
        
        // Check if fetch was successful
        if (result.success && Array.isArray(result.events)) { 
            // Use result.events (nested array)
            events = result.events.map(event => ({
                id: event.id,
                title: event.title,
                description: event.description,
                time: event.event_time,
                location: event.location,
                // Convert the SQL date string to a JS Date object
                date: new Date(event.event_date + 'T00:00:00') // Add time for proper parsing
            }));
        } else {
            console.error("Fetched data structure is invalid:", result);
        }
    } catch (error) {
        console.error("Failed to load events:", error);
        events = []; // Fallback to empty array
    }

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
        
    // Render calendar
    function renderCalendar() {
        currentMonthYear.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
        calendarDays.innerHTML = '';
        
        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        
        // Add empty cells
        for (let i = 0; i < firstDay; i++) {
            const emptyDay = document.createElement('div');
            emptyDay.classList.add('calendar-day', 'empty');
            calendarDays.appendChild(emptyDay);
        }
        
        // Add days
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.classList.add('calendar-day');
            dayElement.textContent = day;
            
            const date = new Date(currentYear, currentMonth, day);
            const today = new Date();
            
            if (date.getDate() === today.getDate() && 
                date.getMonth() === today.getMonth() && 
                date.getFullYear() === today.getFullYear()) {
                dayElement.classList.add('today');
            }
            
            const hasEvent = events.some(event => 
                event.date.getDate() === day && 
                event.date.getMonth() === currentMonth && 
                event.date.getFullYear() === currentYear
            );
            
            if (hasEvent) {
                dayElement.classList.add('event');
                dayElement.addEventListener('click', () => {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
                    dayElement.classList.add('selected');
                    showEventsForDate(date);
                });
            }
            
            calendarDays.appendChild(dayElement);
        }
        
        renderEventsList();
        if (dateCheckboxes) renderDateCheckboxes();
    }
    
    function getMonthName(monthIndex) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June',
                       'July', 'August', 'September', 'October', 'November', 'December'];
        return months[monthIndex];
    }
    
    function renderEventsList() {
        if (!eventsList) return;
        eventsList.innerHTML = '';
        
        const currentMonthEvents = events.filter(event => 
            event.date.getMonth() === currentMonth && 
            event.date.getFullYear() === currentYear
        );
        
        if (currentMonthEvents.length === 0) {
            eventsList.innerHTML = `
                <div class="no-events-message">
                    <i class="fas fa-calendar-times"></i>
                    <h3>No Events Scheduled</h3>
                    <p>There are no volunteer events scheduled for this month. Check back later for updates!</p>
                </div>
            `;
            return;
        }
        
        currentMonthEvents.forEach(event => {
            const eventItem = document.createElement('div');
            eventItem.classList.add('event-item');
            eventItem.innerHTML = `
                <div class="event-date">
                    <i class="fas fa-calendar-alt"></i>
                    ${formatDate(event.date)} • ${event.time}
                </div>
                <div class="event-title">${event.title}</div>
                <div class="event-description">${event.description}</div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i>
                    ${event.location}
                </div>
            `;
            eventsList.appendChild(eventItem);
        });
    }
    
    function renderDateCheckboxes() {
    dateCheckboxes.innerHTML = '';
    
    const upcomingEvents = events.filter(event => {
        const eventDate = new Date(event.date);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const sixtyDaysFromNow = new Date();
        sixtyDaysFromNow.setDate(today.getDate() + 60);
        return eventDate >= today && eventDate <= sixtyDaysFromNow;
    });
    
    if (upcomingEvents.length === 0) {
        dateCheckboxes.innerHTML = `
            <div class="no-events-message">
                <i class="fas fa-calendar-times"></i>
                <h3>No Upcoming Events</h3>
                <p>There are no upcoming volunteer events at the moment. Check back later for updates!</p>
            </div>
        `;
        return;
    }
    
    upcomingEvents.sort((a, b) => a.date - b.date);
    
    upcomingEvents.forEach(event => {
        const checkboxItem = document.createElement('div');
        checkboxItem.classList.add('date-checkbox-item');
        checkboxItem.innerHTML = `
            <label>
                <input type="checkbox" name="available-dates[]" value="${event.id}"> 
                <div class="event-checkbox-info">
                    <div class="event-date-checkbox">
                        <strong>${formatDate(event.date)}</strong>
                        <span class="event-time"><i class="far fa-clock"></i> ${event.time || 'TBA'}</span>
                    </div>
                    <div class="event-title-checkbox">${event.title}</div>
                    <div class="event-location-checkbox">
                        <i class="fas fa-map-marker-alt"></i> ${event.location}
                    </div>
                </div>
            </label>
        `;
        dateCheckboxes.appendChild(checkboxItem);
    });
}
    
    function showEventsForDate(date) {
        const dateEvents = events.filter(event => 
            event.date.getDate() === date.getDate() && 
            event.date.getMonth() === date.getMonth() && 
            event.date.getFullYear() === date.getFullYear()
        );
        
        eventsList.innerHTML = '';
        
        if (dateEvents.length === 0) {
            eventsList.innerHTML = `
                <div class="no-events-message">
                    <i class="fas fa-calendar-times"></i>
                    <h3>No Events Scheduled</h3>
                    <p>There are no volunteer events scheduled for ${formatDate(date)}.</p>
                </div>
            `;
            return;
        }
        
        dateEvents.forEach(event => {
            const eventItem = document.createElement('div');
            eventItem.classList.add('event-item');
            eventItem.innerHTML = `
                <div class="event-date">
                    <i class="fas fa-calendar-alt"></i>
                    ${formatDate(event.date)} • ${event.time}
                </div>
                <div class="event-title">${event.title}</div>
                <div class="event-description">${event.description}</div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i>
                    ${event.location}
                </div>
            `;
            eventsList.appendChild(eventItem);
        });
    }
    
    function formatDate(date) {
        const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }
    
    if (prevMonthBtn && nextMonthBtn) {
        prevMonthBtn.addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        });
        
        nextMonthBtn.addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        });
    }
    
    renderCalendar();
}

// FORM HANDLING
function initForms() {
    const volunteerForm = document.getElementById('volunteer-form');
    const monetaryForm = document.getElementById('monetary-donation-form');
    const inkindForm = document.getElementById('inkind-donation-form');
    const adoptionForm = document.getElementById('adoption-application-form'); 
    
    // >>>>>>> VOLUNTEER FORM LOGIC (AJAX) <<<<<<<
    if (volunteerForm) {
        volunteerForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // 1. Basic Validation (before submission)
            // Note: validateForm calls showErrorMessage itself on failure.
            if (!validateForm(this)) {
                return; // Stop if client-side validation fails
            }

            // 2. Start Submission UI
            submitBtn.innerHTML = '<span class="loading"></span> Submitting...';
            submitBtn.disabled = true;

            // 3. Collect Form Data
            const formData = new FormData(this);

            try {
                // 4. Send Data using Fetch API
                const response = await fetch('config/process-volunteer.php', {
                    method: 'POST',
                    body: formData
                });
                
                // 5. Handle Response
                const result = await response.json();

                if (response.ok && result.success) {
                    // Success - Use new floating message
                    showSuccessMessage(result.message);
                    
                    // Reset form
                    this.reset();
                    
                } else {
                    // Server-side error or validation failure
                    throw new Error(result.message || 'An unknown error occurred during submission.');
                }
            } catch (error) {
                // Network error or thrown error from above
                console.error("Submission Error:", error);
                
                // Show error message using new floating message
                showErrorMessage('Submission failed. Please try again. Error: ' + error.message);
            } finally {
                // 6. Reset Submission UI
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }

    // >>>>>>> MONETARY DONATION FORM LOGIC (AJAX) <<<<<<<
    if (monetaryForm) {
        monetaryForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Check form validity (it calls showErrorMessage on failure)
            if (!validateForm(this)) {
                return;
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<span class="loading"></span> Processing...';
            submitBtn.disabled = true;
            
            try {
                const formData = new FormData(this);
                
                // Send AJAX request
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Show success message (using new floating message)
                    showSuccessMessage(result.message);
                    
                    // Reset form
                    this.reset();
                    
                } else {
                    // Show error message (using new floating message)
                    showErrorMessage(result.message || 'An error occurred. Please try again.');
                }
            } catch (error) {
                console.error('Donation submission error:', error);
                showErrorMessage('Network error. Please try again.');
            } finally {
                // Reset button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }
    
    // >>>>>>> IN-KIND DONATION FORM LOGIC (AJAX) <<<<<<<
    if (inkindForm) {
        inkindForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Check form validity (it calls showErrorMessage on failure)
            if (!validateForm(this)) {
                return;
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<span class="loading"></span> Processing...';
            submitBtn.disabled = true;
            
            try {
                const formData = new FormData(this);
                
                // Send AJAX request
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Show success message (using new floating message)
                    showSuccessMessage(result.message);
                    
                    // Reset form
                    this.reset();
                    
                } else {
                    // Show error message (using new floating message)
                    showErrorMessage(result.message || 'An error occurred. Please try again.');
                }
            } catch (error) {
                console.error('Donation submission error:', error);
                showErrorMessage('Network error. Please try again.');
            } finally {
                // Reset button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }
    
    // >>>>>>> ADOPTION FORM LOGIC (AJAX) <<<<<<< // NEW BLOCK
    if (adoptionForm) {
        adoptionForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // 1. Basic Validation
            if (!validateForm(this)) {
                return;
            }
            
            // 2. Start Submission UI
            submitBtn.innerHTML = '<span class="loading"></span> Sending Application...';
            submitBtn.disabled = true;
            
            // 3. Collect Form Data
            const formData = new FormData(this);
            
            // Ensure the correct cat name is used from the input field
            const catNameValue = document.getElementById('cat-name-input').value || document.getElementById('cat-name-select').value;
            formData.set('cat-name', catNameValue); 
            
            try {
                // 4. Send Data using Fetch API
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData
                });
                
                // 5. Handle Response
                const result = await response.json();
                
                if (response.ok && result.success) {
                    showSuccessMessage(result.message);
                    this.reset();
                    // Reset cat selection state (Function is defined outside initForms)
                    if (typeof removeCatSelection === 'function') {
                         removeCatSelection(); 
                    }
                    
                } else {
                    throw new Error(result.message || 'An unknown error occurred during submission.');
                }
            } catch (error) {
                console.error("Adoption Submission Error:", error);
                showErrorMessage('Application failed. Please check your fields and try again. Error: ' + error.message);
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }
}

// ... (omitted content before initAdoptionFormInteraction)

// Define a static map of adoptable cats and their images for manual selection lookup
const ADOPTABLE_CATS_DATA = [
    { name: 'ConLabMing1', image: 'assets/our-cats/conlabming1.png' },
    { name: 'ConLabMing2', image: 'assets/our-cats/conlabming2.png' },
    { name: 'ChapelMing1', image: 'assets/our-cats/chapelming1.png' },
    { name: 'ChapelMing2', image: 'assets/our-cats/chapelming2.png' },
];

function initAdoptionFormInteraction() {
    const adoptMeButtons = document.querySelectorAll('.adopt-me-btn');
    const catNameInput = document.getElementById('cat-name-input');
    const catNameSelect = document.getElementById('cat-name-select');
    const submitButton = document.getElementById('adoption-submit-btn');
    const catPreviewContainer = document.getElementById('cat-preview-container');
    const catPreviewImage = document.getElementById('cat-preview-image');
    const catPreviewName = document.getElementById('cat-preview-name');
    const removeCatButton = document.getElementById('remove-cat-selection');
    const adoptionFormSection = document.getElementById('adoption-form-section');

    if (!catNameInput) return;

    // --- Populate Manual Dropdown ---
    if (catNameSelect) {
        // Clear options except the default
        catNameSelect.innerHTML = '<option value="">Select a Cat (Manual Selection)</option>';
        
        ADOPTABLE_CATS_DATA.forEach(cat => {
            const option = document.createElement('option');
            option.value = cat.name;
            option.textContent = cat.name;
            catNameSelect.appendChild(option);
        });
    }
    
    // 1. Handle "Adopt Me!" button clicks
    adoptMeButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const catName = this.getAttribute('data-cat-name');
            const catImage = this.getAttribute('data-cat-image');
            
            handleCatSelection(catName, catImage);
            
            if (adoptionFormSection) {
                window.scrollTo({
                    top: adoptionFormSection.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // 2. Handle manual select change (FIXED LOGIC)
    catNameSelect.addEventListener('change', function() {
        const selectedCatName = this.value;
        
        if (selectedCatName) {
            // Find the full cat data object
            const catData = ADOPTABLE_CATS_DATA.find(cat => cat.name === selectedCatName);
            // Pass the cat's image path to the selection handler
            const catImage = catData ? catData.image : ''; 
            
            handleCatSelection(selectedCatName, catImage);
        } else {
            removeCatSelection();
        }
    });

    // 3. Handle manual removal button click
    removeCatButton.addEventListener('click', removeCatSelection);

    // 4. Cat Selection Logic 
    function handleCatSelection(catName, catImage) {
        // Pre-fill input with cat name
        catNameInput.value = catName;
        
        // Hide manual select and show static input
        catNameSelect.style.display = 'none';
        catNameInput.style.display = 'block';

        // Update Cat Preview
        catPreviewName.textContent = `Applying for: ${catName}`;
        if (catImage) catPreviewImage.src = catImage; // Use the found image
        catPreviewContainer.style.display = 'block';
        
        // Enable submit button
        submitButton.disabled = false;
        
        // Add temporary hidden field for image path (for form use)
        let hiddenImgInput = catPreviewContainer.querySelector('input[name="cat-image-path"]');
        if (!hiddenImgInput) {
             hiddenImgInput = document.createElement('input');
             hiddenImgInput.type = 'hidden';
             hiddenImgInput.name = 'cat-image-path';
             catPreviewContainer.appendChild(hiddenImgInput);
        }
        hiddenImgInput.value = catImage;
        
        // Change hint text
        document.getElementById('cat-hint').innerHTML =
            `You are applying for <strong>${catName}</strong>. You may remove this selection to choose another cat.`;

        // Update the select dropdown's selected value to match the name 
        catNameSelect.value = catName;
    }

    // 5. Cat Removal Logic 
    function removeCatSelection() {
        // Clear hidden input and show manual select
        catNameInput.value = '';
        catNameInput.style.display = 'none';
        
        // Reset and show the manual select dropdown
        catNameSelect.value = '';
        catNameSelect.style.display = 'block';
        
        // Hide Cat Preview
        catPreviewContainer.style.display = 'none';
        catPreviewImage.src = '';
        catPreviewName.textContent = '';
        
        // Disable submit button until a cat is selected
        submitButton.disabled = true;

        // Reset hint text
        document.getElementById('cat-hint').innerHTML = `<b>Best Practice:</b> Click the <b>"Adopt Me"</b> button under the cat's profile above to pre-fill this field.`;
    }
    
    // Initial check on load
    if (catNameInput.value) {
        const initialCatName = catNameInput.value;
        const catData = ADOPTABLE_CATS_DATA.find(cat => cat.name === initialCatName);
        handleCatSelection(initialCatName, catData ? catData.image : ''); 
    } else {
        removeCatSelection();
    }
}

// Helper functions for showing messages - MODIFIED FOR FLOATING ALERTS
function showFloatingAlert(message, type) {
    // 1. Check for existing alert and remove it
    let existingAlert = document.getElementById('floating-alert');
    if (existingAlert) {
        existingAlert.remove();
    }

    // 2. Create the main container (fixed position)
    const alertContainer = document.createElement('div');
    alertContainer.id = 'floating-alert';
    alertContainer.className = 'floating-alert-container';

    // 3. Create the inner content
    const alertContent = document.createElement('div');
    alertContent.className = `alert-content ${type}`;

    // 4. Set icon and message text
    let iconClass = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-triangle';
    let iconHTML = `<i class="${iconClass}"></i>`;
    
    alertContent.innerHTML = `${iconHTML} <span>${message}</span>`;
    
    alertContainer.appendChild(alertContent);
    document.body.appendChild(alertContainer);
    
    // 5. Show the alert (this triggers the CSS animation)
    alertContainer.style.display = 'block';

    // 6. Auto-hide if it's a success message
    if (type === 'success') {
        setTimeout(() => {
            // Start fade out and slide up transition
            alertContainer.style.opacity = '0';
            alertContainer.style.transform = 'translate(-50%, -50px)';
            
            setTimeout(() => {
                alertContainer.remove();
            }, 500); // Wait for transition to complete
        }, 8000);
    }
}

function showSuccessMessage(message) {
    showFloatingAlert(message, 'success');
}

function showErrorMessage(message) {
    showFloatingAlert(message, 'error');
}

function validateForm(form) {
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.style.borderColor = 'var(--danger-color)';
            field.addEventListener('input', function() {
                this.style.borderColor = '';
            });
        }
    });
    
    const emailField = form.querySelector('input[type="email"]');
    if (emailField && emailField.value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailField.value)) {
            isValid = false;
            emailField.style.borderColor = 'var(--danger-color)';
            showErrorMessage('Please enter a valid email address.');
            return false;
        }
    }
    
    const phoneField = form.querySelector('input[type="tel"]');
    if (phoneField && phoneField.value) {
        const phoneRegex = /^\+?[\d\s-()]{10,}$/;
        if (!phoneRegex.test(phoneField.value)) {
            isValid = false;
            phoneField.style.borderColor = 'var(--danger-color)';
            showErrorMessage('Please enter a valid phone number.');
            return false;
        }
    }
    
    // Custom check for donation amount if it exists
    const amountInput = form.querySelector('#donation-amount');
    if (amountInput && parseFloat(amountInput.value) <= 0) {
        isValid = false;
        amountInput.style.borderColor = 'var(--danger-color)';
        showErrorMessage('Please enter a valid donation amount.');
        return false;
    }
    
    // Custom check for dropoff date (must be future date)
    const dropoffDateInput = form.querySelector('#dropoff-date');
    if (dropoffDateInput && dropoffDateInput.value) {
        const selectedDate = new Date(dropoffDateInput.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            isValid = false;
            dropoffDateInput.style.borderColor = 'var(--danger-color)';
            showErrorMessage('Please select a future date for drop-off.');
            return false;
        }
    }
    
    if (!isValid) {
        showErrorMessage('Please fill in all required fields correctly.');
    }
    
    return isValid;
}

// TAB FUNCTIONALITY
function initTabs() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    
    if (tabButtons.length > 0) {
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Update active tab button
                tabButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Show corresponding tab content
                const tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(content => {
                    content.classList.remove('active');
                    if (content.id === tabId) {
                        content.classList.add('active');
                    }
                });
            });
        });
    }
}

// DONATION AMOUNT SELECTION
function initDonationAmounts() {
    const amountButtons = document.querySelectorAll('.amount-btn');
    const customAmountInput = document.getElementById('custom-amount');
    const donationAmountInput = document.getElementById('donation-amount');
    
    if (amountButtons.length > 0) {
        amountButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active amount button
                amountButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Set donation amount
                const amount = this.getAttribute('data-amount');
                if (donationAmountInput) {
                    donationAmountInput.value = amount;
                }
                
                // Clear custom amount if set
                if (customAmountInput) {
                    customAmountInput.value = '';
                }
            });
        });
    }
    
    // Handle custom amount input
    if (customAmountInput && donationAmountInput) {
        customAmountInput.addEventListener('input', function() {
            // Clear active amount buttons when custom amount is entered
            amountButtons.forEach(btn => btn.classList.remove('active'));
            
            // Update donation amount with custom value
            donationAmountInput.value = this.value;
        });
    }
}

// BACK TO TOP FUNCTIONALITY
function initBackToTop() {
    const backToTopBtn = document.createElement('a');
    backToTopBtn.href = '#';
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    backToTopBtn.setAttribute('aria-label', 'Back to top');
    document.body.appendChild(backToTopBtn);
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });
    
    backToTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ANIMATION ON SCROLL
function initAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const elementsToAnimate = document.querySelectorAll('.cat-card, .option-card, .blog-card, .stat, .value-card, .team-member, .guideline-step, .highlight-card, .breakdown-item');
    elementsToAnimate.forEach(el => {
        el.classList.add('animate-on-scroll');
        observer.observe(el);
    });
}

// IMAGE LOADING WITH FALLBACK
function initImageLoading() {
    const images = document.querySelectorAll('img');
    
    images.forEach(img => {
        // Add loading attribute for lazy loading
        img.setAttribute('loading', 'lazy');
        
        // Add error handling
        img.addEventListener('error', function() {
            console.log('Image failed to load:', this.src);
        });
        
        // Add load event for successful loading
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
    });
}

// ... (initSmoothScrolling function code)

// SMOOTH SCROLLING FOR ANCHOR LINKS
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
} 