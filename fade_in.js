// fade_in.js - Page Fade In Animation

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
  // Get the body element
  const body = document.body;
  
  // Remove opacity-0 class to trigger fade-in
  setTimeout(() => {
    body.classList.remove('opacity-0');
    body.classList.add('opacity-100');
  }, 100);
  
  // Smooth scroll for anchor links
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  
  anchorLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      // Check if it's not just '#'
      if (href !== '#' && href !== '') {
        e.preventDefault();
        
        const targetId = href.substring(1);
        const targetElement = document.getElementById(targetId);
        
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });
  
  // Add entrance animation to elements
  const animateElements = document.querySelectorAll('[data-aos]');
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-fade-in');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  animateElements.forEach(element => {
    observer.observe(element);
  });
  
  // Page transition on navigation
  const navigationLinks = document.querySelectorAll('a:not([href^="#"]):not([target="_blank"])');
  
  navigationLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      // Skip if it's an external link or has special attributes
      if (href && !href.startsWith('http') && !href.startsWith('mailto:') && !href.startsWith('tel:')) {
        e.preventDefault();
        
        // Fade out
        body.classList.add('opacity-0');
        
        // Navigate after fade out
        setTimeout(() => {
          window.location.href = href;
        }, 300);
      }
    });
  });
  
  // Lazy load images
  const images = document.querySelectorAll('img[data-src]');
  
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
        imageObserver.unobserve(img);
      }
    });
  });
  
  images.forEach(img => {
    imageObserver.observe(img);
  });
  
  // Add parallax effect to hero images
  window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.parallax');
    
    parallaxElements.forEach(element => {
      const speed = element.dataset.speed || 0.5;
      element.style.transform = `translateY(${scrolled * speed}px)`;
    });
  });
  
  // Dark mode toggle (if you want to add it)
  const darkModeToggle = document.getElementById('darkModeToggle');
  
  if (darkModeToggle) {
    darkModeToggle.addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
      localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
    });
    
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'true') {
      document.documentElement.classList.add('dark');
    }
  }
  
  // Form validation enhancement
  const forms = document.querySelectorAll('form');
  
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      const inputs = form.querySelectorAll('input[required], textarea[required]');
      let isValid = true;
      
      inputs.forEach(input => {
        if (!input.value.trim()) {
          isValid = false;
          input.classList.add('border-red-500');
          
          // Remove error styling after user starts typing
          input.addEventListener('input', function() {
            this.classList.remove('border-red-500');
          }, { once: true });
        }
      });
      
      if (!isValid) {
        e.preventDefault();
        alert('Please fill in all required fields.');
      }
    });
  });
  
  // Add loading state to buttons
  const buttons = document.querySelectorAll('button[type="submit"]');
  
  buttons.forEach(button => {
    button.addEventListener('click', function() {
      const form = this.closest('form');
      
      if (form && form.checkValidity()) {
        this.disabled = true;
        this.innerHTML = '<span class="animate-pulse">Loading...</span>';
        
        // Re-enable after 3 seconds (fallback)
        setTimeout(() => {
          this.disabled = false;
          this.innerHTML = 'Send message';
        }, 3000);
      }
    });
  });
  
  // Console message
  console.log('%c✨ Portfolio Website Loaded Successfully! ✨', 'color: #667eea; font-size: 16px; font-weight: bold;');
  console.log('%cDeveloped by Jebarsanthatcroos', 'color: #764ba2; font-size: 12px;');
});