// app.js
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar-glass');
    if (window.scrollY > 50) {
        navbar.style.padding = "10px 0";
        navbar.style.boxShadow = "0 10px 30px rgba(0,0,0,0.1)";
    } else {
        navbar.style.padding = "20px 0";
        navbar.style.boxShadow = "none";
    }
});

// Simple Fade-in Animation
const fadeElements = document.querySelectorAll('.animate-in-left, .animate-in-right');
const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
});

fadeElements.forEach(el => fadeObserver.observe(el));