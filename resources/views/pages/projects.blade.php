@extends('layouts.content')
@section('title', 'Featured Projects')

@push('styles')
<style>
    /* Projects Grid */
    .projects-grid {
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Section Header */
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

    /* Project Card */
    .project-card {
        background: white;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid rgba(255, 105, 180, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(255,105,180,0.05);
        position: relative;
        animation: fadeInUp 0.6s ease;
        animation-fill-mode: both;
    }

    .project-card:nth-child(1) { animation-delay: 0.1s; }
    .project-card:nth-child(2) { animation-delay: 0.2s; }
    .project-card:nth-child(3) { animation-delay: 0.3s; }
    .project-card:nth-child(4) { animation-delay: 0.4s; }
    .project-card:nth-child(5) { animation-delay: 0.5s; }

    .project-card::before {
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

    .project-card:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: var(--color-pink);
        box-shadow: 0 30px 50px rgba(255,105,180,0.15);
    }

    .project-card:hover::before {
        transform: translateX(0);
    }

    .project-content {
        display: flex;
        align-items: center;
        padding: 2.5rem;
        gap: 2.5rem;
        position: relative;
        z-index: 1;
    }

    /* Project Image */
    .project-image {
        flex-shrink: 0;
        width: 200px;
        height: 200px;
        border-radius: 20px;
        overflow: hidden;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border: 2px solid transparent;
        transition: all 0.4s ease;
        position: relative;
    }

    .project-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255,105,180,0.2), transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 1;
    }

    .project-card:hover .project-image {
        border-color: var(--color-pink);
        transform: rotate(2deg) scale(1.05);
    }

    .project-card:hover .project-image::before {
        opacity: 1;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .project-card:hover .project-image img {
        transform: scale(1.1);
    }

    /* Project Info */
    .project-info {
        flex: 1;
    }

    .project-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .project-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--color-text);
        margin: 0;
        letter-spacing: -0.5px;
        position: relative;
        display: inline-block;
    }

    .project-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        transition: width 0.3s ease;
    }

    .project-card:hover .project-title::after {
        width: 100%;
    }

    .project-year {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--color-pink);
        background: rgba(255, 105, 180, 0.1);
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        border: 1px solid rgba(255, 105, 180, 0.2);
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
    }

    .project-card:hover .project-year {
        background: var(--color-pink);
        color: white;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255,105,180,0.3);
    }

    .project-description {
        color: var(--color-text-muted);
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        padding-right: 1rem;
    }

    /* Tech Stack */
    .tech-stack {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
    }

    .tech-tag {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--color-pink);
        background: rgba(255, 105, 180, 0.08);
        padding: 0.4rem 1rem;
        border-radius: 50px;
        border: 1px solid rgba(255, 105, 180, 0.15);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-tag::before {
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

    .tech-tag:hover {
        background: var(--color-pink);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255,105,180,0.3);
    }

    .tech-tag:hover::before {
        width: 200px;
        height: 200px;
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

        .project-content {
            flex-direction: column;
            padding: 1.8rem;
            gap: 1.5rem;
        }

        .project-image {
            width: 100%;
            height: 220px;
        }

        .project-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .project-title {
            font-size: 1.5rem;
        }
    }

    /* Hover effect for cards */
    .project-card::after {
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

    .project-card:hover::after {
        opacity: 1;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <!-- Section Header - Same spacing as other pages -->
    <div class="section-header" data-aos="fade-up">
        <h2 class="gradient-text">
            <i class="fas fa-code-branch me-3" style="color: var(--color-pink);"></i>
            Featured Projects
        </h2>
        <p>A collection of works ranging from web applications to creative technical experiments.</p>
    </div>

    <!-- Projects List -->
    <div class="projects-grid">
        @forelse($projects as $proj)
            <div class="project-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="project-content">
                    <!-- Project Image with local asset path -->
                    <div class="project-image">
                        <img src="{{ asset($proj->image_url) }}" alt="{{ $proj->title }}">
                        <div class="image-overlay"></div>
                    </div>

                    <!-- Project Info -->
                    <div class="project-info">
                        <div class="project-header">
                            <h3 class="project-title">{{ $proj->title }}</h3>
                            <span class="project-year">
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ $proj->year }}
                            </span>
                        </div>
                        
                        <p class="project-description">
                            {{ $proj->description ?? 'No description available.' }}
                        </p>

                        @if($proj->tech_stack)
                        <div class="tech-stack">
                            @foreach(explode(',', $proj->tech_stack) as $tech)
                                <span class="tech-tag">
                                    <i class="fas fa-circle me-1" style="font-size: 0.4rem;"></i>
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-laptop-code"></i>
                <h3>No Projects Yet</h3>
                <p>Check back soon for exciting updates!</p>
                <div class="mt-4">
                    <i class="fas fa-arrow-down fa-2x" style="color: var(--color-pink); opacity: 0.3; animation: bounce 2s infinite;"></i>
                </div>
            </div>
        @endforelse
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