@extends('layouts.content')
@section('title', 'Education')

@push('styles')
<style>
    .edu-timeline, .edu-timeline * { font-family: 'Inter', 'Segoe UI', Roboto, sans-serif; }

    /* Vertical Timeline Line */
    .edu-timeline { position: relative; padding: 1rem 0; }
    .edu-timeline::before {
        content: ''; position: absolute; left: 20px; top: 0;
        width: 2px; height: 100%; background: var(--color-gray);
    }

    /* Timeline Node (The Circle) */
    .edu-node { position: relative; padding-left: 60px; margin-bottom: 30px; }
    .edu-node::before {
        content: ''; position: absolute; left: 11px; top: 8px;
        width: 20px; height: 20px; border-radius: 50%;
        background: var(--color-white); border: 4px solid var(--color-pink); z-index: 2;
    }

    /* Creative Hover Arrow (Hidden by default) */
    .edu-node::after {
        content: '→'; position: absolute; left: 35px; top: 5px;
        color: var(--color-pink); font-size: 1.5rem; font-weight: bold;
        opacity: 0; transition: 0.3s; transform: translateX(-5px);
    }
    .edu-node:hover::after { opacity: 1; transform: translateX(0); }

    /* Card Styling */
    .edu-card {
        border-radius: 24px; border: 1px solid var(--color-gray);
        transition: 0.3s; padding: 2rem; background: var(--color-white);
    }
    .edu-card:hover { 
        border-color: var(--color-pink); 
        transform: translateX(5px); 
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
    }

    .edu-year-badge {
        background: var(--color-pink);
        color: var(--color-white);
        padding: 4px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
    }
</style>
@endpush

@section('content')
<div class="container mt-5">
    <h2 class="display-5 fw-bold mb-5" style="font-family: 'Inter', sans-serif; background: linear-gradient(90deg, var(--color-pink) 0%, #ff9acb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Academic Background</h2>
    
    <div class="edu-timeline col-lg-9">
        {{-- Sorting by start_year descending to get 2023 -> 2021 -> 2017 --}}
        @foreach($educations->sortByDesc('start_year') as $edu)
            <div class="edu-node">
                <div class="card edu-card shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="fw-bold m-0 text-dark">{{ $edu->degree }}{{ $edu->field_of_study ? ' in '.$edu->field_of_study : '' }}</h4>
                        <span class="edu-year-badge">
                            {{ $edu->start_year }}@if($edu->end_year) - {{ $edu->end_year }}@endif
                        </span>
                    </div>
                    
                    <p class="fw-bold small mb-3 text-uppercase tracking-wider" style="color: var(--color-pink);">
                        {{ $edu->institution }}
                    </p>

                    @if($edu->description)
                        <p class="text-muted mb-0">{{ $edu->description }}</p>
                    @else
                        <p class="text-muted mb-0 small">Pursuing academic excellence and technical expertise.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection