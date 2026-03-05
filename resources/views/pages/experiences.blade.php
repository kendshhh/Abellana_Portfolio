@extends('layouts.content')
@section('title', 'Experiences')

@push('styles')
<style>
    /* Projects page inspired styling */
    .experience-wrapper {
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

    /* Timeline - Enhanced */
    .timeline {
        position: relative;
        padding: 2rem 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 30px;
        top: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, var(--color-pink), #ff9acb, transparent);
        opacity: 0.3;
    }

    /* Experience Node - Similar to project card */
    .exp-node {
        position: relative;
        padding-left: 80px;
        margin-bottom: 2.5rem;
        animation: fadeInUp 0.6s ease;
        animation-fill-mode: both;
    }

    .exp-node:nth-child(1) { animation-delay: 0.1s; }
    .exp-node:nth-child(2) { animation-delay: 0.2s; }
    .exp-node:nth-child(3) { animation-delay: 0.3s; }
    .exp-node:nth-child(4) { animation-delay: 0.4s; }
    .exp-node:nth-child(5) { animation-delay: 0.5s; }

    /* Timeline Node Marker */
    .exp-node::before {
        content: '';
        position: absolute;
        left: 21px;
        top: 30px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: white;
        border: 4px solid var(--color-pink);
        z-index: 2;
        transition: all 0.3s ease;
        box-shadow: 0 0 0 0 rgba(255, 105, 180, 0.4);
    }

    .exp-node:hover::before {
        transform: scale(1.3);
        box-shadow: 0 0 0 8px rgba(255, 105, 180, 0.2);
    }

    /* Experience Card - Matching project card */
    .exp-card {
        background: white;
        border-radius: 30px;
        padding: 2rem;
        border: 1px solid rgba(255, 105, 180, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(255,105,180,0.05);
        position: relative;
        overflow: hidden;
    }

    .exp-card::before {
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

    .exp-card:hover {
        transform: translateY(-5px) translateX(5px);
        border-color: var(--color-pink);
        box-shadow: 0 30px 50px rgba(255,105,180,0.15);
    }

    .exp-card:hover::before {
        transform: translateX(0);
    }

    .exp-card::after {
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

    .exp-card:hover::after {
        opacity: 1;
    }

    /* Card Header */
    .exp-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .exp-role {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--color-text);
        margin: 0;
        letter-spacing: -0.5px;
        position: relative;
        display: inline-block;
    }

    .exp-role::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--color-pink), #ff9acb);
        transition: width 0.3s ease;
    }

    .exp-card:hover .exp-role::after {
        width: 100%;
    }

    /* Year Badge - Matching project year */
    .year-badge {
        font-size: 0.95rem;
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
    }

    .exp-card:hover .year-badge {
        background: var(--color-pink);
        color: white;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255,105,180,0.3);
    }

    /* Organization */
    .exp-organization {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--color-pink);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .exp-organization i {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    /* Description */
    .exp-description {
        color: var(--color-text-muted);
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 0;
        padding: 1rem;
        background: rgba(255, 105, 180, 0.02);
        border-radius: 16px;
        border: 1px solid rgba(255, 105, 180, 0.05);
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

        .timeline::before {
            left: 20px;
        }

        .exp-node {
            padding-left: 60px;
        }

        .exp-node::before {
            left: 11px;
        }

        .exp-card {
            padding: 1.5rem;
        }

        .exp-role {
            font-size: 1.2rem;
        }

        .exp-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="experience-wrapper">
        <!-- Section Header - Matching projects page -->
        <div class="section-header">
            <h2 class="gradient-text">
                <i class="fas fa-briefcase me-3" style="color: var(--color-pink);"></i>
                Professional Journey
            </h2>
            <p>My work experience and career highlights</p>
        </div>

        <!-- Timeline -->
        <div class="timeline">
            @forelse($experiences as $exp)
                <div class="exp-node">
                    <div class="exp-card">
                        <div class="exp-header">
                            <h3 class="exp-role">{{ $exp->role }}</h3>
                            <span class="year-badge">
                                <i class="far fa-calendar-alt"></i>
                                {{ $exp->year }}
                            </span>
                        </div>
                        
                        <div class="exp-organization">
                            <i class="fas fa-building"></i>
                            {{ $exp->organization }}
                        </div>

                        @if(isset($exp->description) && $exp->description)
                            <p class="exp-description">
                                <i class="fas fa-quote-left me-2" style="color: var(--color-pink); opacity: 0.5; font-size: 0.8rem;"></i>
                                {{ $exp->description }}
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-briefcase"></i>
                    <h3>No Experience Records</h3>
                    <p>Professional experience will be added soon!</p>
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
</script>
@endsection