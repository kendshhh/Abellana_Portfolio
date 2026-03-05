@extends('layouts.content')
@section('title', 'Technical Toolkit')

@push('styles')
<style>
    .skill-container { margin-bottom: 2.5rem; transition: transform 0.3s ease; }
    .skill-container:hover { transform: translateX(10px); }
    
    .skill-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .skill-name {
        font-weight: 800;
        font-size: 1.1rem;
        color: var(--color-text);
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Animated Dot next to name */
    .skill-name::before {
        content: '';
        width: 8px;
        height: 8px;
        background: var(--color-pink);
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 10px var(--color-pink);
    }

    .level-badge {
        background: rgba(255, 105, 180, 0.1);
        color: var(--color-pink);
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }

    /* The Track */
    .progress-track {
        height: 14px;
        background: #f0f0f0;
        border-radius: 50px;
        position: relative;
        overflow: visible;
    }

    /* Enhanced Animated Bar */
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
    }

    /* Floating Percentage Bubble */
    .percentage-bubble {
        position: absolute;
        right: -20px;
        top: -40px;
        background: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 800;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.5s ease;
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
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="header-group mb-5">
                <h2 class="display-5 fw-bold" style="background: linear-gradient(90deg, var(--color-pink) 0%, #ff9acb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Technical Toolkit</h2>
                <p class="text-muted">A collection of technologies I've mastered and am currently exploring.</p>
            </div>
            
            @foreach ($skills as $skill)
                <div class="skill-container">
                    <div class="skill-info">
                        <span class="skill-name">{{ $skill->name }}</span>
                        <span class="level-badge fw-bold text-uppercase">{{ $skill->level }}</span>
                    </div>
                    <div class="progress-track">
                        {{-- percentage now stored on the model as an integer (0-100) --}}
                        @php
                            $percent = $skill->percent . '%';
                        @endphp
                        <div class="progress-fill" data-width="{{ $percent }}">
                            <div class="percentage-bubble">{{ $percent }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
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