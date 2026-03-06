@extends('layouts.content')
@section('title', 'Featured Projects')

@push('styles')
<style>
    /* Projects Grid */
    .projects-grid {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        max-width: 900px;
        margin: 0 auto;
    }

    /* Project Card */
    .project-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid var(--color-gray);
        transition: all 0.3s var(--transition-smooth);
        box-shadow: var(--shadow-sm);
    }

    .project-card:hover {
        transform: translateY(-4px);
        border-color: var(--color-pink);
        box-shadow: var(--shadow-lg);
    }

    .project-content {
        display: flex;
        align-items: center;
        padding: 2rem;
        gap: 2rem;
    }

    /* Project Image */
    .project-image {
        flex-shrink: 0;
        width: 180px;
        height: 180px;
        border-radius: 16px;
        overflow: hidden;
        background: var(--color-gray-light);
        border: 1px solid var(--color-gray);
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s var(--transition-smooth);
    }

    .project-card:hover .project-image img {
        transform: scale(1.05);
    }

    /* Project Info */
    .project-info {
        flex: 1;
    }

    .project-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .project-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--color-text);
        margin: 0;
        letter-spacing: -0.5px;
    }

    .project-year {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--color-pink);
        background: rgba(255, 105, 180, 0.1);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        border: 1px solid rgba(255, 105, 180, 0.2);
    }

    .project-description {
        color: var(--color-text-muted);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    /* Tech Stack */
    .tech-stack {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .tech-tag {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--color-pink);
        background: rgba(255, 105, 180, 0.08);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        border: 1px solid rgba(255, 105, 180, 0.15);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 24px;
        border: 1px solid var(--color-gray);
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--color-pink);
        opacity: 0.5;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: var(--color-text-muted);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .project-content {
            flex-direction: column;
            padding: 1.5rem;
            gap: 1.5rem;
        }

        .project-image {
            width: 100%;
            height: 200px;
        }

        .project-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <!-- Section Header - Same spacing as other pages -->
    <div class="section-header" data-aos="fade-up">
        <h2 class="gradient-text">Featured Projects</h2>
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
                    </div>

                    <!-- Project Info -->
                    <div class="project-info">
                        <div class="project-header">
                            <h3 class="project-title">{{ $proj->title }}</h3>
                            <span class="project-year">{{ $proj->year }}</span>
                        </div>
                        
                        @if($proj->description)
                            <p class="project-description">{{ $proj->description }}</p>
                        @endif

                        @if($proj->tech_stack)
                        <div class="tech-stack">
                            @foreach(explode(',', $proj->tech_stack) as $tech)
                                <span class="tech-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-code"></i>
                <h3>No Projects Yet</h3>
                <p>Check back soon for updates!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection