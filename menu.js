// menu.js - Mobile Navigation Menu Toggle (Fixed Version)

// Function to toggle mobile menu
function menuToggle() {
  const menu = document.getElementById('menu');
  const ulMenu = document.getElementById('ulMenu');
  
  if (menu && ulMenu) {
    // Toggle menu visibility
    if (menu.classList.contains('open')) {
      // Close menu
      menu.style.height = '0px';
      menu.classList.remove('open');
      ulMenu.classList.remove('mt-5');
      ulMenu.style.opacity = '0';
    } else {
      // Open menu
      menu.classList.add('open');
      
      // Calculate the height needed
      const height = ulMenu.scrollHeight + 40; // Add padding
      menu.style.height = height + 'px';
      
      // Add top margin and fade in
      setTimeout(() => {
        ulMenu.classList.add('mt-5');
        ulMenu.style.opacity = '1';
      }, 50);
    }
  }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  const menu = document.getElementById('menu');
  const ulMenu = document.getElementById('ulMenu');
  const nav = document.getElementById('nav');
  
  // Set initial state for mobile menu
  if (ulMenu) {
    ulMenu.style.transition = 'opacity 0.3s ease';
  }
  
  // Close menu when clicking outside
  document.addEventListener('click', function(event) {
    if (menu && menu.classList.contains('open')) {
      if (nav && !nav.contains(event.target)) {
        menuToggle();
      }
    }
  });
  
  // Close menu when clicking on menu items (mobile only)
  const menuItems = document.querySelectorAll('#ulMenu a');
  
  menuItems.forEach(item => {
    item.addEventListener('click', function(e) {
      // Only close menu on mobile
      if (window.innerWidth < 768) {
        if (menu && menu.classList.contains('open')) {
          setTimeout(() => {
            menuToggle();
          }, 100);
        }
      }
    });
  });
  
  // Handle window resize
  let resizeTimer;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      // If window is resized to desktop size, reset menu
      if (window.innerWidth >= 768) {
        if (menu) {
          menu.style.height = '';
          menu.classList.remove('open');
          if (ulMenu) {
            ulMenu.style.opacity = '1';
            ulMenu.classList.remove('mt-5');
          }
        }
      } else {
        // On mobile, ensure menu is closed
        if (menu && !menu.classList.contains('open')) {
          menu.style.height = '0px';
          if (ulMenu) {
            ulMenu.style.opacity = '0';
          }
        }
      }
    }, 250);
  });
  
  // Set initial state on load
  if (window.innerWidth < 768 && menu) {
    menu.style.height = '0px';
    if (ulMenu) {
      ulMenu.style.opacity = '0';
    }
  }
  
  // Add active state to current page - FIXED VERSION
  const currentPath = window.location.pathname;
  const currentPage = currentPath.split('/').pop() || 'index.php';
  
  const navLinks = document.querySelectorAll('#ulMenu a');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    
    // Check if this link matches the current page
    if (href === currentPage || 
        (currentPage === '' && href === 'index.php') ||
        (currentPage === 'index.php' && href === 'index.php')) {
      // Add active styling
      const span = link.querySelector('span');
      if (span) {
        span.classList.remove('max-w-0');
        span.classList.add('max-w-full');
        span.classList.remove('group-hover:max-w-full');
      }
    }
  });
  
  // Add keyboard navigation support
  const hamburgerButton = document.querySelector('button[onclick="menuToggle()"]');
  
  if (hamburgerButton) {
    hamburgerButton.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        menuToggle();
      }
    });
  }
  
  // Escape key to close menu
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && menu && menu.classList.contains('open')) {
      menuToggle();
      if (hamburgerButton) {
        hamburgerButton.focus();
      }
    }
  });
  
});

// Make menuToggle available globally
window.menuToggle = menuToggle;