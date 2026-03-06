@extends('layouts.content')
@section('title', 'Portfolio | Home')

@section('content')
<div class="container">
    @if($profile)
    <div class="row min-vh-75 align-items-center">
        <div class="col-lg-7" style="animation: fadeInUp 0.8s ease;">
            <!-- Available Badge with enhanced animation -->
            <div class="available-badge mb-4">
                <span class="dot"></span>
                <span class="pulse-text">Available for opportunities</span>
            </div>

            <!-- Name with typing effect simulation -->
            <h1 class="display-1 fw-bold mb-4" style="line-height: 1.1; color: var(--color-text);">
                I'm <span class="gradient-text typing-effect">{{ $profile->full_name }}</span>
            </h1>

            <!-- Welcome Text with animated underline -->
            <div class="welcome-wrapper mb-5">
                @if($profile->title)
                    <p class="welcome-text mb-2">{{ $profile->title }}</p>
                @endif
                @if($profile->bio)
                    <p class="welcome-text welcome-subtext mb-0">{{ $profile->bio }}</p>
                @endif
                <div class="animated-underline"></div>
            </div>

            <!-- CTA Buttons with enhanced hover effects -->
            <div class="d-flex gap-3 flex-wrap">
                <a href="/projects" class="btn btn-pink btn-lg px-5 py-3 rounded-pill fw-semibold">
                    <span class="btn-text">View Work</span>
                    <i class="fas fa-arrow-right ms-2 btn-icon"></i>
                </a>
                <a href="/contacts" class="btn btn-outline-pink btn-lg px-5 py-3 rounded-pill fw-semibold">
                    <span class="btn-text">Contact Me</span>
                    <i class="fas fa-heart ms-2 btn-icon"></i>
                </a>
            </div>
        </div>

        <!-- Right side - Enhanced profile image -->
        <div class="col-lg-5 mt-5 mt-lg-0 text-center" style="animation: fadeInRight 0.8s ease;">
            <div class="profile-wrapper">
                <div class="profile-image-container">
                    <img src="{{ asset($profile->image_url ?? 'https://via.placeholder.com/400x400') }}" 
                         class="img-fluid profile-image" 
                         alt="Profile"
                         id="profileImage">
                    <div class="profile-glow"></div>
                </div>
                
                <!-- Animated floating elements -->
                <div class="floating-elements">
                    <div class="floating-element element-1">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="floating-element element-2">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <div class="floating-element element-3">
                        <i class="fas fa-rocket"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="text-center py-5" style="animation: fadeInUp 0.5s ease;">
            <div class="glass-card p-5 rounded-4">
                <i class="fas fa-exclamation-circle fa-4x mb-3" style="color: var(--color-pink); opacity: 0.5;"></i>
                <h3>No Profile Data Found</h3>
                <p class="text-muted">Please add profile information to display.</p>
            </div>
        </div>
    @endif
</div>

<style>
    .min-vh-75 { min-height: 75vh; }

    /* Available Badge Enhancements */
    .available-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 20px;
        background: linear-gradient(135deg, rgba(255, 105, 180, 0.1), rgba(255, 155, 200, 0.1));
        border-radius: 50px;
        color: var(--color-pink);
        font-weight: 500;
        font-size: 0.95rem;
        border: 1px solid rgba(255, 105, 180, 0.2);
        backdrop-filter: blur(5px);
        position: relative;
        overflow: hidden;
    }

    .available-badge::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
        animation: rotate 10s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .dot {
        width: 10px;
        height: 10px;
        background: var(--color-pink);
        border-radius: 50%;
        display: inline-block;
        animation: pulse 2s infinite;
        box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.7);
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(255, 105, 180, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 105, 180, 0); }
    }

    .pulse-text {
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: textPulse 2s ease-in-out infinite;
    }

    @keyframes textPulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    /* Name with typing effect */
    .typing-effect {
        position: relative;
        display: inline-block;
    }

    .typing-effect::after {
        content: '|';
        position: absolute;
        right: -15px;
        color: var(--color-pink);
        animation: blink 1s infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    .display-1 {
        font-size: 4.5rem;
        font-weight: 800 !important;
        letter-spacing: -2px;
        color: var(--color-text);
    }

    .gradient-text {
        background: var(--gradient-pink);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    /* Welcome Text with animated underline */
    .welcome-wrapper {
        position: relative;
        display: inline-block;
    }

    .welcome-text {
        font-size: 1.5rem;
        color: var(--color-text-muted);
        font-weight: 400;
        max-width: 500px;
        position: relative;
        z-index: 1;
    }

    .welcome-subtext {
        font-size: 1.05rem;
        line-height: 1.7;
        max-width: 560px;
    }

    .animated-underline {
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb, var(--color-pink));
        animation: expandWidth 2s ease-in-out infinite;
    }

    @keyframes expandWidth {
        0% { width: 0; opacity: 0; }
        50% { width: 100%; opacity: 1; }
        100% { width: 0; opacity: 0; }
    }

    /* Buttons with enhanced hover */
    .btn-pink, .btn-outline-pink {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-pink {
        background: linear-gradient(135deg, var(--color-pink), #ff9acb);
        color: white;
        font-size: 1.1rem;
        box-shadow: 0 10px 20px -5px rgba(255, 105, 180, 0.3);
    }

    .btn-pink::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-pink:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-pink:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 20px 30px -5px rgba(255, 105, 180, 0.4);
    }

    .btn-outline-pink {
        border: 2px solid var(--color-pink);
        color: var(--color-pink);
        background: transparent;
        font-size: 1.1rem;
        position: relative;
        z-index: 1;
    }

    .btn-outline-pink::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--color-pink), #ff9acb);
        transition: left 0.3s ease;
        z-index: -1;
    }

    .btn-outline-pink:hover {
        color: white;
        transform: translateY(-3px) scale(1.05);
        border-color: transparent;
    }

    .btn-outline-pink:hover::before {
        left: 0;
    }

    .btn-icon {
        transition: transform 0.3s ease;
        display: inline-block;
    }

    .btn-pink:hover .btn-icon,
    .btn-outline-pink:hover .btn-icon {
        transform: translateX(5px) rotate(360deg);
    }

    /* Profile Image Enhancements */
    .profile-wrapper {
        position: relative;
        display: inline-block;
    }

    .profile-image-container {
        position: relative;
        display: inline-block;
    }

    .profile-image {
        width: 500px;
        height: 500px;
        object-fit: cover;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: morphing 10s ease-in-out infinite;
        border: 4px solid var(--color-pink);
        box-shadow: 0 25px 40px -15px rgba(255, 105, 180, 0.3);
        position: relative;
        z-index: 2;
        transition: all 0.5s ease;
    }

    .profile-image:hover {
        transform: scale(1.02);
        border-color: #ff45a5;
        box-shadow: 0 35px 50px -15px rgba(255, 105, 180, 0.4);
    }

    .profile-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        border-radius: inherit;
        background: radial-gradient(circle, rgba(255,105,180,0.3) 0%, transparent 70%);
        filter: blur(20px);
        z-index: 1;
        animation: glow 3s ease-in-out infinite;
    }

    @keyframes glow {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 0.8; }
    }

    @keyframes morphing {
        0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        25% { border-radius: 50% 50% 50% 50% / 50% 50% 50% 50%; }
        50% { border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; }
        75% { border-radius: 40% 60% 60% 40% / 40% 60% 40% 60%; }
    }

    /* Floating Elements */
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 3;
    }

    .floating-element {
        position: absolute;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--color-pink), #ff9acb);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: 0 5px 15px rgba(255,105,180,0.3);
        animation: float 6s ease-in-out infinite;
    }

    .element-1 {
        top: 10%;
        right: 0;
        animation-delay: 0s;
    }

    .element-2 {
        bottom: 20%;
        left: 10%;
        animation-delay: 1s;
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }

    .element-3 {
        top: 30%;
        left: -10%;
        animation-delay: 2s;
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    /* Animation Keyframes */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .display-1 {
            font-size: 3.5rem;
        }

        .profile-image {
            width: 350px;
            height: 350px;
        }

        .floating-element {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .display-1 {
            font-size: 2.8rem;
        }

        .welcome-text {
            font-size: 1.2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem !important;
            font-size: 1rem !important;
        }

        .profile-image {
            width: 280px;
            height: 280px;
        }
    }
</style>

<script>
    // Add Font Awesome if not already present
    if (!document.querySelector('link[href*="font-awesome"]')) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
        document.head.appendChild(link);
    }

    // Typing effect simulation for name
    document.addEventListener('DOMContentLoaded', function() {
        const nameElement = document.querySelector('.typing-effect');
        if (nameElement) {
            const text = nameElement.textContent;
            nameElement.textContent = '';
            let i = 0;
            
            function typeWriter() {
                if (i < text.length) {
                    nameElement.textContent += text.charAt(i);
                    i++;
                    setTimeout(typeWriter, 100);
                }
            }
            
            // Start typing effect after a short delay
            setTimeout(typeWriter, 500);
        }
    });
</script>
@endsection