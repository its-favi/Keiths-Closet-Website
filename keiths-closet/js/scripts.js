document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.stat-number');

    // Function to perform the number animation
    const updateCount = (counter) => {
        const target = +counter.getAttribute('data-target'); // Get the target number
        const count = +counter.innerText; // Get the current count
        const increment = target / 100; // Increment value for the animation

        // Find the icon within the same stat-item as the counter
        const icon = counter.closest('.stat-item').querySelector('.stat-icon img');

        if (count < target) {
            counter.innerText = Math.ceil(count + increment); // Update the counter text
            icon.classList.add('vibrating'); // Start vibrating the icon
            setTimeout(() => updateCount(counter), 50); // Repeat until target is reached
        } else {
            counter.innerText = target; // Ensure the final value is the target
            icon.classList.remove('vibrating'); // Stop vibrating the icon
        }
    };

    // Create an Intersection Observer instance
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateCount(entry.target); // Start the animation when in view
                observer.unobserve(entry.target); // Stop observing to prevent retriggering
            }
        });
    }, { threshold: 0.1 }); // Trigger when 10% of the element is visible

    // Observe each counter element
    counters.forEach(counter => {
        observer.observe(counter);
    });

    // Menu and Navigation Interactions
    const menuToggle = document.getElementById('menu-toggle');
    const fullScreenMenu = document.getElementById('fullscreen-menu');
    const closeMenuButton = document.getElementById('menu-close-btn');
    const scrollingNav = document.getElementById('scrolling-nav');
    let isAnimating = false;
    let lastScrollTop = 0;
    let isNavVisible = false;

    // Function to lock/unlock body scroll and keep scrollbar visible
    function toggleBodyScroll(lock) {
        document.body.style.overflowY = lock ? 'hidden' : 'auto';
    }

    // Function to close the full-screen menu
    function closeMenu() {
        if (isAnimating) return;
        isAnimating = true;

        fullScreenMenu.classList.remove('active');
        fullScreenMenu.classList.add('closing');
        fullScreenMenu.setAttribute('aria-hidden', 'true');

        setTimeout(function() {
            fullScreenMenu.style.visibility = 'hidden';
            fullScreenMenu.classList.remove('closing');
            fullScreenMenu.classList.add('hidden');
            closeMenuButton.style.display = 'none';

            toggleBodyScroll(false); // Re-enable body scroll

            isAnimating = false;
        }, 500); // Matches the transition duration in CSS
    }

    // Open the full-screen menu
    menuToggle.addEventListener('click', function() {
        if (isAnimating) return;
        isAnimating = true;

        fullScreenMenu.classList.remove('hidden', 'closing');
        fullScreenMenu.classList.add('active');
        fullScreenMenu.style.visibility = 'visible';
        closeMenuButton.style.display = 'block';
        fullScreenMenu.setAttribute('aria-hidden', 'false');
        closeMenuButton.focus(); // Set focus to the close button for better accessibility

        toggleBodyScroll(true); // Disable body scroll

        setTimeout(function() {
            isAnimating = false;
        }, 500); // Matches the transition duration in CSS
    });

    // Close the full-screen menu with animation
    closeMenuButton.addEventListener('click', closeMenu);

    // Close the menu when a menu item is clicked
    const menuItems = fullScreenMenu.querySelectorAll('a');
    menuItems.forEach(item => {
        item.addEventListener('click', closeMenu);
    });

    // Improved scroll event handling
    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            if (!isNavVisible && scrollTop > 150) { // Show after scrolling down 150px
                scrollingNav.classList.add('visible');
                isNavVisible = true;
            }
        } else if (scrollTop < lastScrollTop) {
            scrollingNav.classList.remove('visible');
            isNavVisible = false;
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    // Intersection Observer for Content Animation
    const contentWrapper = document.querySelector('.keith-section .content-wrapper');
    const contentObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                contentWrapper.classList.add('visible');
                contentObserver.unobserve(contentWrapper); // Stop observing since we want it to show only once
            }
        });
    }, { threshold: 0.5 }); // Trigger when 50% of the content is visible

    contentObserver.observe(contentWrapper);

    // Rotating Banner Functionality with Scroll Animation
    const bannerContainer = document.getElementById('carousel-banner');
    const slides = bannerContainer.querySelectorAll('.carousel-slide');
    const navButtons = bannerContainer.querySelectorAll('.carousel-nav-btn');
    let currentSlide = 0;
    let slideInterval;

    function goToSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev', 'next');
            slide.style.visibility = 'hidden'; // Hide all slides initially
            slide.style.transform = 'translateY(100%)'; // Reset to off-screen position
            slide.style.opacity = '0'; // Reset opacity
            slide.style.zIndex = '0'; // Reset z-index

            if (i === index) {
                slide.classList.add('active');
                slide.style.visibility = 'visible'; // Make active slide visible
                slide.style.transform = 'translateY(0)'; // Reset position
                slide.style.opacity = '1'; // Ensure it's fully visible
                slide.style.zIndex = '2'; // Ensure it's above other slides
            } else if (i === (index - 1 + slides.length) % slides.length) {
                slide.classList.add('prev');
                slide.style.visibility = 'visible'; // Make previous slide visible
                slide.style.transform = 'translateY(-100%)'; // Move up
                slide.style.zIndex = '1'; // Set behind the active slide
            } else if (i === (index + 1) % slides.length) {
                slide.classList.add('next');
                slide.style.visibility = 'visible'; // Make next slide visible
                slide.style.transform = 'translateY(100%)'; // Move down
                slide.style.zIndex = '1'; // Set behind the active slide
            }
        });

        navButtons.forEach((button, i) => {
            button.classList.toggle('active', i === index);
            button.setAttribute('aria-pressed', i === index);
        });

        currentSlide = index;
    }

    function showNextSlide() {
        goToSlide((currentSlide + 1) % slides.length);
    }

    function showPreviousSlide() {
        goToSlide((currentSlide - 1 + slides.length) % slides.length);
    }

    function startSlideShow() {
        stopSlideShow(); // Ensure no overlapping intervals
        slideInterval = setInterval(showNextSlide, 5000); // Change slides every 5 seconds
    }

    function stopSlideShow() {
        if (slideInterval) {
            clearInterval(slideInterval);
        }
    }

    navButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            goToSlide(index);
            startSlideShow();
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            showPreviousSlide();
            startSlideShow();
        } else if (e.key === 'ArrowRight') {
            showNextSlide();
            startSlideShow();
        }
    });

    // Initialize the carousel by showing the first slide
    goToSlide(0);
    startSlideShow();

});


