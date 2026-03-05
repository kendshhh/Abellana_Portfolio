@extends('layouts.content')
@section('title', 'Technical Toolkit')

@push('styles')
<style>
    /* Projects page inspired styling */
    .skills-wrapper {
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

    /* Skills Grid */
    .skills-grid {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Skill Container - Similar to project card */
    .skill-container {
        background: white;
        border-radius: 30px;
        padding: 2rem;
        border: 1px solid rgba(255, 105, 180, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(255,105,180,0.05);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease;
        animation-fill-mode: both;
    }

    .skill-container:nth-child(1) { animation-delay: 0.1s; }
    .skill-container:nth-child(2) { animation-delay: 0.15s; }
    .skill-container:nth-child(3) { animation-delay: 0.2s; }
    .skill-container:nth-child(4) { animation-delay: 0.25s; }
    .skill-container:nth-child(5) { animation-delay: 0.3s; }
    .skill-container:nth-child(6) { animation-delay: 0.35s; }
    .skill-container:nth-child(7) { animation-delay: 0.4s; }
    .skill-container:nth-child(8) { animation-delay: 0.45s; }
    .skill-container:nth-child(9) { animation-delay: 0.5s; }
    .skill-container:nth-child(10) { animation-delay: 0.55s; }

    .skill-container::before {
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

    .skill-container:hover {
        transform: translateY(-5px) scale(1.02);
        border-color: var(--color-pink);
        box-shadow: 0 30px 50px rgba(255,105,180,0.15);
    }

    .skill-container:hover::before {
        transform: translateX(0);
    }

    .skill-container::after {
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

    .skill-container:hover::after {
        opacity: 1;
    }

    /* Skill Header */
    .skill-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .skill-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--color-text);
        margin: 0;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .skill-name i {
        color: var(--color-pink);
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .skill-container:hover .skill-name i {
        transform: rotate(360deg) scale(1.2);
    }

    .skill-name span {
        position: relative;
        display: inline-block;
    }

    .skill-name span::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        transition: width 0.3s ease;
    }

    .skill-container:hover .skill-name span::after {
        width: 100%;
    }

    /* Level Badge - Matching project year badge */
    .level-badge {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--color-pink);
        background: rgba(255, 105, 180, 0.1);
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        border: 1px solid rgba(255, 105, 180, 0.2);
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .skill-container:hover .level-badge {
        background: var(--color-pink);
        color: white;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255,105,180,0.3);
    }

    /* Progress Bar Container */
    .progress-container {
        position: relative;
        margin-top: 1rem;
    }

    .progress-track {
        height: 14px;
        background: rgba(255, 105, 180, 0.08);
        border-radius: 50px;
        position: relative;
        overflow: visible;
        border: 1px solid rgba(255, 105, 180, 0.1);
    }

    .progress-fill {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, var(--color-pink) 0%, #ff9acb 100%);
        border-radius: 50px;
        position: relative;
        transition: width 2s cubic-bezier(0.22, 1, 0.36, 1);
        box-shadow: 0 4px 15px rgba(255, 105, 180, 0.4);
    }

    /* Glowing tip */
    .progress-fill::before {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 20px;
        background: rgba(255, 255, 255, 0.3);
        filter: blur(5px);
        border-radius: 50px;
        animation: glowPulse 2s infinite;
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    /* Percentage Bubble */
    .percentage-bubble {
        position: absolute;
        right: -20px;
        top: -40px;
        background: #333;
        color: white;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 700;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.5s ease;
        white-space: nowrap;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .percentage-bubble::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #333;
    }

    .progress-fill.active .percentage-bubble {
        opacity: 1;
        transform: translateY(0);
    }

    /* Empty State */
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

        .skill-container {
            padding: 1.5rem;
        }

        .skill-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .skill-name {
            font-size: 1.1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="skills-wrapper">
        <!-- Section Header - Matching projects page -->
        <div class="section-header">
            <h2 class="gradient-text">
                <i class="fas fa-code me-3" style="color: var(--color-pink);"></i>
                Technical Toolkit
            </h2>
            <p>Technologies and tools I work with</p>
        </div>

        <!-- Skills Grid -->
        <div class="skills-grid">
            @forelse($skills as $skill)
                <div class="skill-container">
                    <div class="skill-header">
                        <h3 class="skill-name">
                            <i class="fas fa-circle-nodes"></i>
                            <span>{{ $skill->name }}</span>
                        </h3>
                        <span class="level-badge">
                            <i class="fas fa-chart-line"></i>
                            {{ $skill->level }}
                        </span>
                    </div>

                    @php
                        $percent = $skill->percent . '%';
                    @endphp

                    <div class="progress-container">
                        <div class="progress-track">
                            <div class="progress-fill" data-width="{{ $percent }}">
                                <div class="percentage-bubble">{{ $percent }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-tools"></i>
                    <h3>No Skills Added</h3>
                    <p>Technical skills will be listed soon!</p>
                    <div class="mt-4">
                        <i class="fas fa-arrow-down fa-2x" style="color: var(--color-pink); opacity: 0.3; animation: bounce 2s infinite;"></i>
                    </div>
                </div>
            @endforelse
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

    // Intersection Observer to trigger animation when scrolled into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const fill = entry.target;
                fill.style.width = fill.getAttribute('data-width');
                fill.classList.add('active');
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.progress-fill').forEach(bar => {
        observer.observe(bar);
    });
</script>
@endsection