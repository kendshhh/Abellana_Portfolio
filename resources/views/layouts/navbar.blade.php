<nav class="navbar navbar-expand-lg fixed-top py-3" id="mainNav">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-4" href="/">
            <span class="gradient-text">✦</span> Portfolio
        </a>
        
        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto gap-1 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('projects') ? 'active' : '' }}" href="/projects">
                        <span class="nav-text">Projects</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('experiences') ? 'active' : '' }}" href="/experiences">
                        <span class="nav-text">Experience</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('educations') ? 'active' : '' }}" href="/educations">
                        <span class="nav-text">Education</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('skills') ? 'active' : '' }}" href="/skills">
                        <span class="nav-text">Skills</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contacts') ? 'active' : '' }}" href="/contacts">
                        <span class="nav-text">Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 105, 180, 0.1);
        transition: all 0.3s var(--transition-smooth);
    }

    .navbar.scrolled {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: var(--shadow-sm);
    }

    .navbar-brand {
        color: var(--color-text);
        letter-spacing: -0.5px;
        transition: all 0.3s var(--transition-smooth);
    }

    .navbar-brand:hover {
        transform: scale(1.02);
    }

    .nav-link {
        position: relative;
        padding: 0.5rem 1rem !important;
        color: var(--color-text-muted) !important;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s var(--transition-smooth);
        border-radius: 30px;
        margin: 0 0.2rem;
    }

    .nav-text {
        position: relative;
        z-index: 1;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        width: 100%;
        height: 100%;
        background: rgba(255, 105, 180, 0.08);
        border-radius: 30px;
        transition: transform 0.3s var(--transition-smooth);
        z-index: 0;
    }

    .nav-link:hover::before {
        transform: translate(-50%, -50%) scale(1);
    }

    .nav-link:hover {
        color: var(--color-pink) !important;
    }

    .nav-link.active {
        color: var(--color-pink) !important;
        font-weight: 600;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 4px;
        background: var(--color-pink);
        border-radius: 50%;
    }

    /* Mobile Responsive */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            background: white;
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 105, 180, 0.1);
        }
        
        .nav-link {
            padding: 0.75rem 1rem !important;
        }
        
        .nav-link.active::after {
            bottom: 10px;
        }
    }

    .navbar-toggler {
        padding: 0.5rem;
        border-radius: 12px;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 105, 180, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
</style>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('mainNav');
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Close mobile menu on link click
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const navbarCollapse = document.getElementById('mainNavbar');
            if (navbarCollapse.classList.contains('show')) {
                bootstrap.Collapse.getInstance(navbarCollapse).hide();
            }
        });
    });
</script>