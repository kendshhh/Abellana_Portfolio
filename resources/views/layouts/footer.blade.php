<!-- Footer -->
<footer class="bg-dark text-light py-5 mt-5" id="contact">
    <div class="container">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-lg-4" data-aos="fade-up">
                <h5 class="mb-3 gradient-text">About This Portfolio</h5>
                <p class="mb-3 text-light">
                    A showcase of my journey in software development, featuring projects, skills, and experiences
                    that demonstrate my passion for creating innovative solutions.
                </p>
                <div class="social-links">
                    @php
                        $contact = \App\Models\Contact::first();
                    @endphp
                    @if($contact)
                        @if($contact->github_url)
                            <a href="{{ $contact->github_url }}" class="text-light me-3" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                        @endif
                        @if($contact->linkedin_url)
                            <a href="{{ $contact->linkedin_url }}" class="text-light me-3" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-linkedin fa-lg"></i>
                            </a>
                        @endif
                        @if($contact->website_url)
                            <a href="{{ $contact->website_url }}" class="text-light me-3" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-globe fa-lg"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <h5 class="mb-3 gradient-text">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="/" class="text-light text-decoration-none hover-link">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/projects" class="text-light text-decoration-none hover-link">
                            <i class="fas fa-briefcase me-2"></i>Projects
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/experiences" class="text-light text-decoration-none hover-link">
                            <i class="fas fa-building me-2"></i>Experience
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/skills" class="text-light text-decoration-none hover-link">
                            <i class="fas fa-code me-2"></i>Skills
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/educations" class="text-light text-decoration-none hover-link">
                            <i class="fas fa-graduation-cap me-2"></i>Education
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/contacts" class="text-light text-decoration-none hover-link">
                            <i class="fas fa-envelope me-2"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <h5 class="mb-3 gradient-text">Get In Touch</h5>
                @php
                    $contact = \App\Models\Contact::first();
                @endphp
                @if($contact)
                    <div class="contact-info">
                        @if($contact->email)
                            <p class="mb-2 text-light">
                                <i class="fas fa-envelope me-2 text-pink"></i>
                                <a href="mailto:{{ $contact->email }}" class="text-muted text-decoration-none">{{ $contact->email }}</a>
                            </p>
                        @endif
                        @if($contact->phone)
                            <p class="mb-2 text-light">
                                <i class="fas fa-phone me-2 text-pink"></i>
                                <a href="tel:{{ $contact->phone }}" class="text-light text-decoration-none">{{ $contact->phone }}</a>
                            </p>
                        @endif
                        @if($contact->city || $contact->country)
                            <p class="mb-2 text-light">
                                <i class="fas fa-map-marker-alt me-2 text-pink"></i>
                                {{ $contact->city }}@if($contact->city && $contact->country),@endif {{ $contact->country }}
                            </p>
                        @endif
                    </div>
                @else
                    <p class="text-light">Contact information will be displayed here.</p>
                @endif
            </div>
        </div>

        <!-- Copyright -->
        <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
        <div class="text-center">
            @php
                $profile = \App\Models\Home::first();
            @endphp
            <p class="mb-0 text-light">
                &copy; {{ date('Y') }}
                @if($profile)
                    {{ $profile->full_name }}
                @else
                    Portfolio
                @endif
                . Built with <i class="fas fa-heart text-danger"></i> using Laravel & Bootstrap.
            </p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-cubic'
    });

    // Simple scroll to top functionality
    const scrollTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };

    // Add scroll to top button if needed
    const addScrollTop = () => {
        const footer = document.querySelector('footer');
        if (!footer) return;

        const btn = document.createElement('button');
        btn.innerHTML = '↑';
        btn.className = 'scroll-top-btn';
        btn.onclick = scrollTop;

        document.body.appendChild(btn);

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                btn.classList.add('show');
            } else {
                btn.classList.remove('show');
            }
        });
    };

    // Initialize on load
    window.addEventListener('load', addScrollTop);
</script>

<script src="{{ asset('js/app.js') }}"></script>

<style>
    /* Footer Styles */
    footer {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        margin-top: 5rem;
    }

    footer h5 {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1.5rem !important;
    }

    footer p {
        line-height: 1.8;
        font-size: 0.95rem;
        color: #f8f9fa !important;
    }

    .social-links a {
        color: #ffffff;
        transition: all 0.3s ease;
        display: inline-block;
        font-size: 1.5rem;
    }

    .social-links a:hover {
        color: var(--color-pink) !important;
        transform: translateY(-3px);
    }

    .hover-link {
        transition: all 0.3s ease !important;
        position: relative;
        padding-left: 0 !important;
        color: #ffffff !important;
        font-weight: 500;
    }

    .hover-link:hover {
        color: var(--color-pink) !important;
        padding-left: 10px !important;
    }

    .contact-info a {
        color: #ffffff !important;
        transition: color 0.3s ease;
        text-decoration: none !important;
        font-weight: 500;
    }

    .contact-info a:hover {
        color: var(--color-pink) !important;
    }

    .scroll-top-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 45px;
        height: 45px;
        background: var(--gradient-pink);
        color: white;
        border: none;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s var(--transition-smooth);
        box-shadow: var(--shadow-lg);
        z-index: 1000;
    }

    .scroll-top-btn.show {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-top-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 10px 25px -5px rgba(255, 105, 180, 0.4);
    }

    .text-pink {
        color: var(--color-pink) !important;
    }

    footer a:hover {
        color: var(--color-pink) !important;
        transition: color 0.3s ease;
    }

    @media (max-width: 768px) {
        .scroll-top-btn {
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }

        footer .col-lg-4 {
            text-align: center;
            margin-bottom: 2rem;
        }

        footer h5 {
            font-size: 1rem;
        }

        footer p {
            font-size: 0.9rem;
        }
    }
</style>

</body>
</html>