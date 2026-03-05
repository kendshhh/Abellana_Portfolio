@extends('layouts.content')
@section('title', 'Portfolio | Contact')

@push('styles')
<style>
    /* Projects page inspired styling */
    .contact-wrapper {
        max-width: 900px;
        margin: 0 auto;
    }

    /* Section Header - Matching projects page */
    .section-header {
        text-align: center;
        margin-bottom: 4rem;
        animation: fadeInDown 0.6s ease;
    }

    .section-header h2 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        letter-spacing: -1px;
        position: relative;
        display: inline-block;
    }

    .section-header h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        border-radius: 2px;
        animation: expandWidth 1.5s ease-in-out infinite;
    }

    .section-header p {
        font-size: 1.2rem;
        color: var(--color-text-muted);
        max-width: 600px;
        margin: 0 auto;
    }

    /* Contact Card - Similar to project card */
    .contact-card {
        background: white;
        border-radius: 30px;
        padding: 3rem;
        border: 1px solid rgba(255, 105, 180, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(255,105,180,0.05);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease;
    }

    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb, var(--color-pink));
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .contact-card:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: var(--color-pink);
        box-shadow: 0 30px 50px rgba(255,105,180,0.15);
    }

    .contact-card:hover::before {
        transform: translateX(0);
    }

    .contact-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, rgba(255,105,180,0.1), transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .contact-card:hover::after {
        opacity: 1;
    }

    /* Contact Items - Matching project structure */
    .contact-items {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        margin: 3rem 0;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        padding: 1.5rem;
        border-radius: 20px;
        background: white;
        border: 1px solid rgba(255, 105, 180, 0.1);
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease;
        animation-fill-mode: both;
        position: relative;
        overflow: hidden;
    }

    .contact-item:nth-child(1) { animation-delay: 0.1s; }
    .contact-item:nth-child(2) { animation-delay: 0.2s; }
    .contact-item:nth-child(3) { animation-delay: 0.3s; }
    .contact-item:nth-child(4) { animation-delay: 0.4s; }

    .contact-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: linear-gradient(180deg, var(--color-pink), #ff9acb);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .contact-item:hover {
        transform: translateX(10px);
        border-color: var(--color-pink);
        box-shadow: 0 10px 25px rgba(255,105,180,0.1);
    }

    .contact-item:hover::before {
        transform: scaleY(1);
    }

    /* Contact Icon */
    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(255, 105, 180, 0.1), rgba(255, 155, 200, 0.1));
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--color-pink);
        border: 1px solid rgba(255, 105, 180, 0.2);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .contact-icon::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,105,180,0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .contact-item:hover .contact-icon {
        background: var(--color-pink);
        color: white;
        transform: rotate(5deg) scale(1.1);
    }

    .contact-item:hover .contact-icon::before {
        width: 100px;
        height: 100px;
    }

    /* Contact Content */
    .contact-content {
        flex: 1;
    }

    .contact-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--color-text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
        display: block;
    }

    .contact-value {
        font-size: 1.2rem;
        font-weight: 500;
        color: var(--color-text);
        text-decoration: none;
        transition: all 0.3s ease;
        word-break: break-word;
        display: inline-block;
        position: relative;
    }

    .contact-value:not(.text-secondary) {
        color: var(--color-pink);
    }

    .contact-value:hover {
        color: #ff45a5;
        transform: translateX(5px);
    }

    .contact-value::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        transition: width 0.3s ease;
    }

    .contact-value:hover::after {
        width: 100%;
    }

    .text-secondary.contact-value {
        background: rgba(255, 105, 180, 0.05);
        padding: 0.5rem 1.2rem;
        border-radius: 12px;
        border: 1px solid rgba(255, 105, 180, 0.1);
        color: var(--color-text);
    }

    /* Back Button - Matching projects page style */
    .back-button {
        text-align: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(255,105,180,0.1);
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 2.5rem;
        background: linear-gradient(135deg, var(--color-pink), #ff9acb);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: none;
        box-shadow: 0 10px 20px -5px rgba(255, 105, 180, 0.3);
    }

    .btn-back::before {
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

    .btn-back:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 20px 30px -5px rgba(255, 105, 180, 0.4);
        color: white;
    }

    .btn-back:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-back i {
        transition: transform 0.3s ease;
    }

    .btn-back:hover i {
        transform: translateX(-5px);
    }

    /* Empty State - Matching projects page */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: linear-gradient(135deg, white, #fafafa);
        border-radius: 30px;
        border: 1px solid rgba(255,105,180,0.1);
        animation: fadeInUp 0.6s ease;
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--color-pink);
        opacity: 0.3;
        margin-bottom: 1.5rem;
        animation: bounce 2s ease-in-out infinite;
    }

    .empty-state h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .empty-state p {
        color: var(--color-text-muted);
        font-size: 1.1rem;
    }

    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

    @keyframes expandWidth {
        0% { width: 40px; opacity: 0.5; }
        50% { width: 120px; opacity: 1; }
        100% { width: 40px; opacity: 0.5; }
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 2.5rem;
        }

        .contact-card {
            padding: 1.8rem;
        }

        .contact-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.2rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }

        .contact-value {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="contact-wrapper">
        <!-- Section Header - Matching projects page -->
        <div class="section-header">
            <h2 class="gradient-text">
                <i class="fas fa-heart me-3" style="color: var(--color-pink);"></i>
                Get In Touch
            </h2>
            <p>I'd love to hear from you. Whether you have a question about a project or just want to connect, feel free to reach out.</p>
        </div>

        <!-- Contact Card -->
        <div class="contact-card">
            @if(isset($contact))
                <div class="contact-items">
                    <!-- Email -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <span class="contact-label">Email</span>
                            <a href="mailto:{{ $contact->email }}" class="contact-value">
                                {{ $contact->email }}
                                <i class="fas fa-external-link-alt ms-2" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-content">
                            <span class="contact-label">Phone</span>
                            <span class="contact-value text-secondary">
                                <i class="fas fa-phone me-2" style="color: var(--color-pink);"></i>
                                {{ $contact->phone }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- LinkedIn -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                        <div class="contact-content">
                            <span class="contact-label">LinkedIn</span>
                            <a href="{{ $contact->linkedin_url }}" target="_blank" class="contact-value">
                                {{ $contact->linkedin_url }}
                                <i class="fas fa-external-link-alt ms-2" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- GitHub -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-github"></i>
                        </div>
                        <div class="contact-content">
                            <span class="contact-label">GitHub</span>
                            <a href="{{ $contact->github_url ?? 'https://github.com/kendshhh' }}" target="_blank" class="contact-value">
                                {{ $contact->github_url ?? 'https://github.com/kendshhh' }}
                                <i class="fas fa-external-link-alt ms-2" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty State - Matching projects page -->
                <div class="empty-state">
                    <i class="fas fa-address-card"></i>
                    <h3>No Contact Information</h3>
                    <p>Contact details will be available soon!</p>
                    <div class="mt-4">
                        <i class="fas fa-arrow-down fa-2x" style="color: var(--color-pink); opacity: 0.3; animation: bounce 2s infinite;"></i>
                    </div>
                </div>
            @endif

            <!-- Back Button -->
            <div class="back-button">
                <a href="/" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Add Font Awesome if not already present
    if (!document.querySelector('link[href*="font-awesome"]')) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
        document.head.appendChild(link);
    }
</script>
@endsection